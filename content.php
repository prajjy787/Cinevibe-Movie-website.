<?php
// Including datbase connection file
include 'db_config.php'; 



// get movies from database
$sql = "SELECT * FROM movies_tb";
$result = $conn->query($sql);
?>

<style>

       

/*  uniform image dimensions */
.card-img-top {
    width: 100%; 
    height: 200px; /* Fixed height */
    object-fit: cover; 
}

/* custom styles for the container */
.row {
    margin-left: 5px; 
    margin-right: 5px;
}



.card-img-top {
    width: 100%;               
    height: 200px;            
    object-fit: cover;        
}

     /* Creating  a flexible box   with Limits text to 3 lines (for Web browsers) */


.card-text {
    display: -webkit-box;             
    -webkit-box-orient: vertical;       
    -webkit-line-clamp: 3;               
    line-clamp: 3;                     
    overflow: hidden;                  
    text-overflow: ellipsis;           
}


/* css for login page */


</style>

<div class="container-fluid mt-4">
    <div class="row justify-content-center mx-1">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-md-2 col-6">  <!-- Adjusted column class for responsiveness -->
                <div class="card mb-4">
                    <img src="<?php echo htmlspecialchars($row['card_img']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['movie_title']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['movie_title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                        <a href="product_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Watch Now</a>
                    </div>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<p>No movies found.</p>";
        }
        $conn->close();
        ?>
    </div>
</div>
</div>
