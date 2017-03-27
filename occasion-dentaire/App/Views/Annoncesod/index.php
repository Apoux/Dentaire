<h2 class="center">Page Annonces Occasion Dentaire</h2>
<table class="table">
    <thead>
    <tr>
        <td>
            <b>Auteur de l'annonce</b>
        </td>
        <td>
            <b>Date de création de l'annonce</b>
        </td>
        <td>
            <b>Description de l'annonce</b>
        </td>
        <td>
            <b>Date d'expiration de l'annonce</b>
        </td>
        <td>

        </td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($annonces as $key => $annonce): ?>
        <tr>
            <td>
                <?= $annonce->getPersonne()->getPseudo() ?>
            </td>
            <td>
                <?= $annonce->getDatecreation_annonce() ?>
            </td>
            <td>
                <?= $annonce->getDescription_annonce() ?>
            </td>
            <td>
                <?= $annonce->getDateexpiration_annonce() ?>
            </td>
            <td>
                <a href="<?= PATH ?>/annoncesod/view_annonce/<?= $annonce->getId_annonceod() ?>"><button class="btn btn-success">Voir annonce en détail</button></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-12">
        <ul class="pagination">
        <?php for ($i = 1; $i <= $nbitems; $i++) {
            if($i == $nbitems){
                echo'<li><a href="'.PATH.'/annoncesod/index?page='.$i.'">'.$nbitems.'</a></li>';
            }else{
                echo '<li><a href="'.PATH.'/annoncesod/index?page='.$i.'">'.$i.'</a></li>';
                //'.PATH.'
            }
        }
        ?>
        </ul>
    </div>
</div>