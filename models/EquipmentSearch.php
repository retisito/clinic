<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EquipmentView;

/**
 * EquipmentSearch represents the model behind the search form of `app\models\EquipmentView`.
 */
class EquipmentSearch extends EquipmentView
{
    public $chunck;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['chunck'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {   
        $query = EquipmentView::find();
        
        /*
        $query = (new \yii\db\Query())
            ->select([
                'equipment.id',
                'center.name as center_name',
                'environment.name as environment_name',
                'equipment.name',
                'equipment.created_by',
                'equipment.updated_by',
            ])
            ->from('equipment')
            ->leftJoin('environment', 'equipment.environment_id = environment.id')
            ->leftJoin('center', 'environment.center_id = center.id');
        */

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->orFilterWhere([
            'id' => $this->chunck,
            //'environment_id' => $this->chunck,
            //'created_at' => $this->chunck,
            //'updated_at' => $this->chunck,
        ]);

        $query->orFilterWhere(['like', 'center_name', $this->chunck])
            ->orFilterWhere(['like', 'environment_name', $this->chunck])
            ->orFilterWhere(['like', 'name', $this->chunck])
            ->orFilterWhere(['like', 'created_by', $this->chunck])
            ->orFilterWhere(['like', 'updated_by', $this->chunck]);
        
        return $dataProvider;
    }
}
