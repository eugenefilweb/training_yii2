<?php

namespace app\models;

// use yii\base\Model;
use yii\db\ActiveRecord;


class Customer extends ActiveRecord
{
    public $first_name;
    public $last_name;
    public $email;
    public $date_created;
    public $date_updated;

    // public function rules()
    // {
    //     return [
    //         [['first_name','last_name', 'email'], 'required'],
    //     ];
    // }

}
