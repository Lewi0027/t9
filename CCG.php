<!DOCTYPE html>
<?php
    $input1 = isset($_POST['input1']) ? $_POST['input1'] : '';
    $input2 = isset($_POST['input2']) ? $_POST['input2'] : '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        for ($i=0; $i<=$input2; $i++) {
            for($j=0; $j<=$input2; $j++) {
                if (array_key_exists("$i$j", $_POST)) {
                    $buttonValue[] = [$i, $j];
                    goto printButtonValue;
                }
            }
        }

        printButtonValue:
        if (!empty($buttonValue)) {    
            echo '<p>Row:' . $buttonValue[0][0] . '</p><br>';
            echo '<p>Column: ' . $buttonValue[0][1] . '</p>';
        }
    }
?>
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
    <div id="whitepage">
        <h1>This is where we generate colors</h1>
            <form id="inputForm" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <label for="input1">Choose a number between 1-10:</label>
                <p id="errorMessage1" style="color: red;"></p>
                <input type="text" id="input1" name="input1" placeholder="1-10" value="<?php echo $input1; ?>">
                <br><br>
                <label for="input2">Choose a number between 1-26:</label>
                <p id="errorMessage2" style="color: red;"></p>
                <input type="text" id="input2" name="input2" placeholder="1-26" value="<?php echo $input2; ?>">
                <br>
                <input type="submit" id="submitButton">
            </form>
        <?php
            $input1 = isset($_POST['input1']) ? $_POST['input1'] : '0';
            $input2 = isset($_POST['input2']) ? $_POST['input2'] : '0';

            echo "<p>Colors: $input1 <br> Rows/Columns: $input2</p><br>";
            echo "<p id=\"clickedButton\"></p>";
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
                                    <option value='0'>---</option>
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
            <tr>
                <td></td>
                <?php
                    for ($col = 0; $col < $input2; $col++) {
                        $asciiValue = 65 + $col;
                        $letterValue = chr($asciiValue);
                        echo "<td style='padding: 10px;' >$letterValue</td>";
                    }
                ?>
            </tr>
            <?php
                for ($row = 0; $row < $input2; $row++) {
                    echo "<tr>";
                    echo "<td>" . ($row + 1) . "</td>"; 
                    for ($col = 0; $col < $input2; $col++) {
                        $asciiValue = 65 + $col;
                        $letterValue = chr($asciiValue);
                        $rowp1 = $row+1;

                        echo "<td class=\"insideBox\">
                                <form method=\"post\">
                                    <input type=\"submit\" data-col=\"$col\" data-row=\"$row\" class=\"button\" id=\"table2button\" value=\"$letterValue$rowp1\">
                            </td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <button type="button" id="ntButton">Print Preview</button>
    </div>
    <style>
        #table2 td.insideBox {
            width: auto;
            height: calc((58vw - 20px) / <?php echo $input2; ?>);
            padding: 0;
            border: 1px solid black;
            text-align: center;
        }
    </style>
    <script>
        document.getElementById('ntButton').addEventListener('click', function() {
            
            // console.log("Print Preview button clicked");
            var input1 = document.getElementById('input1').value;
            var input2 = document.getElementById('input2').value;
            
            var colorSelected = JSON.parse(localStorage.getItem('colorSelected')) || [];
            var encodedColorSelected = encodeURIComponent(JSON.stringify(colorSelected));

            var printPreviewUrl = 'printview.php?input1=' + input1 + '&input2=' + input2 + '&colorSelected=' + encodedColorSelected;

            window.open(printPreviewUrl, '_blank');
        });

        let buttons = document.querySelectorAll('.button');
        buttons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                let row = parseInt(this.dataset.row) + 1;
                let col = parseInt(this.dataset.col);

                col += 65;
                colToLetter = String.fromCharCode(col);

                document.getElementById('clickedButton').innerText = "Clicked Button: " + colToLetter + row ;
            });
        });
    </script>
</body>
</html>