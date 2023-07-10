<?php

namespace app\controllers;

// $session = Yii::$app->session;

use Yii;
use app\models\CheckoutForm;
use app\models\User;
use app\models\Customer;
// use app\models\CartForm;

class CheckoutController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $model = new CheckoutForm();

        if($post = Yii::$app->request->post('CheckoutForm')){

        // if($post = Yii::$app->request->post('submit')){
            // print_r($post);
            // die;

            $model = new Customer();
            $model-> first_name = $post['first_name'];
            $model-> last_name = $post['last_name'];
            $model-> email = $post['email'];

            if($model->save()){
                $customerId = Yii::$app->db->getLastInsertID();
                // echo $customerId;
                // die;

            }

            $model = new User();
            $model-> user_email = $post['email'];
            $model-> status = 0;
            $model-> date_created = date('Y-m-d H:i:s');
            $model-> date_updated = date('Y-m-d H:i:s');
            $model->user_name = $post['email'];
            $model->customer_id = $customerId;
            $model->nick_name = $post['first_name'];
            $model->password = Yii::$app->security->generatePasswordHash($post['password']);
            $model->generateAuthKey();
            $model->generateAccessToken();


            if ($model->save()) {

                Yii::$app->session->setFlash('success', 'Test');
                return $this->redirect(['checkout/index']);

            }else{

                Yii::$app->session->setFlash('error', 'Test');
                return $this->redirect(['checkout/index']);
                // error
            }

        }

        return $this->render('index',['model'=> $model]);
    }

    // }
}

