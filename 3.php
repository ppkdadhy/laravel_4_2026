<!-- 
    operator: memmanipulasi nilai dari variable
    +, -, /, *
    . : concanate
-->

<?php
$a = 1;
$b = 2;

$jumlah = $a + $b;

$subtotal = 100000;
$ongkir = 10000;
$diskon = 10000;


$totalBayar = ($subtotal + $ongkir) - $diskon;
echo "Total Bayar : $totalBayar";
echo "<br>";

// operator perbandingan : =, ==, ===, != atau <>, !==, >, <, <=, >=
// operator logic : &&, OR || !
?>