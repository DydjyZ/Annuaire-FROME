<?php
/*$connect = new mysqli('newcut.fr.mysql','newcut_fr','CJRhuGuC','newcut_fr');
if(!$connect) {
    echo "error mamène";
}*/
define('HOST', 'localhost');
define('BDD', 'annuaire');
define('USER', 'root');
define('PW', '');
try{

    $dbPDO = new PDO('mysql:host='.HOST.';dbname='.BDD, USER, PW);
    $dbPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){

    print "Error!: " . $e->getMessage() . "<br />";
    die();

}
date_default_timezone_set("Europe/Paris");

?>