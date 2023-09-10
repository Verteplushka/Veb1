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
            <form action="" method="POST" onsubmit="return validate();">
                <label for="x">X:</label>
                <input type="text" name="x" id="x" placeholder="от -3 до 3">
                <span id="error" class="error-message"></span>
                <br>
                <label for="y">Y:</label>
                <select name="y" id="y">
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
                R:
                <label for="1">1</label>
                <input type="radio" name="r" id="1" value="1" required>
                <label for="2">2</label>
                <input type="radio" name="r" id="2" value="2">
                <label for="3">3</label>
                <input type="radio" name="r" id="3" value="3">
                <label for="4">4</label>
                <input type="radio" name="r" id="4" value="4">
                <label for="5">5</label>
                <input type="radio" name="r" id="5" value="5">
                <br>
                <input type="submit" value="Check">
                <!-- <input type="button" id="resetM"> -->

            </form>
        </div>

        <script src="js/main.js"></script>

        <div class="block">
            <img src="areas.png" width="100%" alt="визуализация задания">
        </div>


        <div class="block">
            <?php include 'php/main.php' ?>
            <table border="1">
                <tr>
                    <th>№</th>
                    <th>X</th>
                    <th>Y</th>
                    <th>R</th>
                    <th>time</th>
                    <th>result</th>
                </tr>

                <?php include 'php/table.php' ?>
            </table>
        </div>

</body>

</html>