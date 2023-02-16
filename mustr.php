<?php
require_once("konf.php");
global $yhendus;
if(!empty($_REQUEST["mustinr"])){
    $kask=$yhendus->prepare(
        "INSERT INTO rulood(mustinr) VALUES(?)");
    $kask->bind_param("i", $_REQUEST["mustinr"]);
    $kask->execute();
    $yhendus->close();
}
?>
<!doctype html>
<html lang="et">
<head>
    <title>Tellimus</title>
    <script src="script/script.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body onload="restar()">
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
<h2>Mustri valimine</h2>
<table>
    <tr>
        <th>Valitud muster</th>
    </tr>
    <tr>
        <td><form action=''>
				<input type='number' min="1" max="5" value="1" name='mustinr' />
				<input type='submit' value='Saada' />
			</form>
		</td>
	</tr>
</table>
</body>
<footer>
    <br><?php echo "&copy; Edgar Neverovski ".date("d.m.Y");?>
</footer>
</html>