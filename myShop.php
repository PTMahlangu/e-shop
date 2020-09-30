

<?php
session_start();
include_once "aShopCart.php";

$cart = new ShoppingCart();
$cart_count =$cart->getTotalItem();

$AllItems =$cart->getAllItems();


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>myShop</title>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
<!-- Brand -->
<a class="navbar-brand" href="index.php">Back</a>

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
</button>

<!-- Navbar links -->
<div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="ShowCart.php">ShowCart <i class="fa fa-shopping-cart"></i> <span id ="cart_item" class="badge badge-danger" ><?php echo $cart_count; ?></span></a>
    </li>
    </ul>
</div>
</nav>


<div class="container">
    <div class="row mt-2 pb-3">
        <?php while($row =$AllItems->fetch_assoc()):?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-2 ">
                <div class="card-deck ">
                    <div class="card p-2 border-secondary mb-2 ">
                        <?php echo '<img src="images/'.$row['Description'].'.jpg" class ="card-img" height="200">'; ?> 
                        <div class="card-body p-1">
                          <h6  class="card-title text-center text-info "><?php echo $row['Description'];?></h4>
                          <h5  class="card-text text-center text-danger">R <?php echo $row['SellPrice'];?> </h5>
                        </div>
                        <div class="card-footer p-1 "  >
                            <form action="myShop.php" method="post">
                                <input type ="hidden" name="ItemID" value="<?php echo $row['ItemID'];?>" >
                                <input type ="hidden" name="Description" value="<?php echo $row['Description'];?>" >
                                <input type ="hidden" name="Quantity" value="<?php echo $row['Quantity'];?>" >
                                <input type ="hidden" name="SellPrice" value="<?php echo $row['SellPrice'];?>" >
                                <button type="submit" name="AddToCart" class="btn btn-info btn-block bg-dark"><i class="fa fa-shopping-cart"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
            <?php endwhile;?>
    </div>
</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

