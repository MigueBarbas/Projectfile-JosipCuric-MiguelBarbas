<?php include "templates/header.php"; ?>
<link rel="stylesheet" href="Css/style.css" />
<div class="form-container">
    <h2>Add a Car</h2>
    <?php
    if (isset($_POST['submit'])) {
        require_once "common.php";
        try {
            require_once 'src/DBconnect.php';

            // Validation Test 1: Brand and Model should not be empty
            if (empty($_POST['brand']) || empty($_POST['model'])) {
                throw new Exception("Brand and Model fields are required.");
            }

            // Validation Test 2: Color should not be empty
            if (empty($_POST['color'])) {
                throw new Exception("Color field is required.");
            }

            // Validation Test 3: Price should be a numeric value
            if (!is_numeric($_POST['price'])) {
                throw new Exception("Price should be a numeric value.");
            }

            // Validation Test 4: Year should be a valid four-digit number
            if (!preg_match('/^\d{4}$/', $_POST['year'])) {
                throw new Exception("Year should be a valid four-digit number.");
            }

            $new_car = array(
                "brand" => escape($_POST['brand']),
                "model" => escape($_POST['model']),
                "color" => escape($_POST['color']),
                "price" => escape($_POST['price']),
                "year" => escape($_POST['year'])
            );
            $sql = sprintf("INSERT INTO %s (%s) values (%s)", "cars",
                implode(", ", array_keys($new_car)),
                ":" . implode(", :", array_keys($new_car)));
            $statement = $connection->prepare($sql);
            $statement->execute($new_car);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    if (isset($_POST['submit']) && $statement){
        echo "Car successfully added";
    }
    ?>
    <form method="post">
        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" required>
        <label for="model">Model</label>
        <input type="text" name="model" id="model" required>
        <label for="color">Color</label>
        <input type="text" name="color" id="color" required>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" required>
        <label for="year">Year</label>
        <input type="text" name="year" id="year">
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="index.php">Back to home</a>
</div>
<?php include "templates/footer.php"; ?>