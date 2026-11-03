<?php
// variable  ($)

$name = "Budi Sudarsono";
$umur = 20; //int
$phone = "0899421200"; //string / varchart
$berat = 70.50; //float
$isActive = true;
// echo "<p>Tess</p> <p></p>"

// constanta : nilainya tidak bisa berubbah
// define, const

define("DB_HOST", "localhost");
define("DB_NAME", "db_pos");
const APP_DEBUG = true;

echo "Host Database : " . DB_HOST . "<br>";
echo "DB NAME: " . DB_NAME . "<br>";
echo "Mode Production : " . APP_DEBUG . "<br>";

// __ : underscore 2 
// __DIR__ : 
echo "Folder file ini : " . __DIR__;
echo "Wow php menyenangkan";
echo "<p>Wow php menyenangkan 2</p>";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Nama Siswa</h1>
    <p>Nama : <?php echo $name ?></p>
    <p>Umur : <?php echo $umur ?></p>
    <p>Telepon : <?php echo $phone ?></p>
    <p>Berat Badan : <?php echo $berat ?></p>
</body>

</html>