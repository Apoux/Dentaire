<h2 class="center">Page add annonces</h2>
<?php var_dump($listeType ,$listeCategorie)?>
<div class="row">
    <div class="col-lg-8 col-lg-offset-1">
        <?php if($suite == 0){?>
        <form method="post">
            <h2>Première étape de création</h2>
            <?= $form->select('choix','Prolongement date expiration',$option=['3 mois','6 mois','12 mois']); ?>
            <?= $form->input('description', 'Description de votre annonce', ['type' => 'textarea']); ?>
            <?= $form->submit('Prochaine étape !') ?>
        </form>
        <?php }if($suite == 1){ ?>
            <form method="post">
                <h2>Deuxieme étape de création</h2>
                <?= $form->select('type','Type',$listeType)?>
                <?= $form->input('marque','Marque',['type'=>'text']); ?>
                <?= $form->select('etat','Etat du produit',$option=['0','1','2','3','4','5','6']); ?>
                <?= $form->input('date','Date d\'achat',['type'=>'date']); ?>
                <?= $form->select('garantie','Garantie',$options=['Non','Oui']); ?>
                <?= $form->input('prix','Prix TTC',['type'=>'text']); ?>
                <?= $form->select('idcat','Categorie du produit',$listeCategorie)?>
                <?= $form->submit('Prochaine étape !') ?>
            </form>
        <?php }if($suite == 2){ ?>
            <form method="post">
                <h2>Deuxieme étape de création</h2>
                <?= $form->select('type','Type',$listeType)?>
                <?= $form->input('marque','Marque',['type'=>'text']); ?>
                <?= $form->select('etat','Etat du produit',$option=['0','1','2','3','4','5','6']); ?>
                <?= $form->input('date','Date d\'achat',['type'=>'date']); ?>
                <?= $form->select('garantie','Garantie',$options=['Non','Oui']); ?>
                <?= $form->input('prix','Prix TTC',['type'=>'text']); ?>
                <?= $form->select('idcat','Categorie du produit',$listeTypeAnnonceOD=['test','avis'])?>
                <?= $form->submit('Finaliser son annonceOD') ?>
            </form>
        <?php }?>

    </div>
</div>
<br />
<p class="center<?php if($error[0] == 'C'): ?> green <?php else: ?> red <?php endif ?>bold"><?php echo $error; ?></p>
<?php var_dump($suite); ?>