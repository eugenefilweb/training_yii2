<?php

namespace app\controllers;

// $session = Yii::$app->session;

use Yii;
use app\models\Product;
use app\models\CartForm;

class CartController extends \yii\web\Controller
{
    // public function actionIndex2()
    // {
    //     if ($post = Yii::$app->request->post()) {

    //         $model = Product::find()
    //             ->where([
    //                 'id' => $post["Product"]['id'],
    //             ])
    //             ->one();
    //     }
    // }

    public function actionIndex()
    {
        // var_dump(Yii::$app->request->post('Product')['id']);
        // die;

        if($post = Yii::$app->request->post('Product')){
        $request = Yii::$app->request->post('Product');
        // Retrieve the form data
        $id = $request['id'];
        $qty = $request['qty'];

        // var_dump($id);
        // var_dump($qty);
        
        // echo 'as';
        // die;

        // var_dump($qty);
        // die;

        // Set the session values
        Yii::$app->session->set('product_id', $id);
        Yii::$app->session->set('qty', $qty);

        // $product = Product::findOne(['id'=> $productId]);

            $product = Product::find()->where(['id'=>$post['id']])->one();
            
            $cart = Yii::$app->session->set('cart', []);
            $cart = [
                [
                    'id' => $id,
                    'qty' => $qty,
                    'price' => $product['price'],
                    'product_name' => $product['product_name']
                ],
            ];

            // die;
            
            // print_r($cart);
            // die;
            
            $cart_model = new CartForm();
        }

        return $this->render('index', [
            'cart'=>$cart,
            'product'=>$product,
            'cart_model'=>$cart_model
        ]);
    }

    public function actionAddProduct(){
        
        $model = new Product();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

}
