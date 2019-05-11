		<footer class="footer">
			<canvas id="canvas-footer" class="canvas"></canvas>
			<div class="container">
				<div class="row justify-content-between align-items-center m0">
					<div class="footer__slogo">
						<h1 class="slogo"><a href="index.php"><?php echo $config['tittle'] ?></a></h1>
					</div>
					<div class="footer__brand">
						<a href="index.php"><img class="logo" src="static/logo.png" alt=""></a>
					</div>
				</div>
			</div>
		</footer>

	</main>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/granim.js"></script>
	<script src="js/script.js"></script>
</body>
</html>

<?php 
mysqli_close($connection); ?>