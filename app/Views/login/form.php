<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>

<?php

function setLoginVal($field, $datas) {
	if (isset($datas[$field]) && $datas[$field]) {
		return $datas[$field];
	}
	return '';
}
?>

<h2>Connectez-vous !</h2>
<?php $this->insert('includes/flashmessages', array('fmsg' => $fmsg)); ?>

<form action="login" method="post">
	<div class="form-group">
		<label for="InputUsername">
			Nom d'utilisateur ou email
		</label>
		<input type="text" class="form-control" name="username" id="InputUsername" value="<?php echo setLoginVal('username', $datas); ?>"/>
	</div>
	
	<div class="form-group">
		<label for="InputPassword">
			Mot de passe
		</label>
		<input type="password" class="form-control" name="password" id="InputPassword"/>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Connexion</button>
	</div>
</form>

<p>Pas encore inscrit ? Remplissez le <a href="register" title="Rejoindre le formulaire d'inscription">formulaire d'inscription</a></p>
<?php $this->stop('main_content') ?>
