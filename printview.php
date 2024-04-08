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
        <?php
            $input1 = isset($_GET['input1']) ? $_GET['input1'] : '0';
            $input2 = isset($_GET['input2']) ? $_GET['input2'] : '0'; 
        ?>
        <?php if ($input1 > 9): ?>
            <img src="./content/ColorForgeLogo_grayscale.png" alt="ColorForgeLogo" style="height: 25px; padding: 0;">
        <?php elseif ($input1 > 7): ?>
            <img src="./content/ColorForgeLogo_grayscale.png" alt="ColorForgeLogo" style="height: 50px; padding: 0;">
        <?php else: ?>
            <img src="./content/ColorForgeLogo_grayscale.png" alt="ColorForgeLogo" style="height: 100px; padding: 0;">
        <?php endif; ?>
        <table id="table1" style="width: 80%; margin:10px auto">
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 80%;">
            </colgroup>
            <?php
                $colors = array('Red', 'Orange', 'Yellow', 'Green', 'Blue', 'Purple', 'Gray', 'Brown', 'Black', 'Teal');
                for($i = 0; $i < $input1; $i++){
                    echo "<tr>
                            <td>
                                $colors[$i]
                            </td>
                            <td>-</td>
                          </tr>";
                }
            ?>
        </table>
        <table id="table2" style="width: 80%; margin:10px auto;">
            <tr>
                <td style="width: auto;"></td>
                <?php
                    for ($col = 0; $col < $input2; $col++) {
                        $asciiValue = 65 + $col;
                        $letterValue = chr($asciiValue);
                        echo "<td style='width: calc((100% - 20px) / $input2); padding: 10px 0px;'>$letterValue</td>";
                    }
                ?>
            </tr>
            <?php
                for ($row = 0; $row < $input2; $row++) {
                    echo "<tr>";
                    echo "<td style='padding:0px 10px;'>" . ($row + 1) . "</td>";
                    for ($col = 0; $col < $input2; $col++) {
                        $asciiValue = 65 + $col;
                        $letterValue = chr($asciiValue);
                        $rowp1 = $row + 1;
                        echo "<td class=\"insideBox\">$letterValue$rowp1</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
    <style>
        #table2 td.insideBox {
            width: 10vw;
            height: calc((36vw - 20px) / <?php echo $input2; ?>);
            padding: 0;
            border: 1px solid black;
            text-align: center;
        }
    </style>
    <script>
        window.onload = function() {
            let table2 = document.getElementById("table2");
            if (table2.offsetWidth > 850) {
                let cells = table2.getElementsByTagName("td");
                for (let i = 0; i < cells.length; i++) {
                    cells[i].style.width = "30px";
                }
            }
        };
    </script>
</body>
</html>