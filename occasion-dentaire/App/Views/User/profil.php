<h2 class="center">Page Profil</h2>

<div class="row">
    <h4>Hello world</h4>
</div>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <form method="post">
            <?= $form->input('civilite', 'Votre civilité', ['value'=>$user->civilite_personne]); ?>
            <?= $form->input('nom', 'Votre nom', ['value'=>$user->nom_personne]); ?>
            <?= $form->input('prenom', 'Votre prénom', ['value'=>$user->prenom_personne]); ?>
            <?= $form->input('ddn', 'Votre date de naissance', ['type'=>'date','value'=>$user->ddn_personne]); ?>
            <?= $form->select('type', 'Votre êtes ?', $listeType); ?>
            <?= $form->input('pays', 'Votre pays', ['value'=>$user->pays_personne]); ?>
            <?= $form->select('dept', 'Votre département', $listeDept); ?>
            <?= $form->input('cp', 'Votre code postal', ['value'=>$user->codepostal_personne]); ?>
            <?= $form->input('ville', 'Votre ville', ['value'=>$user->ville_personne]); ?>
            <?= $form->input('adresse', 'Votre adresse', ['value'=>$user->adresse_personne]); ?>
            <?= $form->input('tel', 'Votre numéro de téléphone', ['value'=>$user->telephone_personne]); ?>
            <?= $form->input('mobile', 'Votre numéro de mobile', ['value'=>$user->mobile_personne]); ?>
            <?= $form->input('fax', 'Votre numéro de fax', ['value'=>$user->fax_personne]); ?>
            <?= $form->submit('Modifier les informations du profil !'); ?>
        </form>
    </div>
</div>
<p class="center<?php if($error[0] == 'C'): ?> green <?php else: ?> red <?php endif ?>bold"><?php echo $error; ?></p>
<br />
<?php var_dump($_SESSION['user_id']); ?>