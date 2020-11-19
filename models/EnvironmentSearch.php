<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EnvironmentView;

/**
 * EnvironmentSearch represents the model behind the search form of `app\models\EnvironmentView`.
 */
class EnvironmentSearch extends EnvironmentView
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

    /**c
     * chunckta provider instance with search query appliedchunckparam array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EnvironmentView::find();

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
            //'center_id' => $this->chunck,
            //'created_at' => $this->chunck,
            //'updated_at' => $this->chunck,
        ]);

        $query->orFilterWhere(['like', 'center_name', $this->chunck])
            ->orFilterWhere(['like', 'name', $this->chunck])
            ->orFilterWhere(['like', 'created_by', $this->chunck])
            ->orFilterWhere(['like', 'updated_by', $this->chunck]);

        return $dataProvider;
    }
}
