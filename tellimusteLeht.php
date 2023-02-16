<?php
require_once("konf.php");
global $yhendus;

if(isset($_REQUEST['Kustuta'])) {
    $kask=$yhendus->prepare("DELETE FROM rulood where id=?");
    $kask->bind_param('i', $_REQUEST['Kustuta']);
    $kask->execute();
}

if(!empty($_REQUEST["vormistamine_id"])){
    $kask=$yhendus->prepare("UPDATE rulood SET pakitud = 1 WHERE id = ?");
    $kask->bind_param("i", $_REQUEST["vormistamine_id"]);
    $kask->execute();
}
$kask=$yhendus->prepare("SELECT id, mustinr, riievalmis, puuvalmis, pakitud FROM rulood;");
$kask->bind_result($id, $mustinr, $riievalmis, $puuvalmis, $pakitud);
$kask->execute();

function asenda($nr){
    if($nr==-1){return ".";} //tegemata
    if($nr== 1){return "Tehtud";}
    if($nr== 2){return "Pole tehtud";}
    return "Tundmatu number";
}
?>
<!doctype html>
<html lang="et">
<head>
    <title>Tellimused</title>
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
<h2>Tellimuse seis</h2>
<table>
    <tr>
        <th>Tellimuse ID</th>
        <th>Mustri number</th>
        <th>Lõigatus</th>
        <th>Värvimise etapp</th>
        <th>Tellimuse väljastus</th>
        <th></th>
    </tr>
    <?php
    while($kask->fetch()){
        $a_riievalmis = asenda($riievalmis);
        $a_puuvalmis = asenda($puuvalmis);
        $rulooLahter = ".";
        if($pakitud == 1) { $rulooLahter = "Väljastatud"; }
        if($pakitud == -1 and $riievalmis == 1 and $puuvalmis == 1){
            $rulooLahter = "<a href='?vormistamine_id=$id'>Vormista tellimust</a>";
        }
        echo "
		     <tr>
			   <td>$id</td>
			   <td>$mustinr</td>
			   <td>$a_riievalmis</td>
			   <td>$a_puuvalmis</td>
			   <td>$rulooLahter</td>
			   <td><a href='?Kustuta=$id' onclick='return confirm()'>Kustuta</a></td>
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
