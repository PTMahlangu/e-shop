

<?php

include_once "aShopCart.php";

$cart = new ShoppingCart();
$AllItems =$cart->getAllItems();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Admin</title>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
<!-- Brand -->
<a class="navbar-brand" href="index.php"></a>

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
</button>

<!-- Navbar links -->
<div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="index.php">Sign out </span></a>
    </li>
    </ul>
</div>
</nav>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                <THEAd>
                    <tr>
                        <div class="row">
                            <div class="col-10">
                                <h2>Product List</h2>
                            </div>
                            <div class="col-2">
                               <form action="aShopCart.php" method="post">
                                <a type="submit" name="addItemInDb" data-toggle="modal" data-target="#add_product_modal"  class="btn btn-primary btn-sm">Add Product</a>
                                </form> 
                                
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th>ItemID</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Cost Price</th>
                        <th>Sell Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </THEAd>
                <TBOdy>
         
                <?php while($row =$AllItems->fetch_assoc()):?>
                    <tr>
                        <td><?php echo $row['ItemID']; ?></td>
                        <td><?php echo '<img src="images/'.$row['ItemID'].'.jpg" width="70">'; ?> </td>
                        <td><?php echo $row['Description']; ?></td>
                        <td>R <?php echo $row['CostPrice']; ?></td>

                        <td>R <?php echo $row['SellPrice']; ?></td>
                        <td> <?php echo $row['Quantity'];?></td>
                        <td>
                        <div class="row">
                            <div>
                            <form action="aShopCart.php" method="post">
                            <a href="#" data-toggle="modal" data-target="#edit_product_modal" >  <i class="fa fa-pencil"style="margin: 10px;"></i></a>
                            <input type ="hidden" name="ItemID" value="<?php echo $row['ItemID'];?>" >
                            </form>
                            </div>
                            <div>
                            <form action="aShopCart.php" method="post">
                            <button type="submit" name="deleteInDb" class ="text-dange lead" style="border:none;"  onClick="return confirm('Are you sure you want to remove this item?')"><i class="fa fa-trash" style="color:red"></i></a>
                            <input type ="hidden" name="ItemID" value="<?php echo $row['ItemID'];?>" >
                            </form>
                            </div>
                        </div>
                        </td>
                    </tr>
                    <?php endwhile;?>
                    <tr>
                    </tr>

                </TBOdy>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Add Product Modal start -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="aShopCart.php" method="post" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Id</label>
		        		<input type="text" name="product_id" class="form-control" placeholder="Enter Product Id">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Description</label>
                        <input type="text" name="product_desc" class="form-control" placeholder="Enter Product Description">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Cost Price</label>
                        <input type="text" name="product_costprice" class="form-control" placeholder="Enter Product Cost Price">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Sell Price</label>
		        		<textarea class="form-control" name="product_sellprice" placeholder="Enter product Sell Price"></textarea>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Qty</label>
                <input type="number" name="product_qty" class="form-control" placeholder="Enter Product Quantity">
                
              </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label>Product Image <small>(format: jpg,jpeg,png)</small></label>
                    <input type="file" name="product_image" class="form-control">
                </div>
            </div>
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        			<button type="submit" name ="addItemInDb" class="btn btn-primary add-product">Add Product</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Add Product Modal end -->

<!-- Edit Product Modal start -->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aShopCart.php" method="post" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Id</label>
		        		<input type="text" name="product_id" class="form-control" placeholder="Enter Item id">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Description</label>
                        <input type="text" name="product_desc" class="form-control" placeholder="Enter Product Description">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Cost Price</label>
                        <input type="text" name="product_costprice" class="form-control" placeholder="Enter Product Cost Price">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Sell Price</label>
		        		<textarea class="form-control" name="product_sellprice" placeholder="Enter product Sell Price"></textarea>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Qty</label>
                <input type="number" name="product_qty" class="form-control" placeholder="Enter Product Quantity">
              </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label>Product Image <small>(format: jpg,jpeg,png)</small></label>
                    <input type="file" name="product_image" class="form-control">
                </div>
            </div>
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        			<button type="submit" name="editInDb" class="btn btn-primary add-product">Edit Product</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Product Modal end -->



<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

