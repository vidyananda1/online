<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publish_exam".
 *
 * @property int $id
 * @property int $dept_id
 * @property int $exam_id
 * @property int $section_id
 * @property int $sub_id
 * @property string $no_of_question
 * @property string $exam_date
 * @property string $exam_start_time
 * @property string $duration
 * @property int $created_by
 * @property int $created_date
 * @property int $updated_by
 * @property int $updated_date
 * @property int $record_status
 */
class PublishExam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publish_exam';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dept_id', 'exam_id', 'section_id', 'sub_id', 'no_of_question', 'exam_date', 'exam_start_time', 'duration','total_mark', 'created_by', 'created_date', 'updated_by', 'updated_date', 'record_status'], 'required'],
            [['dept_id', 'exam_id', 'section_id', 'sub_id', 'created_by', 'created_date', 'updated_by', 'updated_date', 'record_status'], 'integer'],
            [['exam_date', 'exam_start_time'], 'safe'],
            [['no_of_question'], 'string', 'max' => 200],
            [['duration'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dept_id' => 'Dept ID',
            'exam_id' => 'Exam ID',
            'section_id' => 'Section ID',
            'sub_id' => 'Sub ID',
            'no_of_question' => 'No Of Question',
            'exam_date' => 'Exam Date',
            'exam_start_time' => 'Exam Start Time',
            'duration' => 'Duration',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
