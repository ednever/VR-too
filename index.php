<!doctype html>
<html lang="et">
<head>
    <title>Pealeht</title>
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
<h2>Mustrid</h2>
<table>
    <tr>
        <th>Kuubid</th>
        <th>Lained</th>
        <th>Kolmnurgad</th>
        <th>Ämblikuvõrk</th>
        <th>Lillede lehed</th>
    </tr>
    <tr>
        <td><img src="img/mustr1.jpg" alt="pilt1"></td>
        <td><img src="img/mustr2.jpg" alt="pilt2"></td>
        <td><img src="img/mustr3.jpg" alt="pilt3"></td>
        <td><img src="img/mustr4.jpg" alt="pilt4"></td>
        <td><img src="img/mustr5.jpg" alt="pilt5"></td>
    </tr>
</table>
</body>
<footer>
    <br><?php echo "&copy; Edgar Neverovski ".date("d.m.Y");?>
</footer>
</html>