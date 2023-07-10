<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

// /** @var yii\web\View $this */
// /** @var app\models\search\Product $searchModel */
// /** @var yii\data\ActiveDataProvider $dataProvider */

// /** @var yii\bootstrap5\ActiveForm $form */
// /** @var app\models\CartForm $model */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
// $csrfToken = Yii::$app->request->csrfToken;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p> -->
        <?php //echo Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    <!-- </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php //echo GridView::widget([
        // 'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        // 'columns' => [
        //     ['class' => 'yii\grid\SerialColumn'],

        //     'id',
        //     'product_name',
        //     'price',
        //     'date_created',
        //     'date_updated',
        //     [
        //         'class' => ActionColumn::className(),
        //         'urlCreator' => function ($action, Product $model, $key, $index, $column) {
        //             return Url::toRoute([$action, 'id' => $model->id]);
        //          }
        //     ],
        // ],
    // ]); ?>

<div class="container">
    <div class="row">
        <?php foreach($model as $index => $product): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4><?= $product['product_name'] ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php $form = ActiveForm::begin([
                            // 'id' => 'product-form',
                            'action' => ['cart/index'],
                            'options' => [
                                'class' => ''
                            ] 
                        ]); ?>
                            <?= $form->field($product, 'id')->textInput(['type' => 'hidden'])->label(false) ?>
                            <div class="input-group mb-3">
                                <?= $form->field($product, 'qty', ['options' => ['template' => false]])->textInput(['type' => 'number', 'min' => 1, 'value' => 1])->label(false) ?>
                                <?= Html::submitButton('Add to Cart', ['class' => 'btn btn-sm btn-primary']) ?>
                            </div>
                        <?php ActiveForm::end() ?>
                    </div>
                    <div class="card-footer">
                        Date Created: <?= $product['date_created'] ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>





</div>
