<?php

if (!isset($_SESSION['m'])) {
    $_SESSION['m'] = [];
}
if (!isset($_POST['r'])) {
    echo "R is not set";
    exit();
}
$x = $_POST['x'];
$y = $_POST['y'];
$r = $_POST['r'];
if (!is_numeric($x)) {
    echo "X must content only numbers";
    exit();
}
if (!($x <= 3 && $x >= -3)) {
    echo "X is not in (-3, 3)";
    exit();
}


if ((($x >= 0 && $x <= $r) && (($y <= $r / 2 && $y >= 0) || ($y >= $x - $r && $y <= 0))) || (($x <= -$r / 2 && $x <= 0) && ($y <= 0 && $x * $x + $y * $y <= $r * $r))) {
    array_push($_SESSION['m'], array($x, $y, $r, date('Y-m-d H:i:s'), "yes"));
    echo "yes";
} else {
    array_push($_SESSION['m'], array($x, $y, $r, date('Y-m-d H:i:s'), "no"));
    echo "no";
}
?>