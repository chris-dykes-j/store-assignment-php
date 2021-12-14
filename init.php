<!DOCTYPE html>
<html lang="en">

<head>
    <title>Drum and Coffee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="favicon.ico">
</head>

<body>
    <br>
    <?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $fileName = "input.csv";
    $connect = new mysqli($server, $user, $password);
    mysqli_options($connect, MYSQLI_OPT_LOCAL_INFILE, true);

    if ($connect->connect_error) {
        die("Error, could not connect. Send the monkey team! 🙊 " . $conn->connect_error);
    }

    $makeDatabase = "CREATE DATABASE assignment8";

    $connect->query($makeDatabase);

    $makeTable = "CREATE TABLE assignment8.items (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(40) NOT NULL,
        type VARCHAR(40) NOT NULL,
        model VARCHAR(40) NOT NULL,
        brand VARCHAR(40) NOT NULL,
        price VARCHAR(40) NOT NULL
    )";

    $connect->query($makeTable);

    $importData = "LOAD DATA LOCAL INFILE '$fileName'
        INTO TABLE assignment8.items
        FIELDS TERMINATED BY ','
        LINES TERMINATED BY '\n'
        IGNORE 1 LINES
        (ID, Name, Type, Model, Brand, Price)
    ";

    if ($connect->query("SELECT EXISTS (SELECT 1 FROM assignment8.items)"))
        $connect->query($importData);

    $connect->close();

    ?>

</body>

</html>