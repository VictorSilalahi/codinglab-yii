<?php

namespace app\models;

use yii\db\ActiveRecord;

class Todos extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ttodo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'created_at', 'updated_at', 'created_at', 'is_done', 'userid'], 'required'],
            [['description'], 'string', 'max' => 2048],
            // [['created_at'], 'date'],
            [['updated_at'], 'date', 'format'=>'Y-m-d'],
            [['is_done'], 'integer'],
            [['userid'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'todoid' => 'Todoid',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_at' => 'Created At',
            'is_done' => 'Is Done',
            'userid' => 'Userid'
        ];
    }
}
