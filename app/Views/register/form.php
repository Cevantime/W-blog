<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
<h2>
	Pour vous inscrire, complétez le formulaire ci-dessous
</h2>
<?php

function setRegisterVal($field, $datas) {
	if (isset($datas[$field]) && $datas[$field]) {
		return $datas[$field];
	}
	return '';
}
?>
<!--Les messages d'alerte-->

<?php $this->insert('includes/flashmessages', array('fmsg'=>$fmsg)); ?>

<form action="register" method="post">
	<div class="form-group">
		<label for="InputUsername">
			Nom d'utilisateur
		</label>
		<input type="text" class="form-control" name="username" id="InputUsername" value="<?php echo setRegisterVal('username', $datas); ?>"/>
	</div>
	<div class="form-group">
		<label for="InputEmail">
			Email
		</label>
		<input type="email" class="form-control" name="email" id="InputEmail" value="<?php echo setRegisterVal('email', $datas); ?>"/>
	</div>
	<div class="form-group">
		<label for="InputPassword">
			Mot de passe
		</label>
		<input type="password" class="form-control" name="password" id="InputPassword"/>
	</div>
	<div class="form-group">
		<label for="InputPasswordConfirm">
			Confirmez votre mot de passe
		</label>
		<input type="password" class="form-control" name="passwordconfirm" id="InputPasswordConfirm"/>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Je m'inscris</button>
	</div>
</form>
<?php $this->stop('main_content') ?>
