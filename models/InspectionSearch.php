<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inspection;

/**
 * InspectionSearch represents the model behind the search form of `app\models\Inspection`.
 */
class InspectionSearch extends Inspection
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'center_id', 'environment_id', 'equipment_id', 'status_id'], 'integer'],
            [['name', 'code', 'description', 'planned_at', 'executed_at', 'data_sent_at', 'report_sent_at', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'safe'],
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
        $query = Inspection::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'center_id' => $this->center_id,
            'environment_id' => $this->environment_id,
            'equipment_id' => $this->equipment_id,
            'status_id' => $this->status_id,
            'planned_at' => $this->planned_at,
            'executed_at' => $this->executed_at,
            'data_sent_at' => $this->data_sent_at,
            'report_sent_at' => $this->report_sent_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
