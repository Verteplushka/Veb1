<?php
$i = 1;
foreach ($_SESSION['m'] as $row) {
    echo '<tr>';
    echo '<td>';
    echo $i;
    echo '</td>';
    foreach ($row as $cell) {
        echo '<td>';
        echo $cell;
        echo '</td>';
    }
    echo '</tr>';
    $i++;
}
?>