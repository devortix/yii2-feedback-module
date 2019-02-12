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
    const STATUS_NEW = 1;
    const STATUS_WAIT = 2;
    const STATUS_OK = 3;
    const STATUS_CENCEL = 0;
    public $statusClasses = [
        self::STATUS_NEW => 'label-info label',
        self::STATUS_WAIT => 'label-warning label',
        self::STATUS_OK => 'label-success label',
        self::STATUS_CENCEL => 'label-dunger label',
    ];

    public $file = null;
    public $fileFolder = 'uploads/feedback/';
    public $file_url = '@web/uploads/feedback/';
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
            [['content', 'info', 'file_name'], 'string'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['user_name', 'name', 'user_email', 'phone', 'push_emails'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'doc, docx, txt, pdf'],
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

    public function beforeDelete()
    {
        if (is_file($this->filePath)) {
            unlink($this->filePath);
        }

        return parent::beforeDelete();
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
            'file' => Yii::t('admin-feedback', 'File'),
        ];
    }

    public function getFilePath()
    {
        return $this->fileFolder . $this->file_name;
    }

    public function getFileUrl()
    {
        $url = Yii::getAlias($this->file_url);
        return $url . $this->file_name;
    }

    public function generateFileName()
    {
        return $this->file_name = \Yii::$app->formatter->asDate($this->created_at, 'php:Y-m-d H:i') . '_'
        . $this->file->baseName
        . '.' . $this->file->extension;
    }

    public function upload()
    {
        $this->generateFileName();
        if (is_dir($this->fileFolder)) {
            $this->file->saveAs($this->fileFolder . $this->file_name);
            return true;
        }
        return false;
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => Yii::t('admin-feedback', 'status new'),
            self::STATUS_WAIT => Yii::t('admin-feedback', 'status wait'),
            self::STATUS_OK => Yii::t('admin-feedback', 'status ok'),
            self::STATUS_CENCEL => Yii::t('admin-feedback', 'status cencel'),

        ];
    }

    public function getStatusClass()
    {
        if(isset($this->statusClasses[$this->status]))
            return $this->statusClasses[$this->status];
        return '';
    }

    public function getStatusLabel()
    {
        $statuses =  self::getStatuses();
        if(isset($statuses[$this->status]))
            return $statuses[$this->status];
        return 'null';
    }
}