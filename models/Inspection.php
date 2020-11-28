<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inspection".
 *
 * @property int $id
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
            [['equipment_id', 'status_id'], 'required'],
            [['equipment_id', 'status_id'], 'integer'],
            [['description'], 'string'],
            [['planned_at', 'executed_at', 'data_sent_at', 'report_sent_at', 'created_at', 'updated_at'], 'safe'],
            [['name', 'code', 'created_by', 'updated_by'], 'string', 'max' => 255],
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
            'equipment_id' => 'Equipo ID',
            'status_id' => 'Estado ID',
            'name' => 'Inspección',
            'code' => 'Código',
            'description' => 'Descripción',
            'planned_at' => 'Planeado At',
            'executed_at' => 'Executado At',
            'data_sent_at' => 'Datos enviado el',
            'report_sent_at' => 'Reporte enviado el',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
        ];
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
           
        return parent::beforeSave($insert);
    }
    
}
