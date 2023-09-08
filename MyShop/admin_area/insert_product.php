<?php
include("includes/db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Insertion</title>

</head>
<body bgcolor="#FFCCFF">

<form method="post" action="insert_product.php" enctype="multipart/form-data">
	<table width="700" align="center" border="1" bgcolor="#0099FF">
    
    	<tr align="center">
        
        	<td colspan="2"><h1>Insert New Product</h1></td>
    
    	</tr>
        
        <tr>
        	<td><b>Product Title</b></td>
            <td><input type="text" name="product_title" size="50"/> </td>   
        </tr>
        
         <tr>
         	<td><b>Product Category</b></td>
            <td>
            	<select name="product_cat">
                	<option>Select a category</option>
                    	<?php
						$get_cats = "select * from cate_gories";
						$run_cats = mysqli_query($conn,$get_cats);
						
						while($row_cats = mysqli_fetch_array($run_cats)){
							
							$cate_id = $row_cats["cate_id"];
							$cate_title = $row_cats['cate_title'];
							# "?" is use for get method and single quotes are use because double qotes are outsie 
							echo "<option value='$cate_id'>$cate_title</option>";
						}
						?>                 
                 </select>
            
            
            </td>   
        </tr>
        
        <tr>
        	<td><b>Product Brand</b></td>
            <td>
            	  <select name="product_brand">
                	<option>Select a brand</option>
                    	<?php
						$get_brand = "select * from brand";
						$run_brand = mysqli_query($conn,$get_brand);
						
						while($row_brand = mysqli_fetch_array($run_brand)){
							
							$brand_id = $row_brand['brand_id'];
							$brand_title = $row_brand['brand_title'];
							# "?" is use for get method and single quotes are use because double qotes are outsie 
							echo "<option value='$brand_id'>$brand_title</option>";
						}
						?>                 
                 </select>
            
            </td>   
        </tr>
        
        <tr>
        	<td><b>Product Image 1</b></td>
            <td><input type="file" name="product_img1" /> </td>   
        </tr>
        
        <tr>
        	<td><b>Product Image 2</b></td>
            <td><input type="file" name="product_img2" /> </td>   
        </tr>
        
        <tr>
        	<td><b>Product Image 3</b></td>
            <td><input type="file" name="product_img3" /> </td>   
        </tr>
        
        <tr>
        	<td><b>Product Price</b></td>
            <td><input type="text" name="product_price" /> </td>   
        </tr>
        
        <tr>
        	<td><b>Product Description</b></td>
            <td><textarea name="product_desc" cols="35" rows="7"></textarea> </td>   
        </tr>
    
    	<tr>
        	<td><b>Product Keywords</b></td>
            <td><input type="text" name="product_keywords" size="50"/> </td>   
        </tr>
        
        <tr align="center">
            <td colspan="2"><input type="submit" name="insert_product" value="Insert Product" /> </td>   
        </tr>
 
    </table>

</form>

</body>
</html>

<?php

if (isset($_POST['insert_product'])) {
	
	// Text data Variables
	$product_title = $_POST['product_title'];
	$product_cat = $_POST['product_cat'];
	$product_brand = $_POST['product_brand'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_keywords = $_POST['product_keywords'];
	$status = 'on';
	
	// Images Names
	$product_img1 = $_FILES['product_img1']['name'];
	$product_img2 = $_FILES['product_img2']['name'];
	$product_img3 = $_FILES['product_img3']['name'];
	
	// Images Temporary Names => server needed
	$temp_img1 = $_FILES['product_img1']['tmp_name'];
	$temp_img2 = $_FILES['product_img2']['tmp_name'];
	$temp_img3 = $_FILES['product_img3']['tmp_name'];
	
	// validiation
	
	if($product_title == '' OR $product_cat == '' OR $product_brand == '' OR $product_price == '' OR $product_desc == '' OR$product_keywords == '' OR $product_img1 == '' ){
		
		echo " <script>alert('Please fill all the given fields!')</script> ";
		exit();
	}
	else {
		
		// Uploading images to its folder
		move_uploaded_file($temp_img1,"product_images/$product_img1");
		move_uploaded_file($temp_img2,"product_images/$product_img2");
		move_uploaded_file($temp_img3,"product_images/$product_img3");
		
		$insert_product = " insert into product(cate_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_status) values ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status') " ;	
		
		// Query
		$run_product = mysqli_query($conn,$insert_product);
		
		if($run_product)
		{
		
		echo "<script>alert('Product inserted successfully!')</script>";
			
		}		
	}	
}
?>