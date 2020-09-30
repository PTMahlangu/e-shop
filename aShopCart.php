

<?php


    class ShoppingCart {
        
        protected $shoppingCart = array(); 
        
        public function __construct(){ 
            if (!session_id()) {
                session_start();
            }

            $this->shoppingCart  = $_SESSION['cart'];
        } 


        public function getAllItems(){
            include_once 'config.php';
            $stmt = $conn->prepare("SELECT * from tbl_Item");
            $stmt->execute();
            $AllItems =$stmt->get_result();
            return $AllItems;
        }


        public function getAllCartItems(){
            return $this->shoppingCart;
        }
    

        public function getTotalItem(){
            if (isset($this->shoppingCart)){
                $CartItemCount= count($this->shoppingCart);
                return $CartItemCount;
            }
            else{
                $CartItemCount= 0;
                return $CartItemCount;
            }
        }


        public function AddItermToCart(){

            $ItemID = $_POST['ItemID']; 
            $Description = $_POST['Description']; 
            $Quantity = '1';             // default quantity
            $SellPrice= $_POST['SellPrice'];
        
            $item = array('ItemID'=>$ItemID,'Description'=>$Description,'SellPrice'=>$SellPrice,'Quantity'=>$Quantity);

            if (isset($this->shoppingCart)){

                if (in_array($item, $this->shoppingCart)) {
                    echo "Product already in cart";
                    
                } else {
                    array_push($this->shoppingCart,$item); 
                    print "Product added cart";
                    
                }
            }else{
                array_push($this->shoppingCart,$item);
                print "Product added cart"; 
            }
            $_SESSION['cart'] = $this->shoppingCart;
        }


        public function removeItem($ItemID){

            foreach ($this->shoppingCart as $subkey=>$subarray){
                    if ($subarray['ItemID']==$ItemID ){
                    unset($this->shoppingCart[$subkey]);
                    echo 'Product removed <br>'; 
                }
            }
            $_SESSION['cart'] = $this->shoppingCart;
        }


        public function incrementQtyInCart($ItemID){

            foreach ($this->shoppingCart as $subkey=>$subarray){
                    if ($subarray['ItemID']==$ItemID ){
                    break;
                }
            }
            $increment =$this->shoppingCart[$subkey]['Quantity'];
            $increment +=1;
            $this->shoppingCart[$subkey]['Quantity'] =$increment;
             $_SESSION['cart'] = $this->shoppingCart;
        }

        public function decrementQtyInCart($ItemID){

            foreach ($this->shoppingCart as $subkey=>$subarray){
                    if ($subarray['ItemID']==$ItemID ){
                    break;
                }
            }
            $decrement =$this->shoppingCart[$subkey]['Quantity'];
            if($decrement > 1){
                $decrement -=1;
            }else{
                $decrement =1;
            }
            
            $this->shoppingCart[$subkey]['Quantity'] =$decrement;
             $_SESSION['cart'] = $this->shoppingCart;
        }

        public function emptyCart(){
            $this->shoppingCart=array();
            $_SESSION['cart'] = $this->shoppingCart;
        }

        
        public function checkout(){
            include_once 'config.php';
            $Shipping_Address='123 synly park';
            $Customer_id=78;

            $conn->query("INSERT INTO tbl_order (Customer_id,Order_date,Shipping_Address) VALUES($Customer_id,CURRENT_TIMESTAMP,'$Shipping_Address')") or
            die($conn->error);
   
            $Order_id =$conn->insert_id;
            printf ("Your order has been recorded. Your order number is: ".$Order_id); 

            foreach ($this->shoppingCart as $items) {
                $ItemID   =$items['ItemID'];
                $Quantity =$items['Quantity'];
                $conn ->query("INSERT INTO tbl_order_item (Order_id,Item_id,Quantity) VALUES($Order_id,$ItemID,$Quantity)") or
                die($conn->error);  
            }
            $cart = new ShoppingCart();
            $cart ->emptyCart();

        }


        public function insertItemInDb( $item = array()){
            include_once 'config.php';
            if(!is_array($item) or count($item) === 0){ 
                return FALSE; 
            }

            $ItemID =$item['ItemID'];
            $Description =$item['Description'];
            $Quantity =$item['Quantity'];
            $CostPrice =$item['CostPrice'];
            $Quantity =$item['Quantity'];
            $SellPrice =$item['SellPrice'];

            $conn ->query("INSERT INTO tbl_Item (ItemID,Description,CostPrice,Quantity,SellPrice) VALUES($ItemID,'$Description',$CostPrice,$Quantity, $SellPrice)") or 
            die($conn->error);

       }

        public function removeItemInDb($ItemID){
            include_once 'config.php';
            $conn->query("DELETE FROM `tbl_Item` WHERE `tbl_Item`.`ItemID` = $ItemID") or 
            die($conn->error);
        }

        public function updateItemInDb($ItemID,$Description,$CostPrice,$Quantity,$SellPrice){
            include_once 'config.php';
            $conn->query("UPDATE `tbl_Item` SET `Description`= '$Description',`CostPrice` = $CostPrice, `Quantity` = $Quantity, `SellPrice` = $SellPrice WHERE `tbl_Item`.`ItemID` = $ItemID")  
            or die($conn->error);
        }
    }

    if(isset($_POST['delete'])){ 
        $cart = new ShoppingCart();
        $ItemID = $_POST['ItemID']; 
        $cart->removeItem($ItemID);
        $cart_count =$cart->getTotalItem();
        header("Location:ShowCart.php");
    }
    
    if(isset($_POST['emptycart'])){ 
        $cart = new ShoppingCart();
        $cart->emptyCart();
        $cart_count =$cart->getTotalItem();
        header("Location:ShowCart.php");
    }

    if(isset($_POST['AddToCart'])){ 
        $cart = new ShoppingCart();
        $cart->AddItermToCart();
        header("Location:myShop.php");
    }

    if(isset($_POST['decrementCart'])){ 
        $cart = new ShoppingCart();
        $ItemID = $_POST['ItemID'];
        $cart->decrementQtyInCart($ItemID);
    }


    if(isset($_POST['incrementCart'])){ 
        $cart = new ShoppingCart();
        $ItemID = $_POST['ItemID'];
        $cart->incrementQtyInCart($ItemID);
    }

    if(isset($_POST['checkout'])){ 

    }

    if(isset($_POST['deleteInDb'])){ 
        $cart = new ShoppingCart();
        $ItemID = $_POST['ItemID'];
        $cart->removeItemInDb($ItemID);
        header("Location:admin.php");
    }


    if(isset($_POST['editInDb'])){ 
        $cart = new ShoppingCart();
        $ItemID = $_POST['product_id'];
        $Item_desc = $_POST['product_desc'];
        $Item_costprice = $_POST['product_costprice'];
        $Item_sellprice = $_POST['product_sellprice'];
        $Item_qty = $_POST['product_qty'];
     
        if(isset($_FILES['product_image'])){
            $file_name = $_FILES['product_image']['name'];
            $file_tmp =$_FILES['product_image']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"images/".$Item_desc.'.jpg');
                echo "Success";
            }
        }
        $cart->updateItemInDb($ItemID,$Item_desc,$Item_costprice,$Item_qty,$Item_sellprice);
        header("Location:admin.php");
    }


    if(isset($_POST['addItemInDb'])){ 
        $cart = new ShoppingCart();
        $ItemID = $_POST['product_id'];
        $Item_desc = $_POST['product_desc'];
        $Item_costprice = $_POST['product_costprice'];
        $Item_sellprice = $_POST['product_sellprice'];
        $Item_qty = $_POST['product_qty'];
     
        if(isset($_FILES['product_image'])){
            $file_name = $_FILES['product_image']['name'];
            $file_tmp =$_FILES['product_image']['tmp_name'];
            move_uploaded_file($file_tmp,"images/".$Item_desc.'.jpg');
        }
        $items = array('ItemID'=>$ItemID,'Description'=>$Item_desc,'CostPrice'=>$Item_costprice,'SellPrice'=>$Item_sellprice,'Quantity'=>$Item_qty);
        $cart->insertItemInDb($items);
        header("Location:admin.php");
    }
?>


