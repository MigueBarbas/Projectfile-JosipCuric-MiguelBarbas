<?php
// Include header
require "templates/header.php";
?>
<?php
echo '<link rel="stylesheet" href="Css/style.css">';
?>

<style>
    .gallery-item img {
        max-width: 400px;
        max-height: 300px;
    }
    .gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; 
}

.gallery-item {
    flex: 1 1 calc(33.33% - 20px); 
    max-width: calc(33.33% - 20px); 
    margin-bottom: 20px; 
}

.gallery-item img {
    display: block;
    width: 100%;
    height: auto;
    max-width: 100%;
    border-radius: 5px; 
}

.info {
    padding: 10px; 
    background-color: #f0f0f0; 
    border-radius: 5px;
}
</style>
<div class="gallery-container">
    <h2>Car Gallery</h2>
    <div class="gallery">
        <div class="gallery-item">
            <img src="images/bmw.jpg" alt="BMW M5">
            <div class="info">
                <p><strong>BMW M5</strong></p>
                <p>Color: Black</p>
                <p>Price: $2000</p>
                <p>Year: 2023</p>
            </div>
        </div>

        <div class="gallery-item">
            <img src="Images/range.jpg" alt="Range Rover Electric">
            <div class="info">
                <p><strong>Range Rover Electric</strong></p>
                <p>Color: White</p>
                <p>Price: $3000</p>
                <p>Year: 2023</p>
            </div>
        </div>

        <div class="gallery-item">
            <img src="Images/audi.jpg" alt="Audi R8 Spyder">
            <div class="info">
                <p><strong>Audi R8 Spyder</strong></p>
                <p>Color: Red</p>
                <p>Price: $2500</p>
                <p>Year: 2022</p>
            </div>
        </div>

        <div class="gallery-item">
            <img src="Images/ferrari.jpg" alt="Ferrari 812 GTS">
            <div class="info">
                <p><strong>Ferrari 812 GTS</strong></p>
                <p>Color: Grey/Yellow</p>
                <p>Price: $5000</p>
                <p>Year: 2023</p>
            </div>
        </div>

        <div class="gallery-item">
            <img src="Images/lamb.webp" alt="Lamborghini Urus">
            <div class="info">
                <p><strong>Lamborghini Urus</strong></p>
                <p>Color: Yellow</p>
                <p>Price: $3500</p>
                <p>Year: 2022</p>
            </div>
        </div>

        <div class="gallery-item">
            <img src="Images/bugatti.jpg" alt="Buggati Chirron">
            <div class="info">
                <p><strong>Buggati Chirron</strong></p>
                <p>Color: Blue/Black</p>
                <p>Price: $10000</p>
                <p>Year: 2024</p>
            </div>
        </div>
    </div>
</div>
<a href="rental.php">Rent Now</a>
<br>
<a href="index.php">Back to home</a>
<?php
// Include footer
require "templates/footer.php";
?>