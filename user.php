<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's account</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<?php require_once "blocks/header.php" ?>

<div class="feedback">
    <div class="container">
        <h2>User's account</h2>
        <p>Lorem Ipsum is simply dummy text of the printing .</p>

        <p>Привет: <?php echo $_COOKIE['login']?></p>
    </div>
</div>


<?php require_once "blocks/footer.php" ?>

</body>

</html>