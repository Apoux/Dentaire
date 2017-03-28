<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <h3 class="center"><u> Votre Adresse de livraison</u></h3>
        <?php if (isset($infoLivraison)){ ?>
            <p>Votre adresse actuelle est  : <?php echo $infoLivraison->adresse_livraison ?></p>
            <p>Votre ville actuelle est  : <?php echo $infoLivraison->ville_livraison ?></p>
            <p>Votre code postal actuel est  : <?php echo $infoLivraison->cp_livraison ?></p>
            <p>Votre pays actuel est  : <?php echo $infoLivraison->pays_livraison ?></p>
        <?php }else{ ?>
            <p>Vous n'avez pas d'adresse de livraison actuellement</p>
        <?php } ?>
    </div>
</div>
</br>
</br>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <h3 class="center"><u><?php if (isset($infoLivraison)){ ?>Modifier Votre adresse de livraison<?php }else{ ?>Ajouter votre adresse de livraison<?php } ?></u></h3>
        <form method="post">
            <?= $form->input('adresse', 'Adresse', ['type' => 'text']); ?>
            <?= $form->input('ville', 'Ville', ['type' => 'text']); ?>
            <?= $form->input('cp', 'Code Postal', ['type' => 'text']); ?>
            <?= $form->input('pays', 'Pays', ['type' => 'text']); ?>
            <?= $form->submit('Modifier son Adresse de Livraison'); ?>
        </form>
    </div>
</div>
<p class="center<?php if($error[0] == 'C'): ?> green <?php else: ?> red <?php endif ?>bold"><?php echo $error; ?></p>
<br />
