<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
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
        $query = User::find()
            ->where(['<>', 'role', 'root'])
            ->andWhere(['<>', 'id', Yii::$app->user->id]);

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
            //'login_count' => $this->chunck,
            //'last_login' => $this->chunck,
            //'created_at' => $this->chunck,
            //'updated_at' => $this->chunck,
        ]);

        $query->orFilterWhere(['like', 'name', $this->chunck])
            ->orFilterWhere(['like', 'email', $this->chunck])
            ->orFilterWhere(['like', 'role', $this->chunck])
            ->orFilterWhere(['like', 'status', $this->chunck])
            ->orFilterWhere(['like', 'created_by', $this->chunck])
            ->orFilterWhere(['like', 'updated_by', $this->chunck]);
            //->andFilterWhere(['<>', 'role', 'root'])
            //->andFilterWhere(['<>', 'id', Yii::$app->user->id]);

        return $dataProvider;
    }
}
