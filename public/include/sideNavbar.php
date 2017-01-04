<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 03/01/2017
 * Time: 13:23
 */
?>
<div class="navbar navbar-inverse navbar-twitch" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <span class="small-nav"  data-toggle="tooltip" data-placement="right" title=""><span class="logo"> <img src="images/chirdent_47.png"> </span> </span>
                <span class="full-nav"> &lsaquo; Occasion-Dentaire.com &rsaquo; </span>
            </a>
        </div>
        <div class="">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="">
            <span class="small-nav" data-toggle="tooltip" data-placement="right" title="Dentiste-Remplacant.com">
              <span class="glyphicon glyphicon-search"></span>
            </span>
                        <span class="full-nav"> Dentiste-Remplacant.com </span>
                    </a>
                </li>
                <li>
                    <a href="">
            <span class="small-nav" data-toggle="tooltip" data-placement="right" title="Cabinet-Dentaire.com">
              <span class="glyphicon glyphicon-home"></span>
            </span>
                        <span class="full-nav"> Cabinet-Dentaire.com </span>
                    </a>
                </li>
                <li>
                    <a href="">
            <span class="small-nav" data-toggle="tooltip" data-placement="right" title="Assistante-Dentaire.com">
              <span class="fa fa-user-md"></span>
            </span>
                        <span class="full-nav"> Assistante-Dentaire.com </span>
                    </a>
                </li>
                <li>
                    <a href="">
            <span class="small-nav" data-toggle="tooltip" data-placement="right" title="Consentement-Eclaire.fr">
              <span class="fa fa-newspaper-o"></span>
            </span>
                        <span class="full-nav"> Consentement-Eclaire.fr </span>
                    </a>
                </li>
                <li>
                    <a href="http://sites-chirdent.net/#contact">
            <span class="small-nav" data-toggle="tooltip" data-placement="right" title="">
              <span class="glyphicon glyphicon-comment"></span>
            </span>
                        <span class="full-nav"> Nous contacter </span>
                    </a>
                </li>
                <li><hr></li>
                <li>
                    <a href="https://www.facebook.com/DentisteRemplacant">
            <span class="small-nav" data-toggle="tooltip" data-placement="right" title="">
              <i class="fa fa-facebook-official"></i>
            </span>
                        <span class="full-nav"> FaceBook (dentiste-remplacant) </span>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/pages/Chirdent/458633877617801">
            <span class="small-nav" data-toggle="tooltip" data-placement="right" title="">
              <i class="fa fa-facebook-official"></i>
            </span>
                        <span class="full-nav"> FaceBook (Chirdent) </span>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UC4UH1IrSD8E2eq85ANLY-vA">
            <span class="small-nav" data-toggle="tooltip" data-placement="right" title="">
              <i class="fa fa-youtube"></i>
            </span>
                        <span class="full-nav"> YouTube </span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/ChirdentSarl">
            <span class="small-nav" data-toggle="tooltip" data-placement="right" title="">
              <i class="fa fa-twitter"></i>
            </span>
                        <span class="full-nav"> Twitter </span>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<button type="button" class="btn btn-default btn-xs navbar-twitch-toggle hidden-xs">
    <span class="glyphicon glyphicon-chevron-right nav-open"></span>
    <span class="glyphicon glyphicon-chevron-left nav-close"></span>
</button>
<script type="text/javascript">
    $(document).ready(function() {
        $('.navbar-nav [data-toggle="tooltip"]').tooltip();
        $('.navbar-twitch-toggle').on('click', function(event) {
            event.preventDefault();
            $('.navbar-twitch').toggleClass('open');
        });
        $('.nav-style-toggle').on('click', function(event) {
            event.preventDefault();
            var $current = $('.nav-style-toggle.disabled');
            $(this).addClass('disabled');
            $current.removeClass('disabled');
            $('.navbar-twitch').removeClass('navbar-'+$current.data('type'));
            $('.navbar-twitch').addClass('navbar-'+$(this).data('type'));
        });
    });
</script>
