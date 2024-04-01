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
            <label for="input1">Rows, Columns, Number:</label>
            <input type="text" id="input1" name="input1">
            <label for="input2">Number of colors:</label>
            <input type="text" id="input2" name="input2" >
            <input type="submit">

            <p id="errorMessage1" style="color: red;"></p>
            <p id="errorMessage2" style="color: red;"></p>
        </form>
    </div>
</body>
</html>