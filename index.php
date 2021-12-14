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
    <div class="navigate">
        <a href="index.php">Home</a>
        <div class="drop">
            <a class="drop-button" href="#">Products</a>
            <div class="drop-content">
                <a href="currency.php">Currency Exchange</a>
                <a href="#">Service Two</a>
            </div>
        </div>
        <div class="drop">
            <a class="drop-button" href="contact.html">Contact Us</a>
            <div class="drop-content">
                <a href="#"><img src=images\france2.png class="country"> Contactez-nous</a>
                <a href="#"><img src=images\germany2.png class="country"> Kontaktiere Uns</a>
                <a href="#"><img src=images\japan2.png class="country"> お問い合わせ</a>
            </div>
        </div>
        <a href="aboutme.html">About</a>
    </div>

    <div class="red-message">
        <p id="time"></p>
    </div>

    <div class="top">
        <h1>Who We Are</h1>
        <p>We sell cymbals by the seashore!</p>
        <p>If you would like to look at our selection of available drum cymbals, please use the search bar below!</p>
        <p>Slap that enter key to see a table!</p>
    </div>

    <div class="search">
        <form method="post" action="index.php" id="search-me" autocomplete="off">
            <input type="text" name="item-input" id="item-input" placeholder="Search product catalogue...">
            <ul id="items-list"></ul>
        </form>
    </div>

    <script type="text/javascript" src="scripts/message.js"></script>
    <script type="text/javascript" src="scripts/search.js"></script>

    <?php

    include "init.php";

    class Item
    {
        public int $itemNumber;
        public ?string $name, $type, $model, $brand, $price;
        public function __construct($itemNumber, $name, $type, $model, $brand, $price)
        {
            $this->$itemNumber = $itemNumber;
            $this->$name = $name;
            $this->$type = $type;
            $this->$model = $model;
            $this->$brand = $brand;
            $this->$price = $price;
        }
    }

    function makeQuery($input)
    {
        $server = "localhost";
        $user = "root";
        $password = "";
        $connect = new mysqli($server, $user, $password);
        $select = "SELECT * FROM assignment8.items";
        $result = $connect->query($select);

        $data = array();

        if ($input !== null) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result))
                    if (str_starts_with(strtoupper($row["name"]), $input))
                        $data[] = $row;
            }
        }
        $connect->close();
        return $data;
    }

    function sortInventory($data)
    {
        $sort = array();
        foreach ($data as $value) {
            $item = new Item(
                $value["id"],
                $value["name"],
                $value["type"],
                $value["model"],
                $value["brand"],
                $value["price"]
            );
            array_push($sort, $item);
        }
        return $sort;
    }

    // This will be used to give the user a preview of items.
    // Wouldn't be the smartest idea for large databases, but for the display, it's fine.
    $fullData = makeQuery("");
    $inventory = sortInventory($fullData);

    // This will be used to make a table out of selected items.
    $input = $_POST["item-input"] ?? null;
    $searchData = makeQuery($input);
    $queryInventory = sortInventory($searchData);

    ?>

    <script type="text/javascript">
        const objects = <?php echo json_encode($inventory); ?>;
        let array = [];
        for (object of objects) {
            array.push(Object.keys(object));
        }
        let products = [];
        for (let i = 1; i < array.length; i++) {
            let product = "";
            for (let k = 1; k < array[i].length; k++) {
                product += array[i][k] + ", ";
            }
            product = product.slice(0, -2);
            products.push(product);
        }
        console.log(products);
    </script>

    <?php if ($queryInventory == null) echo '<style type="text/css">#item-table {visibility: hidden;}</style>'; ?>
    <div class="middle">
        <table id="item-table">
            <?php
            if ($queryInventory != null) {
                echo "<th>ID#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Model</th>
                <th>Brand</th>
                <th>Price</th>";
            }
            foreach ($queryInventory as $item) {
                echo "<tr>";
                foreach ($item as $property)
                    echo "<td>$property</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <footer>
        <script>
            if (window.history.replaceState) window.history.replaceState(null, null, window.location.href);
        </script>
    </footer>

</body>

</html>