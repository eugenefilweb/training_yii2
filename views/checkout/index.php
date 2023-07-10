<?php

$session = Yii::$app->session;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

// print_r($cart);
// var_dump($cart['qty']);
// print_r($product['id']);

// unset($session['cart']);
// echo 'test';
// die;

$cart_data = [];
?>


<h1>Checkout</h1>


<!-- <div style="max-width: 1000px;width: 100%; margin: auto;">
<a href="index.php?page=cart">Back to Cart</a> <a href="index.php">Back to Product</a>
<br/> <br/> -->

<div style="max-width: 1000px;width: 100%; margin: auto;">
<?= Html::a('Back to Cart', ['cart/index']) . ' '?>
<?= Html::a('Back to Product', ['index']) ?>
<br/><br/>


<?php $form = ActiveForm::begin(['action' => '']); ?>
<?php if (!isset($_SESSION['user'])): ?>
    <?= $form->field($model, 'first_name')->label('First Name') ?>
    <?= $form->field($model, 'last_name')->label('Last Name') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    <?php endif; ?>
<?php ActiveForm::end(); ?>
  
  
Review Your Oder

<table class="table">
 <tr>
   <td>Product Name</td>
   <td>Price</td>
   <td>Qty</td>
    <td>Total</td>
   
 </tr>
 <?php if ($cart_data){
	 
	 foreach($cart_data as $key=>$data){ 
	   $total=0;
	   $subtotal= $data['qty']*$data['price'];
	   $total +=$subtotal;
	 ?>
  <tr>
   <td><?php echo $data['product_name']; ?></td>
   <td><?php echo $data['price']; ?></td>
   <td><?php echo $data['qty']; ?></td>
    <td><?php echo $subtotal; ?></td>
 
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
  
  <input type="submit" name="submit" value="Confirm">
</form>

<!-- <a href="index.php?page=checkout">Proceed to checkout</a> -->

<?= Html::a('Proceed to checkout', ['/checkout/index']) ?>


