<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "environment_view".
 *
 * @property int $id
 * @property string|null $center_name
 * @property string $name
 * @property string|null $created_by
 * @property string|null $updated_by
 */
class EnvironmentView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'environment_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'required'],
            [['center_name', 'name', 'created_by', 'updated_by'], 'string', 'max' => 255],
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
            'name' => 'Ambiente',
            'created_by' => 'Creado por',
            'updated_by' => 'Modificado por',
        ];
    }
}
