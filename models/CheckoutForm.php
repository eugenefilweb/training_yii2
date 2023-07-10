<?php

namespace app\models;

use yii\base\Model;


class CheckoutForm extends Model
{
    public $password;
    public $first_name;
    public $last_name;
    public $email;

    public function rules()
    {
        return [
            // [['password', 'email'], 'required'],
        ];
    }

}
