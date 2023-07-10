<?php

namespace app\models;

use yii\base\Model;


class CartForm extends Model
{
    public $id;
    public $qty;

    public function rules()
    {
        return [
            [['qty'], 'required'],
        ];
    }

}
