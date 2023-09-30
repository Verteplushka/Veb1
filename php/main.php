<?php
$accuracy = 20;
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
if (!(bccomp($x, 3, $accuracy) && bccomp($x, -3, $accuracy))) {
    echo "X is not in (-3, 3)";
    exit();
}


if ((($x >= 0 && bccomp($x, $r, $accuracy) <= 0) && ((bccomp($y, $r, $accuracy) <= 0 / 2 && $y >= 0) || ($y >= bccomp($x, $r, $accuracy) && $y <= 0))) || ((bcadd($x, $r, $accuracy) <= 0 / 2 && $x <= 0) && ($y <= 0 && bcmul($x, $x, $accuracy) + bcmul($y, $y, $accuracy) <= bcmul($r, $r, $accuracy)))) {
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