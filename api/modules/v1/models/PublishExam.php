<?php

namespace api\modules\v1\models;

use Yii\db\ActiveRecord;
use Yii;
date_default_timezone_set('Asia/Kolkata');

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property int $employee_id
 * @property string $phone
 * @property string $email
 * @property int $branch_id
 * @property int $department_id
 * @property int $designation_id
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
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
            [['dept_id', 'exam_id','total_mark', 'section_id', 'sub_id', 'no_of_question', 'exam_date', 'exam_start_time', 'duration', 'created_by', 'created_date', 'updated_by', 'updated_date', 'record_status'], 'required'],
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
