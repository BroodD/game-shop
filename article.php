<?php include "includes/header.php"; ?>

		<?php 
		$idGame = (int) $_GET['id'];
		$article = mysqli_query($connection, "select * from `game` where `idGame` = $idGame");
		if( mysqli_num_rows($article) <= 0)
		{
			?>
				<div class="content">
					<div class="container">
						<div class="row">
							<section class="col-md-8 content__left">
								<div class="content__wrap">
									<h4 class="content__head error">Ігра не знайдена</h4>
								</div>
							</section>
							<?php include "includes/sidebar.php"; ?>
						</div>
					</div>
				</div>
			<?php
		} else {
			$art = mysqli_fetch_assoc($article);
			//mysqli_query($connection, "update `articles` set `views` = `views` + 1 where `id` = " . (int) $art['id']);
			?>
				<div class="content">
					<div class="container">
						<div class="row">
							<section class="col-md-8 content__left">
								<div class="content__wrap">

									<h4 class="content__head"><?php echo $art['nameGame']; ?></h4>

									<div class="block__content">
										<article class="article">
											<div class="row full-text">
												<div class="article__image col-auto">
													<img src="static/images/<?php echo $art['imageGame']; ?>">
												</div>
												<div class="article__text col-auto">
													<p>Ціна за день: <?= $art['priceDayGame'];?> грн.</p>
													<p>Дата випуску: <?= $art['releasedGame']; ?></p>
													<p>Рейтинг: <?= $art['ratingGame']; ?></p>
													<p>Вікові обмеження: <?= $art['ageGame']; ?>+</p>
													<p><?php echo ($art['onlineGame']) ? 'Online Game': 'Offline Game'; ?></p>

													<?php $genres = mysqli_query($connection, "select idGenre, nameGenre from genre, game_genre where game_genre.game_idGame = $idGame and game_genre.genre_idGenre = genre.idGenre"); ?>
													<p class="mt20">Жанри:</p>
													<ul>
														<?php 
														while ( $genre = mysqli_fetch_assoc($genres)) { ?>
														<li><a href="index.php?genre=<?php echo $genre['idGenre']; ?>"><?php echo $genre['nameGenre']; ?></a>
														<?php } ?>
													</ul>

													<?php $genres = mysqli_query($connection, "SELECT idDev, nameDev
														FROM dev, game_dev
														WHERE game_idGame = $idGame AND dev_idDev = idDev"); ?>
													<p class="mt20">Розробники: </p>
													<ul>
														<?php 
														while ( $genre = mysqli_fetch_assoc($genres)) { ?>
														<li><a href="dev.php?id=<?php echo $genre['idDev']; ?>"><?php echo $genre['nameDev']; ?></a></li>
														<?php } ?>
													</ul>

													<?php $genres = mysqli_query($connection, "SELECT idHero, nameHero
														FROM hero, game_hero
														WHERE game_idGame = $idGame AND hero_idHero = idHero"); ?>
													<p class="mt20">Герої: </p>
													<ul>
														<?php 
														while ( $genre = mysqli_fetch_assoc($genres)) { ?>
														<li> <?php echo $genre['nameHero']; ?></li>
														<?php } ?>
													</ul>
												</div>
												<div class="p-big mt20">
													<p><?= $art['descGame']; ?></p>
												</div>
											</div>
										</article>
									</div>
								</div>

								<div class="content__wrap">
									<h4 class="content__head">Останні замовлення</h4>
										<div class="block__content">
											<?php 
												$clients = mysqli_query($connection, "select `client`.`idClient`, `client`.`nameClient`,`client`.`surnameClient`,`client`.`emailClient`,`game_rent`.`dateInRent`, `game_rent`.`dateOutRent` 
												from `client`, `game_rent`, `game`
												where `game_rent`.`client_idClient` = `client`.`idClient` and
													 `game_rent`.`game_idGame` = $idGame
												group by `client`.`idClient`, `game_rent`.`dateOutRent` 
												order by game_rent.idGame_rent limit 5");
												if( mysqli_num_rows($clients) <= 0 )
												{
													echo '<h4 class="content__head error">Немає замовленнь!';
												}
												while ( $client = mysqli_fetch_assoc($clients)) 
												{
													?>
														<article class="article">
															<div class="row full-text">
																<div class="article__image col-auto">
																	<img src="https://www.gravatar.com/avatar/<?php echo md5($client['emailClient']);?>" alt="">
																</div>
																<div class="article__text">
																	<p><a href="client.php?id=<?php echo $client['idClient']; ?>"><?php echo $client['nameClient'] . ' ' . $client['surnameClient']; ?></a></p>
																	<div class="article__info__preview">
																		<p><?php echo $client['dateInRent']; ?> : <?php echo $client['dateOutRent']; ?></p>
																	</div>
																</div>
															</div>
														</article>
													<?php
												}
											?>
										</div>
									</div>

									<div class="content__wrap">
										<h4 class="content__head">Зробити замовлення</h4>
										<div class="block__content">
										<?php 
										if(!empty($_SESSION['id_client'])) { ?>
										<form id="form" class="form" method="POST" action="article.php?id=<?php echo $idGame ?>#form">
											<?php 
											if(isset($_POST['do']))
											{
												$errors = array();
												$now = date_create(date(DATE_ATOM));
												$now = date_format($now,"Y-m-d");
																						// $dateOut = $_POST['dateOutRent'];

												$query = "select `passClient` from `client` where `idClient`='" .$id_client. "' AND `passClient`=md5('".$_POST['passClient']."')";
												$okey = mysqli_query($connection, $query);

												if(mysqli_num_rows($okey) <= 0) {
													$errors[] = "Дані неправильні";
												}


												$ages = mysqli_query($connection, "select year(from_days(datediff(NOW(),`bornClient`))) as 'ageClient', `balansClient` from `client` where `client`.`idClient` = $id_client");
												$age = mysqli_fetch_assoc($ages);

												$total_sum = mysqli_query($connection, "select (datediff('" . $_POST['dateOutRent'] . "', current_date()) * " . $art['priceDayGame'] .") as 'sum'");
												$sum = mysqli_fetch_assoc($total_sum);

												if($_POST['passClient'] == '')
												{
													$errors[] = 'Введіть пароль';
												}
												if($_POST['dateOutRent'] == '')
												{
													$errors[] = 'Введіть дату';
												}
												if($_POST['dateOutRent'] <= $now)
												{
													$errors[] = 'Не правильна кінцева дата';
												}
												if($age['ageClient'] < $art['ageGame'])
												{
													$errors[] = 'Ваш вік замалий для цієї ігри';
												}
												if($sum['sum'] > $age['balansClient'])
												{
													$errors[] = "Не достатньо коштів, потрібно " .$sum['sum']. "грн.<br>Ваш баланс " .$age['balansClient']. "грн.";
												}

												if(empty($errors))
												{
													mysqli_query($connection, "insert into `game_rent` (`game_idGame`, `client_idClient`, `dateInRent`, `dateOutRent`, `dateRealRent`) values('". $idGame ."', '". $id_client ."', '". $now ."', '". $_POST['dateOutRent'] ."', '". $_POST['dateOutRent'] ."')");

													mysqli_query($connection, "update client set 
														client.balansClient = (client.balansClient - (datediff('" . $_POST['dateOutRent'] . "', current_date()) * " . $art['priceDayGame'] . "))
														where client.idClient=$id_client");

													echo '<h4 class="content__head">Замовлення зроблено</h4>';
												}else {
													echo '<h4 class="content__head error">' . $errors['0'] . '</h4>';
												}
											}
											?>
											<div class="row form__row">
												<div class="form__group col">
													<input type="password" required name="passClient" placeholder="Пароль">
												</div>
												<div class="form__group col">
													<input type="date" name="dateOutRent" 
														placeholder="Кінцеву дату" 
														value="<?php echo $_POST['dateOutRent']; ?>"
														required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
												</div>
											</div>
											<div class="row form__row">
												<div class="form__group col-auto">
													<input type="submit" role="button" name="do" value="Замовити">
													<!-- <button type="submit" role="button" name="do">Замовити</button> -->
												</div>
											</div>
										</form>
									<?php 
									} else { ?>
									<div class="content__wrap">
										<h4 class="content__head error">Вам потрібно авторизуватися </h4>
										<!-- <article class="article"> -->
											<div class="mt20">
												<div class="sign">
													<ul>
														<li role="button"><a href="form-up.php">Реєстрація</a></li>
														<li role="button"><a href="form-in.php">Вхід</a></li>
													</ul>
												</div>
											</div>
										<!-- </article> -->
									</div>
									<?php } ?>
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
