<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\Product $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_name',
            'price',
            'date_created',
            'date_updated',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?> -->

<!-- 
    <div class="container">
        <div class="row">
            <?php  foreach($model as $index => $product): ?>
                <div class="col-md-4" >
                    <h4><?= $product['product_name'] ?></h4>
                    <div><?= $product['price'] ?></div>
                    <div><?= $product['date_created'] ?></div>
                </div>
                <?php endforeach ?>
            </div>
    </div> -->

    <!-- <div class="container">
    <div class="row">
        <?php foreach($model as $index => $product): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $product['product_name'] ?></h4>
                        <div class="card-text"><?= $product['price'] ?></div>
                        <div class="card-text"><?= $product['date_created'] ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div> -->

<div class="container">
    <div class="row">
        <?php foreach($model as $index => $product): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center border border-1 border-black">
                        <h4 class="card-title"><?= $product['product_name'] ?></h4>
                        <hr class="border border-black w-100">
                        <div class="card-text text-center mt-3 d-flex justify-content-between w-50">
                            <div>Price: </div>
                            <div><?= $product['price'] ?></div>
                            <form method="post"  action="<?= Url::toRoute(['cart/index']) ?>">
                                <input type="hidden" id="fname" name="product_id" value="<?php echo $product['id']; ?>"><br>
                                <label for="fname">QTY:</label><br>
                                <input type="number" id="lname" name="qty" value=""><br><br>
                                <input type="submit" value="Add to Cart">
                            </form>
                        </div>
                        <div class="card-text text-center">Date Created: <?= $product['date_created'] ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>





</div>
