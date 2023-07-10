<?php

$session = Yii::$app->session;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

// print_r($cart);
// var_dump($cart['qty']);
// print_r($product['id']);

// unset($session['cart']);
// echo 'test';
// die;

?>


<h1>Cart</h1>

<a href="index.php" >Back to product</a>
<br/> <br/>


<table class="table">
 <tr>
   <td>Product Name</td>
   <td>Price</td>
   <td>Qty</td>
    <td>Total</td>
   <td>Action</td>
 </tr>
 <?php if ($cart){
	 
   $total=0;
	 foreach($cart as $key=>$data){ 
	   $subtotal= $data['qty']*$data['price'];
	   $total +=$subtotal;
	 ?>
  <tr>
   <td><?php echo $data['product_name']; ?></td>
   <td><?php echo $data['price']; ?></td>
   <td><?php echo $data['qty']; ?></td>
    <td><?php echo $subtotal; ?></td>
   <td><a href="index.php?page=cart&action=delete&id=<?php echo $key; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" >Remove</a> 
  
	 <form method="post"  action="index.php?page=cart&action=update">
 
  <input type="hidden" id="fname" name="id" value="<?php echo $key; ?>"><br>
   <label for="fname">QTY:</label><br>
  <input type="number" id="lname" name="qty" value="">
  
  <input type="submit" value="Update">
  </form>
	 
   </td>
  </tr>
 <?php } ?>
 
  <tr>
   <td></td>
   <td></td>
   <td>Total</td>
    <td><?php echo $total ?></td>
   <td></td>
 </tr>

 <?php } ?>
 
</table>

<!-- <a href="index.php?page=checkout">Proceed to checkout</a> -->

<?= Html::a('Proceed to checkout', ['/checkout/index']) ?>

