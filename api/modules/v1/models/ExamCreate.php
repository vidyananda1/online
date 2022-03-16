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
