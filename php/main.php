<?php
$startTime = microtime(true);

if (!isset($_POST['x'])) {
    echo "X is not set";
    exit();
}
if (!isset($_POST['y'])) {
    echo "Y is not set";
    exit();
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


if ((($x >= 0 && bccomp($x, $r, 20) <= 0) && ((bccomp($y, $r, 20) <= 0 / 2 && $y >= 0) || ($y >= bccomp($x, $r, 20) && $y <= 0))) || ((bcadd($x, $r, 20) <= 0 / 2 && $x <= 0) && ($y <= 0 && bcmul($x, $x, 20) + bcmul($y, $y, 20) <= bcmul($r, $r, 20)))) {
    echo '<tr>';
    foreach (array($x, $y, $r, date('Y-m-d H:i:s'), (microtime(true) - $startTime)*1000, "yes") as $cell) {
        echo '<td>';
        echo $cell;
        echo '</td>';
    }
    echo '</tr>';
} else {
    echo '<tr>';
    foreach (array($x, $y, $r, date('Y-m-d H:i:s'), (microtime(true) - $startTime)*1000, "no") as $cell) {
        echo '<td>';
        echo $cell;
        echo '</td>';
    }
    echo '</tr>';
}


?>