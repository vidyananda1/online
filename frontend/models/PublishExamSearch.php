<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PublishExam;

/**
 * PublishExamSearch represents the model behind the search form of `app\models\PublishExam`.
 */
class PublishExamSearch extends PublishExam
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dept_id', 'exam_id', 'section_id', 'sub_id', 'created_by', 'created_date', 'updated_by', 'updated_date', 'record_status'], 'integer'],
            [['no_of_question', 'exam_date', 'exam_start_time', 'duration'], 'safe'],
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
        $query = PublishExam::find();

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
            'dept_id' => $this->dept_id,
            'exam_id' => $this->exam_id,
            'section_id' => $this->section_id,
            'sub_id' => $this->sub_id,
            'exam_date' => $this->exam_date,
            'exam_start_time' => $this->exam_start_time,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
            'record_status' => $this->record_status,
        ]);

        $query->andFilterWhere(['like', 'no_of_question', $this->no_of_question])
            ->andFilterWhere(['like', 'duration', $this->duration]);

        return $dataProvider;
    }
}
