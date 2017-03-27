<h2 class="center">Page Login</h2>
<link href="<?= PATH ?>/Public/css/styles.css" rel="stylesheet">
<div class="row">
    <div id="login" class="col-lg-8 col-lg-offset-2">
        <div id="login">
            <form method="post">
                <?= $form->input('email', 'Email', ['type' => 'email']); ?>
                <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
                <?= $form->submit('Se connecter !'); ?>
            </form>
        </div>
    </div>
</div>
<p class="center red bold"><?php echo $error; ?></p>
