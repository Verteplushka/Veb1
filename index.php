<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header {
            color: blue;
            font-family: sans-serif;
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        Колбасин Владислав Ильич, P3216, Вариант 2613
    </header>

    <form action="" method="POST">
            Изменение X (от -3 до 3):
            <input type="text" name="x">
            <br>
            Изменение Y:
            <select name="y">
                <option value="-4">-4</option>
                <option value="-3">-3</option>
                <option value="-2">-2</option>
                <option value="-1">-1</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <br>
            Изменение R:
            <label for="1">1</label>
            <input type="radio" name="r" id="1" value="1">
            <label for="1">2</label>
            <input type="radio" name="r" id="2" value="2">
            <label for="1">3</label>
            <input type="radio" name="r" id="3" value="3">
            <label for="1">4</label>
            <input type="radio" name="r" id="4" value="4">
            <label for="1">5</label>
            <input type="radio" name="r" id="5" value="5">
            <br>
        <input type="submit" name="button">
    </form>

    <?php
    $m = [];
    if(!isset($_POST['r'])){
        echo "R is not set";
        exit();
    }
    $x = $_POST['x'];
    $y = $_POST['y'];
    $r = $_POST['r'];
    if(!is_numeric($x)){
        echo "X must content only numbers";
        exit();
    }
    if(!($x<3 && $x>-3)){
        echo "X is not in (-3, 3)";
        exit();
    }


    if((($x>=0 && $x<=$r) && (($y<=$r/2 && $y>=0) || ($y>=$x-$r && $y<=0)))  ||  (($x<=-$r/2 && $x<=0) && ($y<=0 && $x*$x+$y*$y<=$r*$r))){
        array_push($m, array($x, $y, $r, date('Y-m-d H:i:s')));
        echo "yes";
    }
    else{
        array_push($m, array($x, $y, $r, date('Y-m-d H:i:s')));
        echo "no";
    }
        ?>

<table border="1">
        <tr>
            <th>X</th>
            <th>Y</th>
            <th>R</th>
            <th>time</th>
        </tr>
        
        <?php
        foreach ($m as $row) {
            echo '<tr>';
            foreach ($row as $cell) {
                echo '<td>' . $cell . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>


    
        
</body>

</html>