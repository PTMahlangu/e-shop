

<?php

include_once "aShopCart.php";

$cart = new ShoppingCart();

$cart_count =$cart->getTotalItem();
$grand_total=0;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cart</title>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
<!-- Brand -->
<a class="navbar-brand" href="myShop.php"></a>

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
</button>

<!-- Navbar links -->
<div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <!-- <a class="nav-link" href="#">Cancel Order</a> -->
        <form action="" method="post">
                    <button type="submit" name="emptycart" class="badge-danger badge p-2" style="border:none;"  class ="text-dange lead"  onClick="return confirm('Are you sure you want to cancel this order?')">Cancel Order</a>
        </form>
    </li>
    <li class="nav-item">
        <a class="nav-link" href=""><i class="fa fa-shopping-cart"></i> <span id ="cart_item" class="badge badge-danger" ><?php echo $cart_count; ?></span></a>
    </li>
    </ul>
</div>
</nav>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                <THEAd>
                    <tr>
                    <td colspan='7'> <h4 class="text-center text-info m-0 ">Products in you cart</h4></td>
                    </tr>
                    <tr>
                        <th>ItemID</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>
                         <form action="" method="post">
                             <button type="submit" name="emptycart" class="badge-danger badge p-2" style="border:none;"  class ="text-dange lead"  onClick="return confirm('Are you sure you want to clear your cart?')"><i class="fa fa-trash" > Empty Cart</i></a>
                         </form>
                        </th>
                    </tr>
                </THEAd>
                <TBOdy>
                    <?php foreach( $_SESSION['cart'] as $row){ ?>
                    <tr>
                        <td><?php echo $row['ItemID']; ?></td>
                        <td><?php echo '<img src="images/'.$row['ItemID'].'.jpg" width="70">'; ?> </td>
                        <td><?php echo $row['Description']; ?></td>
                        <td>R <?php echo $row['SellPrice']; ?></td>

                        <td> 
                        <form action="" method="post">
                        <div class='row'>
                        <button type="submit" name="incrementCart" style="border-radius:4px;background-color: #ffffff;border: 2px solid #D3D3D3;">+</button>
                        <input type="text" class="form-control itemQty" value="<?php echo $row['Quantity'];?>" style="width:35px;" >
                        <button type="submit" name="decrementCart" style="border-radius:4px;background-color: #ffffff;border: 2px solid #D3D3D3;">-</button>
                        <input type ="hidden" name="ItemID" value="<?php echo $row['ItemID'];?>" >
                        </div>
                        </form>
                        </td>

                        <td>R <?php echo number_format($row['Quantity']*$row['SellPrice'],2); ?></td>
                        <td>
                            <form action="aShopCart.php" method="post">
                            <button type="submit" name="delete" class ="text-dange lead" style="border:none;"  class ="text-dange lead" onClick="return confirm('Are you sure you want to remove this item?')"><i class="fa fa-trash" > Remove</i></a>
                            <input type ="hidden" name="ItemID" value="<?php echo $row['ItemID'];?>" >
                            </form>
                           
                        </td>
                    </tr>
                        <?php $grand_total +=$row['Quantity']*$row['SellPrice'];?>
                    <?php } ?>
                    <tr>

                    <td colspan="3">
                    <a href="myShop.php" class="btn btn-success"><i class="fa fa-cart-plus"></i> Countinue Shopping</a>
                    </td>

                    <td colspan="2"><b>Grand Total</b></td>

                    <td><b>R <?php echo number_format($grand_total,2); ?></b></td>

                    <td colspan="1">
                    <a href="checkout.php" class="btn btn-info <?php $grand_total>1?"":"disabled"?>"><i class="fa fa-credit-card"></i> Check out</a>
                    </td>
                    </tr>
                    
                </TBOdy>
                </table>
            </div>
        </div>
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

