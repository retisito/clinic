<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property int $environment_id
 * @property string|null $name
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $serial
 * @property string|null $code
 * @property string|null $size
 * @property string|null $description
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Environment $environment
 */
class Equipment extends \yii\db\ActiveRecord
{
    use \app\common\traits\Signature;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['environment_id'], 'required'],
            [['environment_id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'brand', 'model', 'serial', 'code', 'size', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['environment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Environment::className(), 'targetAttribute' => ['environment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'environment_id' => 'Ambiente ID',
            'name' => 'Equipo',
            'brand' => 'Marca',
            'model' => 'Modelo',
            'serial' => 'Serial',
            'code' => 'Código',
            'size' => 'Tamaño',
            'description' => 'Descripción',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
        ];
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
}
