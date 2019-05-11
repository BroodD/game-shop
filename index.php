<?php include "includes/header.php"; ?>

	<div class="content">
		<div class="container">
			<div class="row">
				<section class="col-md-8 content__left">
					<div class="content__wrap">
							<?php 
							if( isset($_GET['genre']))
								$genre = (int) $_GET['genre'];
							$name_genre_q = mysqli_query($connection, "select `nameGenre` from `genre` where idGenre='$genre'");
							$name_genre = mysqli_fetch_assoc($name_genre_q);
							$name_genre = $name_genre['nameGenre'];
							?>

							<h4 class="content__head"><?php if(empty($name_genre)) echo 'Всі ігри'; else echo $name_genre; ?></h4>

							<div class="block__content">

									<?php 
										$per_page = 4;
										$page = 1;


										if( isset($_GET['page']))
											$page = (int) $_GET['page'];


										if($genre) {
											$total_count_q = mysqli_query($connection, 
												"select count(`idGame`) as `total_count` from `game`, `game_genre`
													where `game_genre`.`genre_idGenre` = $genre and `game_genre`.`game_idGame` = `game`.`idGame`");

											$pag = "&&genre=" . $genre;
										}
										
										else $total_count_q = mysqli_query($connection, "select count(`idGame`) as `total_count` from `game`");

										$total_count = mysqli_fetch_assoc($total_count_q);
										$total_count = $total_count['total_count'];

										$total_pages = ceil($total_count / $per_page);
										if($page <= 1 || $page > $total_pages)
										{
											$page = 1;
										}

										// Very important example !!
										$offset = ($per_page * $page) - $per_page;
										

										// query without genre
										if($genre == false) {
											$articles = mysqli_query($connection, "select * from `game` order by `idGame` desc limit $offset, $per_page");
										}
										else {
											$articles = mysqli_query($connection, "
												select * from `game`, `game_genre`
												where `game_genre`.`genre_idGenre` = $genre and `game_genre`.`game_idGame` = `game`.`idGame`
												order by `game`.`idGame` desc limit $offset, $per_page" );

											// можна + опис жанру
										}

										if($total_count <= 0)
										{
											echo "<h4 class='content__head error'>Записів немає!</h4>";
										} else { ?>
											<div class="articles"> 
											<?php

											while ( $art = mysqli_fetch_assoc($articles)) 
											{
												?>
													<article class="article">
														<div class="row full-text">
															<h5 class="content__head justify-content-between align-items-center">
																<a href="article.php?id=<?php echo $art['idGame']; ?>"><?php echo $art['nameGame'] ?></a>
																<small><?php echo $art['releasedGame'] ?></small>
															</h5>
															<div class="article__image col-auto">
																<img src="static/images/<?php echo $art['imageGame'] ?>" alt="">
															</div>
															<div class="article__text col">
																<p>Рейтинг: <?php echo $art['ratingGame'];?></p>
																<p><?php echo cutStr($art['descGame'], 800); ?></p>
															</div>
														</div>
													</article>
												<?php
											} ?>
											</div>

											<?php
											if($total_count >= $per_page)
											{
												echo '<div class="paginate">';
												if($page > 1){
													echo '<a class="pag-arrow prev" role="button" href="index.php?page=' . ($page - 1) . $pag . '">&laquo; Попередня сторінка</a>   ';
												}
												if($page < $total_pages)
												{
													echo '<a class="pag-arrow next" role="button" href="index.php?page=' . ($page + 1) . $pag . '">Наступна сторінка &raquo;</a>';
												}
												echo '</div>';
											}
										}
									?>
								</div>
							</div>
					</section>
				<?php include "includes/sidebar.php"; ?>
			</div>
		</div>
	</div>

<?php include "includes/footer.php"; ?>