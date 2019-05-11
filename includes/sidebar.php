<section class="col-md-4 content__right">
  <div class="content side">
    <div class="content__wrap">
    <h4 class="content__head">Новинки</h4>
      <div class="block__content">

        <?php 
          $articles = mysqli_query($connection, "
            select idGame, nameGame, imageGame, descGame from game order by releasedGame desc limit 3");
          while ( $art = mysqli_fetch_assoc($articles)) 
          {
            ?>
            <article class="article">
              <div class="row m0 full-text">
                <h5 class="content__head justify-content-between align-items-center">
                  <a href="article.php?id=<?php echo $art['idGame']; ?>"><?php echo $art['nameGame'] ?></a>
                </h5>
                <div class="article__image col-auto p-lr-0">
                  <img src="static/images/<?php echo $art['imageGame'] ?>" alt="">
                </div>
                <div class="article__text col">
                  <p><?php echo cutStr($art['descGame'], 90); ?></p>
                </div>
              </div>
            </article>
            <?php
          }
        ?>

      </div>
    </div>
  </div>
  <div class="content side">
    <h4 class="content__head">Топ популярних</h4>
    <div class="content__wrap">
      <div class="block__content">

        <?php 
          $articles = mysqli_query($connection, "
            select game.nameGame,count(game_rent.idGame_rent) as 'count_buy',imageGame,idGame,descGame from game
            inner join game_rent on
              game.idGame = game_rent.game_idGame
            group by game.nameGame
            order by count_buy desc, dateInRent desc
            limit 3");
          while ( $art = mysqli_fetch_assoc($articles)) 
          {
            ?>
              <article class="article">
              <div class="row m0 full-text">
                <h5 class="content__head justify-content-between align-items-center">
                  <a href="article.php?id=<?php echo $art['idGame']; ?>"><?php echo $art['nameGame'] ?></a>
                </h5>
                <div class="article__image col-auto p-lr-0">
                  <img src="static/images/<?php echo $art['imageGame'] ?>" alt="">
                </div>
                <div class="article__text col">
                  <p><?php echo cutStr($art['descGame'], 90); ?></p>
                </div>
              </div>
            </article>
            <?php
          }
        ?>

      </div>
    </div>
  </div>
</section>
