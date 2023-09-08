<?php
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
    <!-- Main Container Start -->
    <div class="main_container">
	
        <!-- Header Container Start  -->
        <div class="header_container">
            <img src="images/shop.jpg" style="float:left">
            <img src="images/shopnow.jpg" style="float:right">
            <img src="images/techh.jpg" style="float:right">
            <img src="images/cmptr.jpg" style="float:right">
            <img src="images/android.jpg" style="float:right">
            <img src="images/lptp.jpg" style="float:right">
            <img src="images/human.jpg" style="float:right">
        </div>
        <!-- Header Container Ends -->
        
        <!-- Navbar Start -->
        <div id="navbar">
        	<ul id="menu">
            	<li><a href="index.php">Home</a></li>
                <li><a href="all_product.php">All Products</a></li>
                <li><a href="my_account.php">My Account</a></li>
                <li><a href="user_register.php">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact US</a></li>
            </ul>
            <div id="form">
            	<form method="get" action="results.php" enctype="multipart/form-data">
                	<input type="text" name="user_query" placeholder="Search a product" id="Search_bar"/>
                	<input type="submit" name="search" value="Search" id="Search_btn"/>
                </form>
            </div>
        </div>
        <!-- Navbar Ends -->

        <!-- Content Container Start -->
        <div class="content_container">
        	<!-- Left Sidebar Container Start -->
            <div id="left_sidebar">
            	<div id="sidebar_title">
                Categories
                </div>
                	<ul id="cats_items">
          				<?php 
						getcat();  
						?>
                    </ul>
                <div id="sidebar_title">
                Brands
                </div>
                	<ul id="cats_items">
						 <?php getbrand(); ?>               
                    </ul>
             </div>
           <!-- Left Sidebar Container Ends -->
           
           
           <!-- Right_content Container Starts -->
           <div id="right_content">
           
           		<div id="headlines">
                
                	<div id="headlines_content" >
            			<b>Welcome Guest!</b>
                        <b style="color:#F0C">Shopping Cart</b>
                        <span> - Items: - Price: </span>
                     </div>
            	</div>
                <div id="products_box">
                	<?php 
					
						$get_products = "select * from product";
						$run_products = mysqli_query($conn, $get_products);
						while($row_products = mysqli_fetch_array($run_products)) {
							
							$pro_id = $row_products['product_id'];
							$pro_title = $row_products['product_title'];
							$pro_cate = $row_products['cate_id'];
							$pro_brand = $row_products['brand_id'];
							$pro_desc = $row_products['product_desc'];
							$pro_price = $row_products['product_price'];
							$pro_image = $row_products['product_img1'];
							
							echo "
							<div id='single_product'>
								<h3>$pro_title</h3>
								<img src='admin_area/product_images/$pro_image' width='180px' height='180px'/><br>
								<p><b>Price: $pro_price PKR</b></p>
								<a href='detail.php?pro_id=$pro_id' style='float:left'>Details</a>
								<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a> 							
							</div>
							";	
						}
					?>
                                    
                </div>
           </div>     
			<!-- Right_content Container Ends -->
            
            
        </div>
        <!-- Content Container Ends -->

        <!-- Footer Container Starts -->
        <div class="footer">
        <h2>E-commerce 2022 All tech Products &copy; by AR</h2>
        </div>
        <!-- Footer Container Ends -->

    </div>
    <!-- Main Container Ends -->
</body>

</html>