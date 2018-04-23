<?PHP

if(isset($_SESSION["user"]) OR isset($_SESSION["admin"])){

	if(isset($_SESSION["admin"]) AND isset($_GET["menu"]) AND $_GET["menu"] == "admin7pan15"){
	
		//include("inc/_admin_menu.php");
	
	}elseif(isset($_SESSION["user"])){ 
		
		
		} else include("inc/_login.php");
	
} else include("inc/_login.php");

?>
