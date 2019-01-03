<?php

namespace app;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Emprunt;

/**
 * modelsEmpruntSearch represents the model behind the search form of `app\models\Emprunt`.
 */
class modelsEmpruntSearch extends Emprunt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'session_id', 'user_id', 'amount', 'delay', 'state'], 'integer'],
            [['percentage'], 'number'],
            [['created_at', 'auth_key'], 'safe'],
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
        $query = Emprunt::find();

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
            'session_id' => $this->session_id,
            'user_id' => $this->user_id,
            'amount' => $this->amount,
            'percentage' => $this->percentage,
            'delay' => $this->delay,
            'state' => $this->state,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
