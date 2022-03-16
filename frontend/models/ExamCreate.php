<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exam_create".
 *
 * @property int $id
 * @property string $exam_name
 * @property int $dept_id
 * @property int $sec_id
 * @property string $start_date
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class ExamCreate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exam_create';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exam_name', 'dept_id', 'sec_id', 'start_date', 'created_by'], 'required'],
            [['dept_id', 'sec_id', 'created_by', 'updated_by'], 'integer'],
            [['start_date', 'created_date', 'updated_date'], 'safe'],
            [['exam_name'], 'string', 'max' => 255],
            [['record_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'exam_name' => 'Exam Name',
            'dept_id' => 'Dept ID',
            'sec_id' => 'Sec ID',
            'start_date' => 'Start Date',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
