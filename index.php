<?php
session_start();
?>
<!DOCTYPE html>
<html>

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

        .block-container {
            display: flex;
        }

        .block {
            width: 30%;
            margin: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>

    <header>
        Колбасин Владислав Ильич, P3216, Вариант 2613
    </header>
    <div class="block-container">
        <div class="block">
            <form method="POST" onsubmit="return validate();">
                Изменение X (от -3 до 3):
                <input type="text" name="x" id="x">
                <span id="error" class="error-message"></span>
                <br>
                Изменение Y:
                <select name=" y">
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
                <input type="radio" name="r" id="1" value="1" required>
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
                <!-- <input type="button" id="resetM"> -->

            </form>
        </div>

        <script>

            // const x = doucment.getElementById('x');
            // const error = document.getElementById('error');
            // x.addEventListener('input', function () {
            //     const value = x.value;
            //     // Здесь проводите проверку данных и обновляйте сообщение об ошибке, если необходимо
            //     if (!isNaN(value)) {
            //         error.textContent = 'X не удовлетворяет условию "от -3 до 3"';
            //     } else {
            //         error.textContent = ''; // Очистить сообщение об ошибке
            //     }
            // });



            function validate() {
                const x = document.getElementById('x');
                const y = document.getElementById('y');
                const r = document.getElementById('r');
                return validateNotEmpty(x, 'X') & validateNotEmpty(r, 'R') & validateIsNumber(x, 'X') & validateXRange(x);

            }

            funciton validateXRange(value){
                if (value >= -3 && value <= 3) {
                    return true;
                }
                alert('X не удовлетворяет условию "от -3 до 3"');
                return false;
            }

            function validateNotEmpty(value, name) {
                //const value = inputField.value.trim();
                if (value === '') {
                    alert(name + ' не может быть пустым');
                    return false;
                }
                return true;
            }

            function validateIsNumber(value, name) {
                //const value = inputField.value.trim();
                if (isNaN(value)) {
                    return true;
                }
                alert(name + ' должно быть числом');
                return false;
            }
        </script>

        <div class="block">
            <img src="areas.png" width="100%" alt="визуализация задания">
        </div>


        <div class="block">
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
            <table border="1">
                <tr>
                    <th>№</th>
                    <th>X</th>
                    <th>Y</th>
                    <th>R</th>
                    <th>time</th>
                    <th>result</th>
                </tr>

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
            </table>
        </div>

</body>

</html>