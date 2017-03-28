<head>
    <!--<meta charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Occasion Dentaire</title>
    <link href="<?= PATH ?>/Public/css/bootstrap.css" rel="stylesheet">
    <link href="<?= PATH ?>/Public/css/styles.css" rel="stylesheet">
    <link href="<?= PATH ?>/Public/css/navBarLateral.css" rel="stylesheet">
    <script src="<?= PATH ?>/Public/js/jquery-2.2.4.js"></script>
    <script src="<?= PATH ?>/Public/js/bootstrap.js"></script>
    <script src="<?= PATH ?>/Public/js/navBarLateral.js"></script>
</head>
<!-- NavBar Twitch -->
<div class="navbar navbar-inverse navbar-twitch" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <span class="small-nav"> <span class="logo"> <B> </span> </span>
                <span class="full-nav"> < Bootsnipp > </span>
            </a>
        </div>
        <div class="">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Home">
							<span class="glyphicon glyphicon-home"></span>
						</span>
                        <span class="full-nav"> Home </span>
                    </a>
                </li>
                <li>
                    <a href="#about-us">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="About Us">
							<span class="fa fa-users"></span>
						</span>
                        <span class="full-nav"> About Us </span>
                    </a>
                </li>
                <li>
                    <a href="#contact-us">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Contact Us">
							<span class="glyphicon glyphicon-comment"></span>
						</span>
                        <span class="full-nav"> Contact Us </span>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<button type="button" class="btn btn-default btn-xs navbar-twitch-toggle">
    <span class="glyphicon glyphicon-chevron-right nav-open"></span>
    <span class="glyphicon glyphicon-chevron-left nav-close"></span>
</button>
<!-- -->
<body>
<div class="container">
    <nav class="navbar navbar-default" style="margin-top: 20px">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= PATH ?>/home/index">OccasionDentaire</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php if(\App\Model\PersonneRepository::logged()): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Votre Compte <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= PATH ?>/personne/profil">Profil</a></li>
                                <li><a href="<?= PATH ?>/personne/livraison">Modifier/Ajouter Votre Adresse de Livraison</a> </li>
                                <li><a href="<?= PATH ?>/personne/modifpass">Modifier son mot de passe</a> </li>
                            </ul>
                        </li>
                    <?php endif ?>
                    <?php if(\App\Model\PersonneRepository::loggedAdmin()): ?>
                        <li><a href="<?= PATH ?>/admin/index">Admin</a></li>
                    <?php endif ?>
                    <?php if (\App\Model\PersonneRepository::logged()):?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">En savoir + <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= PATH ?>/annoncesod/index">Annonces</a></li>
                                <li><a href="<?= PATH ?>/annoncesod/add">Ajouter Votre Annonces</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                    <li><a href="<?= PATH ?>/annoncesod/index">Annonces</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">En savoir + <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= PATH ?>/home/cgu">Voir les CGU</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(\App\Model\PersonneRepository::logged()): ?>
                    <li><a href="<?= PATH ?>/personne/logout">Deconnexion</a></li>
                    <?php else: ?>
                    <li><a href="<?= PATH ?>/personne/register">S'enregistrer</a></li>
                    <li><a href="<?= PATH ?>/personne/login">Connexion</a></li>
                    <?php endif ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
    <div class="row">
        <div class="col-lg-2">
            <div class="row">
                <label>Rechercher : </label>
            </div>
            <div class="row">
                <label>Catégories :</label>
            </div>
            <div class="row">
                <label>Paiement Sécurisé :</label>
            </div>
        </div>
        <div class="col-lg-8">
            <?php echo $content; ?>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
</div>
</body>
