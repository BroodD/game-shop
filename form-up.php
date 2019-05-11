<?php include "includes/header.php"; ?>

	<div class="content">
		<div class="container">
			<div class="row">
				<section class="col-md-8 content__left">
					<div class="content__wrap">
						<h4 class="content__head">Реєстрація</h3>
						<div class="block__content">
							<form id="form" clas="form" method="POST" action="form-up.php#form">
							<?php
							if(isset($_POST['do'])) {
								$errors = array();
								$now = date_create(date(DATE_ATOM));
								$now = date_format($now,"Y-m-d");

								if($_POST['loginClient'] == '')
								{
									$errors[] = 'Введіть логін';
								}
								if($_POST['passClient'] == '')
								{
									$errors[] = 'Введіть пароль';
								}
								if($_POST['nameClient'] == '')
								{
									$errors[] = 'Введіть ім`я';
								}
								if($_POST['surnameClient'] == '')
								{
									$errors[] = 'Введіть прізвище';
								}
								if($_POST['emailClient'] == '')
								{
									$errors[] = 'Введіть email';
								}
								if($_POST['phoneClient'] == '')
								{
									$errors[] = 'Введіть телефон';
								}
								if($_POST['seriaClient'] == '')
								{
									$errors[] = 'Введіть серію паспорта';
								}
								if($_POST['bornClient'] == '')
								{
									$errors[] = 'Не вірна дата народження';
								}

								if(empty($errors))
								{
								mysqli_query($connection, "insert into `client` (`loginClient`, `passClient`, `nameClient`, `surnameClient`, `emailClient`, `phoneClient`, `seriaClient`, `bornClient`) 
                  values('". $_POST['loginClient'] ."', '". md5($_POST['passClient']) ."', '". $_POST['nameClient'] ."', '". $_POST['surnameClient'] ."', '".$_POST['emailClient']."', '". $_POST['phoneClient'] ."', '". $_POST['seriaClient'] ."', '". $_POST['bornClient'] ."')");
								$_SESSION['auth'] = 1;
									?>
									<script type="text/javascript">
										window.history.go(-2);
									</script>      
									<?php
									
									echo '<h4 class="content__head">Авторизація успішна</h4>';
								}else 
								{
									echo '<h4 class="content__head error">' . $errors['0'] . '</h4>';
								}
							}
							?>
								<div class="row form__row">
									<div class="form__group col">
										<input type="text" name="loginClient" placeholder="Логін" value="<?php echo $_POST['loginClient']; ?>">
									</div>
									<div class="form__group col">
										<input type="password" name="passClient" placeholder="Пароль" value="<?php echo $_POST['passClient']; ?>">
									</div>
								</div>
								<div class="row form__row">
									<div class="form__group col">
										<input type="text" name="nameClient" placeholder="Ім'я" value="<?php echo $_POST['nameClient']; ?>">
									</div>
									<div class="form__group col">
										<input type="text" name="surnameClient" placeholder="Прізвище" value="<?php echo $_POST['surnameClient']; ?>">
									</div>
								</div>
								<div class="row form__row">
									<div class="form__group col">
										<input type="email" name="emailClient" placeholder="Email" required value="<?php echo $_POST['emailClient']; ?>">
									</div>
									<div class="form__group col">
										<input type="text" name="phoneClient" placeholder="Телефон" required value="<?php echo $_POST['phoneClient']; ?>">
									</div>
								</div>
								<div class="row form__row">
									<div class="form__group col">
										<input type="number" name="seriaClient" placeholder="Серія паспорта" required value="<?php echo $_POST['seriaClient']; ?>">
									</div>
									<div class="form__group col">
										<input type="date" name="bornClient" placeholder="Дата народження" value="<?php echo $_POST['bornClient'] ?>"
										required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
									</div>
								</div>
								<div class="row form__row">
									<div class="form__group col-auto">
										<input type="submit" role="button" name="do" value="Надіслати">
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