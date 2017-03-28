<h2 class="center">Page d'inscription</h2>

<div class="row">
    <div class="col-lg-8 col-lg-offset-1">
        <form method="post">
            <h2>Informations connexion</h2>
            <?= $form->input('email', 'Email', ['type' => 'email']); ?>
            <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
            <?= $form->input('password_verif', 'Répeter le mot de passe', ['type' => 'password']); ?>
            <h2>Informations Personnelles</h2>
            <?= $form->input('nom', 'Nom', ['type' => 'text']); ?>
            <?= $form->input('prenom', 'Prénom', ['type' => 'text']); ?>
            <?= $form->input('ddn','Date de Naissance',['type'=>'date']); ?>
            <?= $form->select('civilite','Civilité',$option=['M.','Mme','Mlle']); ?>
            <?= $form->select('typepersonne','Vous êtes ?',$listeType); ?>
            <?= $form->select('departement','Département',$listeCP) ?>
            <?= $form->input('cp', 'Code Postal',['type' => 'text','required' => 'false']); ?>
            <?= $form->input('ville', 'Ville', ['type' => 'text','required' => 'false']); ?>
            <?= $form->input('pays', 'Pays',['type' => 'text','required' => 'false']); ?>
            <?= $form->input('telephone', 'Téléphone', ['type' => 'text','required' => 'false']); ?>
            <?= $form->input('mobile', 'Mobile', ['type' => 'text','required' => 'false']); ?>
            <?= $form->input('fax', 'Fax',['type' => 'text','required' => 'false']); ?>
            <?= $form->input('cgu','En validant vous confirmez avoir lu et pris connaisance des <a href="'.PATH.'/Home/cgu">Conditions générales d\'utilisation</a>',['type'=>'checkbox']) ?>
            <?= $form->submit('S\'enregistrer !'); ?>
        </form>
    </div>
</div>
<br />
<p class="center<?php if($error[0] == 'C'): ?> green <?php else: ?> red <?php endif ?>bold"><?php echo $error; ?></p>
