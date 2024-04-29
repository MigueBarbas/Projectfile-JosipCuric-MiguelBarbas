<?php
// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Include common.php for escape() function
    require_once "common.php";

    try {
        // Include DBconnect.php for database connection
        require_once 'src/DBconnect.php';

        // Prepare the SQL query to insert reservation data
        $sql = "INSERT INTO reservations (name, phone, duration, pickup_date) VALUES (:name, :phone, :duration, :pickup_date)";

        // Prepare the statement
        $statement = $connection->prepare($sql);

        // Bind parameters
        $statement->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $statement->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
        $statement->bindParam(':duration', $_POST['duration'], PDO::PARAM_INT);
        $statement->bindParam(':pickup_date', $_POST['pickup_date']);

        // Execute the statement
        $statement->execute();

        // Redirect to payment.php page after successful reservation
        header("Location: payment.php");
        exit(); // Prevent further execution of the script
    } catch(PDOException $error) {
        // Handle database errors
        echo "Error: " . $error->getMessage();
    }
}
?>

<?php require "templates/header.php"; ?>
<link rel="stylesheet" href="Css/style.css" />
<div class="form-container">
    <h2>Car Reservation</h2>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
        <small>Format: 1234567890</small>
        
        <label for="duration">Rental Duration (in days)</label>
        <input type="number" id="duration" name="duration" min="1" required>
        
        <label for="pickup_date">Pickup Date</label>
        <input type="date" id="pickup_date" name="pickup_date" required>
        
        <input type="submit" name="submit" value="Submit Reservation">
    </form>
</div>
<a href="index.php">Back to home</a>
<?php require "templates/footer.php"; ?>
