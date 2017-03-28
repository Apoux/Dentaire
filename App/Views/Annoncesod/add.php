<h2 class="center">Page d'inscription</h2>

<div class="row">
    <div class="col-lg-8 col-lg-offset-1">
        <form method="post">
            <h2>Informations connexion</h2>
            <?= $form->input('email', 'Email', ['type' => 'email']); ?>
            <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
            <?= $form->input('password_verif', 'Répeter le mot de passe', ['type' => 'password']); ?>
            <?= $form->submit('Creer son annonce !'); ?>
        </form>
    </div>
</div>
<br />
<p class="center<?php if($error[0] == 'C'): ?> green <?php else: ?> red <?php endif ?>bold"><?php echo $error; ?></p>
