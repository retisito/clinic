<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InspectionView;

/**
 * InspectionSearch represents the model behind the search form of `app\models\InspectionView`.
 */
class InspectionSearch extends InspectionView
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
        $query = InspectionView::find();
        
        /*
        $query = (new \yii\db\Query())
            ->select([
                'inspection.id',
                'center.name as center_name',
                'environment.name as environment_name',
                'equipment.name as equipment_name',
                'inspection.name',
                'status.name as status_name',
                'inspection.created_by',
                'inspection.updated_by',
            ])
            ->from('inspection')
            ->leftJoin('equipment', 'inspection.equipment_id = equipment.id')
            ->leftJoin('environment', 'equipment.environment_id = environment.id')
            ->leftJoin('center', 'environment.center_id = center.id')
            ->leftJoin('status', 'inspection.status_id = status.id');
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
            //'equipment_id' => $this->chunck,
            //'status_id' => $this->chunck,
            //'planned_at' => $this->chunck,
            //'executed_at' => $this->chunck,
            //'data_sent_at' => $this->chunck,
            //'report_sent_at' => $this->chunck,
            //'created_at' => $this->chunck,
            //'updated_at' => $this->chunck,
        ]);

        $query->orFilterWhere(['like', 'center_name', $this->chunck])
            ->orFilterWhere(['like', 'environment_name', $this->chunck])
            ->orFilterWhere(['like', 'equipment_name', $this->chunck])
            ->orFilterWhere(['like', 'name', $this->chunck])
            ->orFilterWhere(['like', 'status_name', $this->chunck])
            ->orFilterWhere(['like', 'created_by', $this->chunck])
            ->orFilterWhere(['like', 'updated_by', $this->chunck]);

        return $dataProvider;
    }
}