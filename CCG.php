<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>t9 CCG Page</title>
    <script src="validate.js" defer></script>
</head>
<body>
    <div class="top-banner">
        <img src="./content/ColorForgeLogo.png" alt="ColorForgeLogo" style="height: 100px; padding: 0;">
        <?php include 'navbar.php' ?>
    </div>
    <div id="colorswath">
        <h1>This is where we generate colors</h1>
            <form id="inputForm" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <label for="input1">Choose a number between 1-10:</label>
                <p id="errorMessage1" style="color: red;"></p>
                <input type="text" id="input1" name="input1" placeholder="1-10">
                <br><br>
                <label for="input2">Choose a number between 1-26:</label>
                <p id="errorMessage2" style="color: red;"></p>
                <input type="text" id="input2" name="input2" placeholder="1-26">
                <br>
                <input type="submit">
            </form>
        <?php
            $input1 = isset($_POST['input1']) ? $_POST['input1'] : '0';
            $input2 = isset($_POST['input2']) ? $_POST['input2'] : '0';

            echo "<p>$input1 and $input2</p>"; 
        ?>

        <table id="table1" style="width: 80%; margin:10px auto">
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 80%;">
            </colgroup>
            <?php
                for($i = 0; $i < $input1; $i++){
                    echo "<tr>
                            <td>
                                <select class = 'colorDropdown' name = 'dropdown_$i' id='dropdown_$i'>
                                    <option value='null'>---</option>
                                    <option value='1'>Red</option>
                                    <option value='2'>Orange</option>
                                    <option value='3'>Yellow</option>
                                    <option value='4'>Green</option>
                                    <option value='5'>Blue</option>
                                    <option value='6'>Purple</option>
                                    <option value='7'>Gray</option>
                                    <option value='8'>Brown</option>
                                    <option value='9'>Black</option>
                                    <option value='10'>Teal</option>
                                </select>
                            </td>
                            <td>-</td>
                          </tr>
                    ";
                }
            ?>
        </table>

        <table id="table2" style="width: 80%; margin:10px auto">
            <?php
                for($row = 0; $row < $input2; $row++){
                    echo "<tr>";
                    for($col = 0; $col < $input2; $col++){
                        echo "<td>-</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>