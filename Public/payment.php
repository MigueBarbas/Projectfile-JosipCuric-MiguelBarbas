<?php
require "templates/header.php";
?>
<link rel="stylesheet" href="Css/style.css" />
<div class="form-container">
    <h2>Make Payment</h2>
    <?php
    if(isset($_POST['submit'])) {
        require_once "common.php";
        
        try {
            require_once 'src/DBconnect.php';
            
            // Prepare the SQL query to insert payment data
            $sql = "INSERT INTO payments (reservation_id, amount) VALUES (:reservation_id, :amount)";
            
            // Prepare the statement
            $statement = $connection->prepare($sql);
            
            // Bind parameters
            $statement->bindParam(':reservation_id', $_POST['reservation_id'], PDO::PARAM_INT);
            $statement->bindParam(':amount', $_POST['amount']);
            
            // Execute the statement
            $statement->execute();
            
            // Provide feedback to the user
            echo "Payment successfully submitted";
        } catch(PDOException $error) {
            // Handle database errors
            echo "Error: " . $error->getMessage();
        }
    }
    ?>
    <form method="post">
        <label for="reservation_id">Reservation ID</label>
        <input type="text" name="reservation_id" id="reservation_id" required>
        
        <label for="amount">Amount</label>
        <input type="text" name="amount" id="amount" required>

        <label for="cash">Cash/Card</label>
        <input type="text" name="cash" required>

        <input type="submit" name="submit" value="Submit Payment">
    </form>
</div>
<a href="index.php">Back to home</a>
<?php require "templates/footer.php"; ?>
