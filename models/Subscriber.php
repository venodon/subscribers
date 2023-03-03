<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscriber".
 *
 * @property int $id
 * @property string $email Получатель
 * @property int $event Событие
 * @property int $is_blocked Заблокирован
 * @property string|null $created_at Дата добавления
 * @property string|null $updated_at Дата редактирования
 */
class Subscriber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriber';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'event'], 'required'],
            [['event', 'is_blocked'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['email', 'event'], 'unique', 'targetAttribute' => ['email', 'event']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Получатель',
            'event' => 'Событие',
            'is_blocked' => 'Заблокирован',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата редактирования',
        ];
    }
}
