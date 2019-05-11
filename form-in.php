<?php include "includes/header.php"; ?>

	<div class="content">
		<div class="container">
			<div class="row">
				<section class="col-md-8 content__left">
					<div class="content__wrap">
						<h4 class="content__head">Авторизація</h4>
						<div class="block__content">
							<form id="form" class="form" method="POST" action="form-in.php#form">
							<?php
							if(isset($_POST['do'])) {
								$errors = array();

								$login = mysqli_real_escape_string($connection, $_POST['loginClient']);
								$pass  = mysqli_real_escape_string($connection, $_POST['passClient']);

								if($login == '')
								{
									$errors[] = 'Введіть логін';
								}
								if($pass == '')
								{
									$errors[] = 'Введіть пароль';
								}


								$query = "select `loginClient`, `passClient` from `client` where `loginClient`='$login' AND `passClient`=md5('$pass')";
								$okey = mysqli_query($connection, $query);

								if(mysqli_num_rows($okey) <= 0) {
									$errors[] = "Дані неправильні";
								}

								if(mysqli_num_rows($okey) > 0 )
								{
									$_SESSION['login']=$login;
									$id_user = mysqli_query($connection, "select `idClient` from `client` where `loginClient` = '$login'");

									$id_user = mysqli_fetch_assoc($id_user);

									$_SESSION['id_client'] = $id_user['idClient'];
									$_SESSION['auth'] = 1;

									?>
									<script type="text/javascript">
										window.history.go(-2);
									</script>      
									<?php
									
									echo '<h4 class="content__head">Авторизація успішна</h4>';
								} else {
									echo '<h4 class="content__head error">' . $errors['0'] . '</h4>';
								}
							}
							?>
								<div class="row form__row">
									<div class="form__group col">
										<input type="text" name="loginClient" class="fc" placeholder="Login" value="<?php echo $login ?>">
									</div>
									<div class="form__group col">
										<input type="password" name="passClient" class="fc" placeholder="Password" value="<?php echo $pass ?>">
									</div>
								</div>
								<div class="row form__row">
									<div class="form__group col-auto">
										<input type="submit" role="button" name="do" value="Авторизуватися">
									</div>
								</div>
							</form>
						</div>  
					</div>
				</section>
				<?php include "includes/sidebar.php"; ?>
			</div>
		</div>
	</div>

<?php include "includes/footer.php"; ?>