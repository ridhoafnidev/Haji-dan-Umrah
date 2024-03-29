<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Doa;

/**
 * DoaSearch represents the model behind the search form about `app\models\Doa`.
 */
class DoaSearch extends Doa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_doa'], 'integer'],
            [['judul_doa', 'gambar_doa', 'deskripsi_doa'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Doa::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_doa' => $this->id_doa,
        ]);

        $query->andFilterWhere(['like', 'judul_doa', $this->judul_doa])
            ->andFilterWhere(['like', 'gambar_doa', $this->gambar_doa])
            ->andFilterWhere(['like', 'deskripsi_doa', $this->deskripsi_doa]);

        return $dataProvider;
    }
}
