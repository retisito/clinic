<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "environment".
 *
 * @property int $id
 * @property int $center_id
 * @property string $name
 * @property string|null $description
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Center $center
 */
class Environment extends \yii\db\ActiveRecord
{
    use \app\common\traits\Signature;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'environment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['center_id', 'name'], 'required'],
            [['center_id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['center_id'], 'exist', 'skipOnError' => true, 'targetClass' => Center::className(), 'targetAttribute' => ['center_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'center_id' => 'Center ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Center]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCenter()
    {
        return $this->hasOne(Center::className(), ['id' => 'center_id']);
    }
}
