<?php
require_once("konf.php");
global $yhendus;
if(!empty($_REQUEST["korras_id"])){
$kask=$yhendus->prepare("UPDATE rulood SET puuvalmis = 1 WHERE id = ?");
$kask->bind_param("i", $_REQUEST["korras_id"]);
$kask->execute();
}
if(!empty($_REQUEST["vigane_id"])){
$kask=$yhendus->prepare("UPDATE rulood SET puuvalmis = 2 WHERE id = ?");
$kask->bind_param("i", $_REQUEST["vigane_id"]);
$kask->execute();
}
$kask=$yhendus->prepare("SELECT id, mustinr FROM rulood WHERE puuvalmis = -1 OR puuvalmis = 2");
$kask->bind_result($id, $mustinr);
$kask->execute();
?>
<!doctype html>
<html lang="et">
<head>
    <title>Värvimine</title>
    <script src="script/script.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<h1>Aknaruloode tootmine | Edgar Neverovski TARpv21</h1>
<header>
    <div class="navbar" id="myNavbar">
        <a href="index.php">Pealeht</a>
        <a href="mustr.php">Mustri Sisestamine</a>
        <a href="loikamine.php">Lõikamine</a>
        <a href="varvimine.php">Värvimine</a>
        <a href="tellimusteLeht.php">Tellimused</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
</header>
<h2>Värvimine</h2>
<table>
    <tr>
        <th>Tellimuse ID</th>
        <th>Mustri number</th>
        <th>Värvimise etapp</th>
    </tr>
    <?php
    while($kask->fetch()){
        echo "
		    <tr>
			  <td>$id</td>
			  <td>$mustinr</td>
			  <td>
			    <a href='?korras_id=$id'>Tehtud</a>
			    <a href='?vigane_id=$id'>Pole tehtud</a>
			  </td>
			</tr>
		  ";
    }
    ?>
</table>
</body>
<footer>
    <br><?php echo "&copy; Edgar Neverovski ".date("d.m.Y");?>
</footer>
</html>
