<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property int $id
 * @property string $product_name
 * @property float $price
 * @property string $date_created
 * @property string|null $date_updated
 */
class Product extends \yii\db\ActiveRecord
{
    public $qty;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_name', 'price'], 'required'],
            [['price'], 'number'],
            // [['date_created', 'date_updated'], 'safe'],
            // [['date_updated'], 'safe'],
            [['product_name'], 'string', 'max' => 64],
            [['qty'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'price' => 'Price',
            // 'date_created' => 'Date Created',
            // 'date_updated' => 'Date Updated',
        ];
    }
}
