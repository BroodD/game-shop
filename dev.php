<?php include "includes/header.php"; ?>

		<?php 
		$idDev = (int) $_GET['id'];
		$article = mysqli_query($connection, "select `nameDev`, `dateDev`, `profitDev`, `mansDev`, `descDev` from `dev` where `idDev` = $idDev");
		if( mysqli_num_rows($article) <= 0)
		{
			?>
				<div class="content">
					<div class="container">
						<div class="row">
							<section class="col-md-8 content__left">
								<div class="content__wrap">
									<h4 class="content__head error">Розробника не знайдено!!</h4>
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

									<h4 class="content__head"><?php echo $art['nameDev']; ?></h4>

									<div class="block__content">
										<article class="article">
											<div class="article__text col-auto pb20">
												<p>Дата заснування: <?= $art['dateDev'];?></p>
												<p>Загальний заробіток: <?= $art['profitDev']; ?></p>
												<p>Кількість розробників: <?= $art['mansDev']; ?></p>
												<p>Опис: <?= $art['descDev']; ?></p>
											</div>
										</article>
									</div>
								</div>
								
								<?php 
								$history = mysqli_query($connection, "select idGame,nameGame,releasedGame,ratingGame,imageGame,descGame from dev
									inner join game_dev on
										dev_idDev = idDev
									inner join game on 
										game_idGame = idGame
									where dev_idDev = $idDev");
								 ?>

								<div class="content__wrap">
									<h4 class="content__head">Ігри розробника</h4>
									<div class="block__content">
									<?php 
									while ( $h = mysqli_fetch_assoc($history)) 
									{
										?>
										<article class="article">
											<div class="row full-text">
												<h5 class="content__head justify-content-between align-items-center">
													<a href="article.php?id=<?php echo $h['idGame']; ?>"><?php echo $h['nameGame'] ?></a>
													<small><?php echo $h['releasedGame'] ?></small>
												</h5>
												<div class="article__image col-auto">
													<img src="static/images/<?php echo $h['imageGame'] ?>" alt="">
												</div>
												<div class="article__text col">
													<p>Рейтинг: <?php echo $h['ratingGame'];?></p>
													<p><?php echo cutStr($h['descGame'], 500); ?></p>
												</div>
											</div>
										</article>
									<?php 
									} ?>
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
