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
            <form id="inputForm" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <label for="input1">Choose a number between 1-26:</label>
                <p id="errorMessage1" style="color: red;"></p>
                <input type="text" id="input1" name="input1" placeholder="1-26">
                <br><br>
                <label for="input2">Choose a number between 1-10:</label>
                <p id="errorMessage2" style="color: red;"></p>
                <input type="text" id="input2" name="input2" placeholder="1-10">
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
                $colors = array('Red', 'Orange', 'Yellow', 'Green', 'Blue', 'Purple', 'Gray', 'Brown', 'Black', 'Teal');
                for($i = 0; $i < $input2; $i++){
                    echo "<tr>
                            <td>
                                <select class = 'colorDropdown' name = 'dropdown_$i' id='dropdown_$i'>";
                                    foreach($colors as $index => $color) {
                                        $selected = ($color == $colors[$i]) ? "selected" : "";
                                        echo "<option value='".($index)."' $selected>$color</option>";
                                    };
                    echo        "</select>
                            </td>
                            <td>-</td>
                          </tr>
                    ";
                }
            ?>
        </table>

        <table id="table2" style="width: 80%; margin:10px auto">
            <?php
                for($row = 0; $row < $input1; $row++){
                    echo "<tr>";
                    for($col = 0; $col < $input1; $col++){
                        echo "<td>-</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <a href="printview.php?input1=<?php echo $input1; ?>&input2=<?php echo $input2; ?>" target="_blank"><button>Print Preview</button></a>
    </div>
</body>
</html>