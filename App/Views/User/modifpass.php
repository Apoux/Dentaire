<h2 class="center">Modifier son mot de passe</h2>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">

    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <form method="post">
            <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
            <?= $form->input('passwordverif', 'Répétez votre Mot de passe', ['type' => 'password','value'=>'password']); ?>
            <?= $form->submit('Modifier votre mot de passe'); ?>
        </form>
    </div>
</div>
<p class="center<?php if($error[0] == 'C'): ?> green <?php else: ?> red <?php endif ?>bold"><?php echo $error; ?></p>
