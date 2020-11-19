<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inspection_view".
 *
 * @property int $id
 * @property string|null $center_name
 * @property string|null $environment_name
 * @property string|null $equipment_name
 * @property string|null $name
 * @property string $status_name
 * @property string|null $created_by
 * @property string|null $updated_by
 */
class InspectionView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inspection_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['status_name'], 'required'],
            [['center_name', 'environment_name', 'equipment_name', 'name', 'status_name', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'center_name' => 'Center Name',
            'environment_name' => 'Environment Name',
            'equipment_name' => 'Equipment Name',
            'name' => 'Name',
            'status_name' => 'Status Name',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
