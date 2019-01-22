<?php

namespace devortix\feedback\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property int $id
 * @property string $user_name
 * @property string $user_email
 * @property string $phone
 * @property string $push_emails
 * @property string $content
 * @property string $info
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                //  'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'name'], 'required'],
            [['content', 'info'], 'string'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['user_name', 'name', 'user_email', 'phone', 'push_emails'], 'string', 'max' => 255],
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->status = 1;
        }
        if (parent::beforeSave($insert)) {

            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin-feedback', 'ID'),
            'user_name' => Yii::t('admin-feedback', 'User Name'),
            'user_email' => Yii::t('admin-feedback', 'User Email'),
            'phone' => Yii::t('admin-feedback', 'Phone'),
            'push_emails' => Yii::t('admin-feedback', 'Push Emails'),
            'content' => Yii::t('admin-feedback', 'Content'),
            'info' => Yii::t('admin-feedback', 'Info'),
            'created_at' => Yii::t('admin-feedback', 'Created At'),
            'updated_at' => Yii::t('admin-feedback', 'Updated At'),
            'status' => Yii::t('admin-feedback', 'Status'),
            'name' => Yii::t('admin-feedback', 'Name'),
        ];
    }
}