<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Enterprises;

/**
 * EnterpriseSearch represents the model behind the search form of `backend\models\Enterprise`.
 */
class EnterpriseSearch extends Enterprises
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'employee_count', 'gross_revenue', 'status'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'date_establish', 'cover_img', 'description', 'created_at', 'updated_at'], 'safe'],
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
        $query = Enterprises::find();

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
            'date_establish' => $this->date_establish,
            'employee_count' => $this->employee_count,
            'gross_revenue' => $this->gross_revenue,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cover_img', $this->cover_img])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
