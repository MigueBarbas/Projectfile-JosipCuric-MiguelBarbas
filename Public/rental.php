<?php
/**
 * Function to query information based on
 * a parameter: in this case, location.
 *
 */
try {
    require "common.php";
    require_once 'src/DBconnect.php';
    
    // SQL query to select all cars
    $sql = "SELECT * FROM cars";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

require "templates/header.php";
?>
<h2>All Cars</h2>
<?php if ($result && $statement->rowCount() > 0) { ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Color</th>
                <th>Price</th>
                <th>Year</th>
                <th>Action</th> <!-- Added -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo escape($row["id"]); ?></td>
                    <td><?php echo escape($row["brand"]); ?></td>
                    <td><?php echo escape($row["model"]); ?></td>
                    <td><?php echo escape($row["color"]); ?></td>
                    <td><?php echo escape($row["price"]); ?></td>
                    <td><?php echo escape($row["year"]); ?></td>
                    <td>
                        <a href="reservation.php?id=<?php echo $row["id"]; ?>">Add</a>
                        </td>
                        <td> <!-- Add Button -->
                        <a href="gallery.php">Gallery</a> <!-- Gallery Button -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    No cars found.
<?php } ?>
<a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
