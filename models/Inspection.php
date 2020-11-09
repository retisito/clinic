<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inspection".
 *
 * @property int $id
 * @property int $center_id
 * @property int $environment_id
 * @property int $equipment_id
 * @property int $status_id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $description
 * @property string|null $planned_at
 * @property string|null $executed_at
 * @property string|null $data_sent_at
 * @property string|null $report_sent_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Center $center
 * @property Environment $environment
 * @property Equipment $equipment
 * @property Status $status
 */
class Inspection extends \yii\db\ActiveRecord
{
    use \app\common\traits\Signature;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inspection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['center_id', 'environment_id', 'equipment_id', 'status_id'], 'required'],
            [['center_id', 'environment_id', 'equipment_id', 'status_id'], 'integer'],
            [['description'], 'string'],
            [['planned_at', 'executed_at', 'data_sent_at', 'report_sent_at', 'created_at', 'updated_at'], 'safe'],
            [['name', 'code', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['center_id'], 'exist', 'skipOnError' => true, 'targetClass' => Center::className(), 'targetAttribute' => ['center_id' => 'id']],
            [['environment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Environment::className(), 'targetAttribute' => ['environment_id' => 'id']],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::className(), 'targetAttribute' => ['equipment_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
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
            'environment_id' => 'Environment ID',
            'equipment_id' => 'Equipment ID',
            'status_id' => 'Status ID',
            'name' => 'Name',
            'code' => 'Code',
            'description' => 'Description',
            'planned_at' => 'Planned At',
            'executed_at' => 'Executed At',
            'data_sent_at' => 'Data Sent At',
            'report_sent_at' => 'Report Sent At',
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

    /**
     * Gets query for [[Environment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnvironment()
    {
        return $this->hasOne(Environment::className(), ['id' => 'environment_id']);
    }

    /**
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(), ['id' => 'equipment_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    public function beforeSave($insert) {
        
        if (!empty($this->planned_at))
            $this->planned_at = new \yii\db\Expression("'$this->planned_at'");
        
        if (!empty($this->executed_at))    
            $this->executed_at = new \yii\db\Expression("'$this->executed_at'");
        
        if (!empty($this->data_sent_at))    
            $this->data_sent_at = new \yii\db\Expression("'$this->data_sent_at'");
        
        if (!empty($this->report_sent_at))
            $this->report_sent_at = new \yii\db\Expression("'$this->report_sent_at'");
           
        return true;
    }
}
