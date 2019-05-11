<?php
	require "config.php";
?>

<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title><?php echo $config['tittle'] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<!-- theme color for android 5.0 -->
	<meta name="theme-color" content="#fff"/> 
	<meta name="skype_toolbar" content="skype_toolbar_parser_compatible" />

	<link rel="shortcut icon" type="image/x-icon" href="static/images/<?php echo $config['favicon']; ?>">

	<link rel="stylesheet" href="css/normalize.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/media.css">

</head>
<body>
	<div class="preloader-background preloader-js">
		<div class="preloader">
			<span>Game</span>
		</div>
	</div>

	<div id="cont">
    <canvas id="progress" class="canvas"></canvas>
  </div>

  <div id="a-bg">
	  <div class="back-shapes" style="height: 1376px; display: block;">
      <img src="static/images_bg/circle.png" class="floating" style="top:66.52314316469322%;left:12.97157622739018%>
      <img src="static/images_bg/triangle.png" class="floating" style="top:31.431646932185146%;left:33.59173126614987%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:76.42626480086115%;left:37.98449612403101%;">
      <img src="static/images_bg/square.png" class="floating" style="top:21.420882669537136%;left:14.056847545219638%;">
      <img src="static/images_bg/square.png" class="floating" style="top:58.019375672766415%;left:56.74418604651163%;">
      <img src="static/images_bg/square.png" class="floating" style="top:8.611410118406889%;left:72.66149870801034%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:31.32400430570506%;left:58.50129198966408%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:69.96770721205597%;left:81.44702842377261%;">
      <img src="static/images_bg/circle.png" class="floating" style="top:15.069967707212056%;left:32.299741602067186%;">
      <img src="static/images_bg/circle.png" class="floating" style="top:13.02475780409042%;left:45.94315245478036%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:55.86652314316469%;left:27.131782945736433%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:49.515608180839614%;left:53.746770025839794%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:34.55328310010764%;left:49.6124031007752%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:33.153928955866526%;left:86.09819121447029%;">
      <img src="static/images_bg/square.png" class="floating" style="top:28.094725511302475%;left:25.16795865633075%;">
      <img src="static/images_bg/circle.png" class="floating" style="top:39.720129171151775%;left:10.801033591731267%;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:77.82561894510226%;left:24.392764857881136%;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:2.798708288482239%;left:47.855297157622736%;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:71.3670613562971%;left:66.40826873385014%;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:31.216361679224974%;left:76.89922480620154%;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:46.39397201291712%;left:38.86304909560724%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:3.4445640473627557%;left:19.58656330749354%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:3.552206673842842%;left:6.2015503875969%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:77.28740581270183%;left:4.547803617571059%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:0.8611410118406889%;left:71.11111111111111%;">
      <img src="static/images_bg/square.png" class="floating" style="top:23.681377825618945%;left:63.25581395348837%;">
      <img src="static/images_bg/square.png" class="floating" style="top:81.27018299246501%;left:45.116279069767444%;">
      <img src="static/images_bg/square.png" class="floating" style="top:60.92572658772874%;left:42.22222222222222%;">
      <img src="static/images_bg/square.png" class="floating" style="top:28.955866523143165%;left:93.90180878552971%;">
      <img src="static/images_bg/square.png" class="floating" style="top:51.991388589881595%;left:68.88888888888889%;">
      <img src="static/images_bg/square.png" class="floating" style="top:81.48546824542518%;left:83.56589147286822%;">
      <img src="static/images_bg/square.png" class="floating" style="top:11.517761033369215%;left:91.47286821705427%;">
      <img src="static/images_bg/cross.png" class="floating" style="top:38.32077502691066%;left:19.069767441860463%;animation-delay:-4.7s;">
      <img src="static/images_bg/cross.png" class="floating" style="top:0.6458557588805167%;left:0.7751937984496124%;animation-delay:-2.6s;">
      <img src="static/images_bg/cross.png" class="floating" style="top:96.1248654467169%;left:73.48837209302326%;animation-delay:-1s;">
      <img src="static/images_bg/cross.png" class="floating" style="top:81.59311087190528%;left:95.96899224806202%;animation-delay:-4.55s;">
      <img src="static/images_bg/cross.png" class="floating" style="top:86.54467168998923%;left:16.175710594315245%;animation-delay:-2.9s;">
      <img src="static/images_bg/square.png" class="floating" style="top:35.19913885898816%;left:49.354005167958654%;animation-delay:-1.65s;">
      <img src="static/images_bg/square.png" class="floating" style="top:5.8127018299246505%;left:85.94315245478036%;animation-delay:-0.25s;">
      <img src="static/images_bg/square.png" class="floating" style="top:61.67922497308934%;left:3.152454780361757%;animation-delay:-3.25s;">
      <img src="static/images_bg/square.png" class="floating" style="top:28.094725511302475%;left:5.684754521963824%;animation-delay:-0.85s;">
      <img src="static/images_bg/square.png" class="floating" style="top:68.89128094725511%;left:33.59173126614987%;animation-delay:-4.4s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:35.62970936490851%;left:28.217054263565892%;animation-delay:-1.75s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:1.8299246501614639%;left:24.237726098191214%;animation-delay:-0.05s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:96.01722282023681%;left:50.3359173126615%;animation-delay:-3.65s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:92.78794402583424%;left:74.16020671834626%;animation-delay:-2.4s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:92.35737351991389%;left:60.41343669250646%;animation-delay:-1.6s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:89.02045209903122%;left:13.38501291989664%;animation-delay:-4.1s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:88.91280947255113%;left:31.989664082687337%;animation-delay:-2.7s;">
      <img src="static/images_bg/cross.png" class="floating" style="top:88.48223896663079%;left:8.837209302325581%;animation-delay:-5s;">
      <img src="static/images_bg/square.png" class="floating" style="top:94.18729817007535%;left:63.15245478036176%;animation-delay:-3.2s;">
      <img src="static/images_bg/square.png" class="floating" style="top:65.1237890204521%;left:94.00516795865633%;animation-delay:-1.65s;">
      <img src="static/images_bg/square.png" class="floating" style="top:50.91496232508073%;left:74.67700258397933%;animation-delay:-4.9s;">
      <img src="static/images_bg/square.png" class="floating" style="top:87.19052744886976%;left:69.56072351421189%;animation-delay:-3.7s;">
      <img src="static/images_bg/square.png" class="floating" style="top:45.85575888051668%;left:34.57364341085271%;animation-delay:-2.35s;">
      <img src="static/images_bg/square.png" class="floating" style="top:59.526372443487624%;left:6.976744186046512%;animation-delay:-1.25s;">
      <img src="static/images_bg/cross.png" class="floating" style="top:74.70398277717976%;left:20.20671834625323%;animation-delay:-4.75s;">
      <img src="static/images_bg/cross.png" class="floating" style="top:13.02475780409042%;left:9.095607235142118%;animation-delay:-3.25s;">
      <img src="static/images_bg/cross.png" class="floating" style="top:72.65877287405813%;left:46.97674418604651%;animation-delay:-2.35s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:0.6458557588805167%;left:10.645994832041344%;animation-delay:-5s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:21.205597416576964%;left:4.857881136950905%;animation-delay:-3.15s;">
      <img src="static/images_bg/circle.png" class="floating" style="top:88.3745963401507%;left:0.8268733850129198%;animation-delay:-1.1s;">
      <img src="static/images_bg/circle.png" class="floating" style="top:93.43379978471475%;left:98.65633074935401%;animation-delay:-4.4s;">
      <img src="static/images_bg/circle.png" class="floating" style="top:1.5069967707212055%;left:81.18863049095607%;animation-delay:-2.9s;">
      <img src="static/images_bg/circle.png" class="floating" style="top:20.77502691065662%;left:54.67700258397933%;animation-delay:-1.35s;">
      <img src="static/images_bg/cross.png" class="floating" style="top:4.736275565123789%;left:42.11886304909561%;animation-delay:-4.2s;">
      <img src="static/images_bg/triangle.png" class="floating" style="top:36.167922497308936%;left:18.294573643410853%;animation-delay:-2.4s;">
      <img src="static/images_bg/square.png" class="floating" style="top:59.84930032292788%;left:17.57105943152455%;animation-delay:-1s;">
	  </div>
	</div>


	<main>
		<header class="header">
			<div class="container">
				<div class="row justify-content-between align-items-center p">
					<div class="header__brand">
						<!-- <h1><a href="index.php"><?php echo $config['tittle'] ?></a></h1> -->
						<a href="index.php">
							<img class="logo" src="static/logo.png" alt="">
						</a>
					</div>
					
					<?php 
					if($_SESSION['auth'] >= 1) {
						echo '<h1 class="slogo d-inline-block">Авторизація успішна</h1>';
						$_SESSION['auth']++;
						if($_SESSION['auth'] == 3) 
							$_SESSION['auth'] = 0;
					}
					else echo '<h1 class="slogo d-inline-block">Game Shop</h1>'
					?>
					<div class="sign">
						<ul>
							<?php 
							$id_client = $_SESSION['id_client'];
							if(!empty($_SESSION['login'])) { ?>
								<li role="button"><a href="form-out.php">Вийти</a></li>
								<li role="button"><a href="client.php?id=<?php echo $id_client ?>"><?= $_SESSION['login']; ?></a></li><?php
							} else { ?>
								<li role="button"><a href="form-up.php">Реєстрація</a></li>
								<li role="button"><a href="form-in.php">Вхід</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</header>

			<nav class="nav">
				<div class="container">
					<div class="row">
						<div class="nav__menu flex-column flex-md-row padd">
							<div class="row justify-content-between align-items-center d-md-none">
								<div class="col-auto">
									<h2>Жанри: </h2>
								</div>
								<div class="col-auto">
									<div class="hamburger" type="button">
										<div class="hamburger__top"></div>
										<div class="hamburger__middle"></div>
										<div class="hamburger__bottom"></div>
									</div>
								</div>
							</div>
							<canvas id="canvas-header" class="canvas"></canvas>
							<ul class="menu d-none d-md-flex flex-column flex-md-row">
								<?php 
								$genres = mysqli_query($connection, "select idGenre, nameGenre from genre");

								while ( $genre = mysqli_fetch_assoc($genres)) 
								{
									?>
									<li role="button"><a href="index.php?genre=<?php echo $genre['idGenre']; ?>"><?php echo $genre['nameGenre']; ?></a></li>
									<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</nav>
