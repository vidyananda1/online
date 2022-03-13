<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $stud_reg_no
 * @property int $dept_id
 * @property string $name
 * @property string $dob
 * @property string $gender
 * @property string $mobile
 * @property string $email
 * @property string $address
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stud_reg_no', 'dept_id', 'name', 'dob', 'gender', 'mobile', 'email', 'address', 'created_by'], 'required'],
            [['dept_id', 'created_by', 'updated_by'], 'integer'],
            [['dob', 'created_date', 'updated_date'], 'safe'],
            [['gender', 'address'], 'string'],
            [['stud_reg_no', 'mobile'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 60],
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
            'stud_reg_no' => 'Stud Reg No',
            'dept_id' => 'Dept ID',
            'name' => 'Name',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'address' => 'Address',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
