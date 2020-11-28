<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_view".
 *
 * @property int $id
 * @property string|null $center_name
 * @property string|null $environment_name
 * @property string|null $name
 * @property string|null $created_by
 * @property string|null $updated_by
 */
class EquipmentView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['center_name', 'environment_name', 'name', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'center_name' => 'Centro',
            'environment_name' => 'Ambiente',
            'name' => 'Equipo',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
        ];
    }
}
