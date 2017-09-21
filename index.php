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
		
            <div class="col-sm-12 text-center well" style="margin-bottom: 8px; padding: 5px;"> 
                <div class="form-group form-inline" style="margin-bottom: 0;">
                          <label for="sel1">Filtre :</label>
                          <select class="form-control" id="sel1">
                            <option value="1">Seulement les entreprises saines</option>
                            <option value="1">Seulement les entreprises non recommandées</option>
                            <option value="1">Classer par distance</option>
                          </select>
                </div>
            </div>
            
            
<?php
if(!empty($_GET['search'])) {         
    echo"<div class='panel panel-default text-center'>
        <div class='panel-body text-center'> <h4 style='margin-top: 0px; margin-bottom: 0px;'>Votre recherche : ".$_GET['search']."</h4> </div>
      </div>";
}
            
            
$resultsperpage = 10;
if(!isset($_GET['limit'])) {
    $thatlimit[0] = 0;
    $thatlimit[1] = $resultsperpage;
} else {
    if(is_numeric($_GET['limit'])) {
        $thatlimit[0] = $resultsperpage * ($_GET['limit']);
        $thatlimit[1] = $resultsperpage;
    }
}
$fulllimit = $thatlimit[0].",".$thatlimit[1];

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
// +++++++++++++++++++ CETTE REQUETE SERT À SAVOIR LE NOMBRE TOTAL D'ENTREPRISES
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
if(empty($_GET['search'])) {
    $query2 = $dbPDO->prepare("SELECT * FROM entreprises WHERE type = 1 OR type = 2");
} else {
    $search = "%".$_GET['search']."%";
    $query2 = $dbPDO->prepare("SELECT * FROM entreprises WHERE (type = 1 OR type = 2) AND (nom LIKE :search OR  adresse LIKE :search)");
    $query2->bindParam(':search',$search);
}
$query2->execute();            
$thiscount = $query2->rowCount();
            
            
if(empty($_GET['search'])) {
    $query = $dbPDO->prepare("SELECT * FROM entreprises WHERE type = 1 OR type = 2 LIMIT ".$fulllimit);
} else {
    $search = "%".$_GET['search']."%";
    $query = $dbPDO->prepare("SELECT * FROM entreprises WHERE (type = 1 OR type = 2) AND (nom LIKE :search OR adresse LIKE :search) LIMIT ".$fulllimit);
    $query->bindParam(':search',$search);
}
$query->execute();
while ($row = $query->fetch())
{
    $straddr = str_replace(" ", "+", $row['adresse']." ".$row['ville']." ".$row['codepostal']);
    if($row['type'] == 1) {
        $entreprise = "<span style='color: green;'><i class='fa fa-smile-o' aria-hidden='true'></i> <b>Entreprise saine</b></span>";
    } else if($row['type'] == 2) {
        $entreprise = "<span style='color: red;'><i class='fa fa-frown-o' aria-hidden='true'> <b>Entreprise déconseillée</b></span>";
    }
    echo "
    <div class='col-sm-12'>
        <div class='panel panel-default'>
            <div class='panel-body text-center'>
                <b><big>".$row['nom']."</b></big> - ".$row['domaine']."
                <br />
                ".$entreprise."
            </div>
            <div class='panel-footer'>
                ".$row['adresse']." ".$row['ville'].", ".$row['codepostal']."
                <span class='pull-right'><a href='#' class='btn btn-success btn-xs'  data-toggle='modal' data-target='#modal".$row['id']."'>Fiche</a></span>
            </div>
        </div>
    </div>
    
    
    
    
    <div id='modal".$row['id']."' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header text-center'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title' style='margin-top: 0; margin-bottom: 0;'><big>".$row['nom']."</b></big></h4>
      </div>
      <div class='modal-body'>
 
       <div class='panel panel-default'>
        <div class='panel-body'> 
            <li class='fa fa-phone' aria-hidden='true'></li>&nbsp; ".$row['tel']."
            <br />
            <li class='fa fa-envelope-o' aria-hidden='true'></li>&nbsp; ".$row['email']."
            <br />
            <li class='fa fa-home' aria-hidden='true'></li>&nbsp; ".$row['adresse']." ".$row['ville'].", ".$row['codepostal']."
            <br />
            ".$entreprise."
        </div>
      </div>
      
      <div class='panel panel-default text-center'>
        <div class='panel-body text-center'> ".$row['description']." </div>
      </div>
        <hr />
        <img src='https://maps.googleapis.com/maps/api/staticmap?center=".$straddr."&zoom=16&scale=2&size=600x300&maptype=roadmap&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:1%7C".$straddr."' class='img-responsive'>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
      </div>
    </div>

  </div>
</div>


    ";
}            
if($thiscount ==0) echo "<center><b>Aucun résultat...</b></center>";
// ici affichage du paging !
$i = 0;
$nbrpages = $thiscount / $resultsperpage;
echo "<p class='text-center'>";
while ($i <= $nbrpages) {
    $affichage = $i +1;
   echo "<a href='index.php?limit=".$i."'> &nbsp; ";
   if(@$_GET['limit'] == $affichage-1) {
       echo "<span style='color: black;'>".$affichage."</span>";
   } else {
       echo $affichage;
   }
   echo " &nbsp; </a>";


    $i++;
}
echo "</p>";
?>
		
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