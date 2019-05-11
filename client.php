<?php include "includes/header.php"; ?>

		<?php 
		$idClient = (int) $_GET['id'];
		$article = mysqli_query($connection, "select `loginClient`, `nameClient`, `surnameClient`, `emailClient`, year(from_days(datediff(NOW(),`bornClient`))) as 'ageClient', `balansClient` from `client` where `idClient` = $idClient");
		if( mysqli_num_rows($article) <= 0)
		{
			?>
				<div class="content">
					<div class="container">
						<div class="row">
							<section class="col-md-8 content__left">
								<div class="content__wrap">
									<h4 class="content__head error">Клієнта не знайдено!!</h4>
								</div>
							</section>
							<?php include "includes/sidebar.php"; ?>
						</div>
					</div>
				</div>
			<?php
		} else {
			$art = mysqli_fetch_assoc($article);
			?>
				<div class="content">
					<div class="container">
						<div class="row">
							<section class="col-md-8 content__left">
								<div class="content__wrap">

									<h4 class="content__head"><?php echo $art['nameClient'] . ' ' . $art['surnameClient']; ?></h4>

									<article class="article">
										<div class="row full-text">
											<div class="article__image col-auto">
												<img src="https://www.gravatar.com/avatar/<?php echo md5($art['emailClient']);?>">
											</div>
											<div class="article__text col-auto">
												<p>Login: <?= $art['loginClient'];?></p>
												<p>Email: <?= $art['emailClient']; ?></p>
												<p>Вік: <?= $art['ageClient']; ?></p>
												<p>Баланс: <?= $art['balansClient']; ?></p>
											</div>
										</div>
									</article>
								</div>
								
								<?php 
								$history = mysqli_query($connection, "select game.idGame, game.nameGame, game.imageGame, dateInRent, dateOutRent, datediff(dateOutRent, current_date()) as 'days', (datediff(dateOutRent, dateInRent) * game.priceDayGame) as 'sum' from client, game_rent, game
									where game_rent.client_idClient = client.idClient and 
											client.idClient = $idClient and
											game_rent.game_idGame = game.idGame
									limit 5");
								 ?>

								<div class="content__wrap">
									<h4 class="content__head">Останні замовлення</h4>
									<div class="block__content">
										<?php 
										while ( $h = mysqli_fetch_assoc($history)) 
										{
											?>
											<article class="article">
												<div class="row full-text">
													<h5 class="content__head">
															<a href="article.php?id=<?php echo $h['idGame']; ?>"><?php echo $h['nameGame'] ?></a>
														</h5>
													<div class="article__image col-auto">
														<img src="static/images/<?php echo $h['imageGame']; ?>" alt="">
													</div>
													<div class="article__text col-md row">
														<div class="col-md-6">
															<p>Початкова дата</p>
															<p><?php echo $h['dateInRent'] ?></p>
														</div>
														<div class="col-md-6">
															<p>Кінцева дата</p>
															<p><?php echo $h['dateOutRent'] ?></p>
														</div>
														<div class="col-md-6">
															<p>Залишок днів</p>
															<p><?php 
																if($h['days'] >= 0)
																	echo $h['days'];
																else echo "Термін вийшов";
															?></p>
														</div>
														<div class="col-md-6">
															<p>Сума</p>
															<p><?php echo $h['sum'] ?> грн.</p>
														</div>
													</div>
												</div>
											</article>
										<?php 
										} ?>
									</div>
								</div>
							</section>
							<?php include "includes/sidebar.php"; ?>
						</div>
					</div>
				</div>
			<?php
		}
		?>

		<?php include "includes/footer.php"; ?>
