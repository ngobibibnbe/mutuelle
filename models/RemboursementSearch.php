<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Remboursement;

/**
 * RemboursementSearch represents the model behind the search form of `app\models\Remboursement`.
 */
class RemboursementSearch extends Remboursement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'session_id', 'emprunt_id', 'tranche'], 'integer'],
            [['amount'], 'number'],
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
        $query = Remboursement::find();

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
            'emprunt_id' => $this->emprunt_id,
            'amount' => $this->amount,
            'tranche' => $this->tranche,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
