<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>t9 CCG Page</title>
    <script src="validate.js" defer></script>
</head>
<body style="background-color: gray">
    <div id="paperview">
        <img src="./content/ColorForgeLogo_grayscale.png" alt="ColorForgeLogo" style="height: 100px; padding: 0;">

        <?php
            $input1 = isset($_GET['input1']) ? $_GET['input1'] : '0';
            $input2 = isset($_GET['input2']) ? $_GET['input2'] : '0'; 
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
                                $colors[$i]
                            </td>
                            <td>-</td>
                          </tr>";
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
    </div>
</body>
</html>