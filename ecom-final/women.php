<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>


<!-- Cover -->
<main>
    
    <!-- Main -->
    <div class="wrapper">
      <h1>Women Fashion<h1>
    </div>
    
    <div id="content" class="container"><!-- container Starts -->
    <div class="row"><!-- row Starts -->

    <?php

    getpr();

    function getPr(){

        global $db;
        
        $get_products = "select * from products where cat_id = 2";
        
        $run_products = mysqli_query($db,$get_products);
        
        while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        $pro_price = $row_products['product_price'];
        
        $pro_img1 = $row_products['product_img1'];
        
        $pro_label = $row_products['product_label'];
        
        $manufacturer_id = $row_products['manufacturer_id'];
        
        $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";
        
        $run_manufacturer = mysqli_query($db,$get_manufacturer);
        
        $row_manufacturer = mysqli_fetch_array($run_manufacturer);
        
        $manufacturer_name = $row_manufacturer['manufacturer_title'];
        
        $pro_psp_price = $row_products['product_psp_price'];
        
        $pro_url = $row_products['product_url'];
        
        if($pro_label == "Sale" or $pro_label == "Gift"){
        
        $product_price = "<del> $$pro_price </del>";
        
        $product_psp_price = "| $$pro_psp_price";
        
        }
        else{
        
        $product_psp_price = "";
        
        $product_price = "$$pro_price";
        
        }
        
        
        if($pro_label == ""){
        
        
        }
        else{
        
        $product_label = "
        
        <a class='label sale' href='#' style='color:black;'>
        
        <div class='thelabel'>$pro_label</div>
        
        <div class='label-background'> </div>
        
        </a>
        
        ";
        
        }
        
        
        echo "
        
        <div class='col-md-4 col-sm-6 single' >
        
        <div class='product' >
        
        <a href='$pro_url' >
        
        <img src='admin_area/product_images/$pro_img1' class='img-responsive' >
        
        </a>
        
        <div class='text' >
        
        <center>
        
        <p class='btn btn-primary'> $manufacturer_name </p>
        
        </center>
        
        <hr>
        
        <h3><a href='$pro_url' >$pro_title</a></h3>
        
        <p class='price' > $product_price $product_psp_price </p>
        
        <p class='buttons' >
        
        <a href='$pro_url' class='btn btn-default' >View details</a>
        
        <a href='$pro_url' class='btn btn-primary'>
        
        <i class='fa fa-shopping-cart'></i> Add to cart
        
        </a>
        
        
        </p>
        
        </div>
        
        $product_label
        
        
        </div>
        
        </div>
        
        ";
        
        }
        
        }
        
        // getPro function Ends //
        

    ?>

    </div><!-- row Ends -->

    </div><!-- container Ends -->
    <!-- FOOTER -->
    <?php
    include("includes/footer.php");
    ?>
</body>

</html>

