<?php

namespace app\models;

use yii\db\ActiveRecord;

class Tuser extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'pwd', 'type', 'created_at', 'is_deleted'], 'required'],
            [['created_at'], 'safe'],
            [['is_deleted'], 'integer'],
            [['email'], 'string', 'max' => 100],
            [['pwd'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'nama' => 'nama',
            'email' => 'Email',
            'pwd' => 'Pwd',
            'type' => 'Type',
            'created_at' => 'Created At',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
