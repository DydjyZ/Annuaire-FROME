<?php include('config.php'); ?>
<?php include('site-top.php'); ?>
<body class="home blog one-footer-sidebar">
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner" style='background: url(http://frome.fr/wp-content/uploads/2017/09/FullSizeRender.jpg); background-size: cover; background-position: center;'>
			<a class="home-link" href="https://frome.fr/" title="FROME" rel="home">
            <img src="http://frome.fr/wp-content/uploads/2017/09/nlogo-wout.png" style="width: auto; height: 180px; margin-top: 0px; margin-bottom: 0px;" class="">
				    
				    
    				<!--<h1 class="site-title"></h1>
    				<h2 class="site-description"></h2>-->
    				<!--<br />
    				<span style="font-size: 16px; color: white; text-align: center; font-family: 'Montserrat', sans-serif; font-weight: 200;">Le cabinet de conseil créé par des entrepreneurs afros pour des entrepreneurs afros</span>-->
			</a>
<?php include('site-menu.php'); ?>
            <form role="search" method="get" class="search-form" action="#">
                
				<label>
					<span class="screen-reader-text">Rechercher :</span>
					<input type="search" class="search-field" placeholder="Recherche&hellip;" value="" name="search" />
				</label>
				<input type="submit" class="search-submit" value="Rechercher" />
			</form>				

                </nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		
  <h1>Soumettre une entreprise</h1>
<?php
    if(!empty($_POST['submitbutton'])) {
        echo "<div class='alert alert-success'><b>Votre demande a été envoyée !</b></div>";
        
    }
            
?>
Merci de nous donner quelques détails concernant votre entreprise, après examen celle-ci sera acceptée ou rejetée de notre annuaire en ligne.
            <br />
            <br />
<form id="form" method="post" action="#" class="form-horizontal" role="form">
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email :</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Email de l'entreprise...">
    </div>
  </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Tel :</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Tel de l'entreprise...">
    </div>
  </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Adresse:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Adresse de l'entreprise...">
    </div>
  </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Ville :</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" placeholder="Ville...">
    </div>
    <label class="control-label col-sm-2" for="email">CP :</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" placeholder="Code Postal...">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Description:</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="5" id="comment" placeholder="Description de votre entreprise, en quoi peut-elle être utile..."></textarea>
    </div>
  </div>
    
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="submitbutton" value="Envoyer">Envoyer</button>
    </div>
  </div>
</form>   
            
            
            
            
            
		</div><!-- #content -->
	</div><!-- #primary -->

	<div id="secondary" class="sidebar-container" role="complementary">
		<div class="widget-area">
			<aside id="text-2" class="widget widget_text"><h3 class="widget-title"><!--À propos de ce site--></h3>			
                <div class="textwidget">
                    <p>
                        ICI TEXTE DROITE !
                    </p>
                </div>
		</aside>		
        </div><!-- .widget-area -->
	</div><!-- #secondary -->

            
            
		</div><!-- #main -->
<?php include("site-bottom.php"); ?>