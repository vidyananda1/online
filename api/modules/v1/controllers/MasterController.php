<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\filters\Cors;
use yii\rest\ActiveController;
use common\models\User;
use common\models\LoginForm;
use api\modules\v1\models\Appversion;
use api\modules\v1\models\Department;
use api\modules\v1\models\Section;
use api\modules\v1\models\Subject;
use api\modules\v1\models\ExamCreate;
use api\modules\v1\models\PublishExam;

class MasterController extends ActiveController
{
    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => ['*', 'http://localhost'],
                    'Access-Control-Request-Method' => ['POST', 'PUT'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Headers' => ['X-Wsse','X-CSRF-Token','X-CSRF','*'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],
            ],
        ];
    }

    public $modelClass = 'api\modules\v1\models\Appversion';

   

	public function actionDepartmentadd() {
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				
				if($user) {
					if($postdata = file_get_contents("php://input")) {
						// echo "<pre>"; print_r($postdata);die;
						$request = json_decode($postdata);
						$dub = Department::find()->where(['like', 'dept_name', $request->department_name])->andWhere(['record_status'=>'1'])->one();
						if($dub){
							$data = ['status'=>'fail', 'msg'=>'Duplicate Entry'];
						}else{
							$model = new Department();
							$model->dept_name = $request->department_name;
							$model->created_by = $user->id;
						if($model->save()){
							$data = ['status'=>'success', 'msg'=>'Department Added'];
							}else{
								$data = ['status'=>'fail', 'msg'=>'Fail to add'];
							}
							}
						}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
						
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	}

	public function actionDepartmentupdate()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
						if($postdata = file_get_contents("php://input")) {
							$request = json_decode($postdata);	
							$dept = Department::find()->where(['id'=>$request->id])->one();

							if($dept){
								$dept->dept_name = $request->department_name;
								$dept->updated_by = $user->id;
								$dept->updated_date = date('y/m/d');

								if($dept->save()){
									$data = ['status'=>'success', 'msg'=>'Department updated'];
										}else{
											$data = ['status'=>'fail', 'msg'=>'Fail to update'];
										}
								}else{
									$data = ['status'=>'fail', 'msg'=>'Invalid id'];
								}
								
							}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
					} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
					
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 

	public function actionDepartmentindex()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
							
						$index = Department::find()->asArray()->select('id,dept_name')->where(['record_status'=>'1'])->all();

						//return json_encode($status);
						$data = ['status'=>'success', 'msg'=>$index];
					
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	}  



	public function actionSectionadd() {
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				
				if($user) {
					if($postdata = file_get_contents("php://input")) {
						// echo "<pre>"; print_r($postdata);die;
						$request = json_decode($postdata);
						$dub = Section::find()->where(['like', 'section_name', $request->section_name])->andWhere(['dept_id'=>$request->department_id])->andWhere(['record_status'=>'1'])->one();
						if($dub){
							$data = ['status'=>'fail', 'msg'=>'Duplicate Entry'];
						}else{
						$model = new Section();
						$model->section_name = $request->section_name;
						$model->dept_id = $request->department_id;
						$model->created_by = $user->id;
						if($model->save()){
							$data = ['status'=>'success', 'msg'=>'Section Added'];
							}else{
								$data = ['status'=>'fail', 'msg'=>'Fail to add'];
							}
						}
						}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
						
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 

	public function actionSectionupdate()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
						if($postdata = file_get_contents("php://input")) {
							$request = json_decode($postdata);	
							$sec = Section::find()->where(['id'=>$request->id])->one();

							if($sec){
								$model->section_name = $request->section_name;
								$model->dept_id = $request->department_id;
								$dept->updated_by = $user->id;
								$dept->updated_date = date('y/m/d');

								if($dept->save()){
									$data = ['status'=>'success', 'msg'=>'Section updated'];
										}else{
											$data = ['status'=>'fail', 'msg'=>'Fail to update'];
										}
								}else{
									$data = ['status'=>'fail', 'msg'=>'Invalid id'];
								}
								
							}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
					} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
					
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 

	public function actionSectionindex()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
							
						$index = Section::find()->asArray()->select('id,section_name,dept_id')->where(['record_status'=>'1'])->all();

						//return json_encode($status);
						$data = ['status'=>'success', 'msg'=>$index];
					
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 

	public function actionSubjectadd() {
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				
				if($user) {
					if($postdata = file_get_contents("php://input")) {
						// echo "<pre>"; print_r($postdata);die;
						$request = json_decode($postdata);
						$dub = Subject::find()->where(['like', 'sub_name', $request->subject_name])->andWhere(['dept_id'=>$request->department_id])->orWhere(['like', 'sub_code', $request->subject_code])->andWhere(['record_status'=>'1'])->one();
						if($dub){
							$data = ['status'=>'fail', 'msg'=>'Duplicate Entry'];
						}else{
							$model = new Subject();
							$model->dept_id = $request->department_id;
							$model->sub_name = $request->subject_name;
							$model->sub_code = $request->subject_code;
							$model->created_by = $user->id;
						if($model->save()){
							$data = ['status'=>'success', 'msg'=>'Subject Added'];
							}else{
								$data = ['status'=>'fail', 'msg'=>'Fail to add'];
							}
						}
						}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
						
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	}

	public function actionSubjectupdate()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
						if($postdata = file_get_contents("php://input")) {
							$request = json_decode($postdata);	
							$sub = Subject::find()->where(['id'=>$request->id])->one();

							if($sub){
								$model->dept_id = $request->department_id;
								$model->sub_name = $request->subject_name;
								$model->sub_code = $request->subject_code;
								$dept->updated_by = $user->id;
								$dept->updated_date = date('y/m/d');

								if($dept->save()){
									$data = ['status'=>'success', 'msg'=>'Subject updated'];
										}else{
											$data = ['status'=>'fail', 'msg'=>'Fail to update'];
										}
								}else{
									$data = ['status'=>'fail', 'msg'=>'Invalid id'];
								}
								
							}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
					} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
					
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	}   

	public function actionSubjectindex()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
							
						$index = Subject::find()->asArray()->select('id,dept_id,sub_name,sub_code,')->where(['record_status'=>'1'])->all();

						//return json_encode($status);
						$data = ['status'=>'success', 'msg'=>$index];
					
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 

	public function actionExamcreate() {
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				
				if($user) {
					if($postdata = file_get_contents("php://input")) {
						// echo "<pre>"; print_r($postdata);die;
						$request = json_decode($postdata);
						$dub = ExamCreate::find()->where(['like', 'exam_name', $request->exam_name])->andWhere(['start_date'=>$request->start_date])->andWhere(['record_status'=>'1'])->one();
						if($dub){
							$data = ['status'=>'fail', 'msg'=>'Duplicate Entry'];
						}else{
							$model = new ExamCreate();
							$model->exam_name = $request->exam_name;
							$model->dept_id = $request->department_id;
							$model->sec_id = $request->section_id;
							$model->start_date = $request->start_date;
							$model->created_by = $user->id;
						if($model->save()){
							$data = ['status'=>'success', 'msg'=>'Exam Created'];
							}else{
								$data = ['status'=>'fail', 'msg'=>'Fail to Create'];
							}
						}
						}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
						
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	}

	public function actionExamupdate()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
						if($postdata = file_get_contents("php://input")) {
							$request = json_decode($postdata);	
							$exm = ExamCreate::find()->where(['id'=>$request->id])->one();

							if($exm){
								$model->exam_name = $request->exam_name;
								$model->dept_id = $request->department_id;
								$model->sec_id = $request->section_id;
								$model->start_date = $request->start_date;
								$dept->updated_by = $user->id;
								$dept->updated_date = date('y/m/d');

								if($dept->save()){
									$data = ['status'=>'success', 'msg'=>'Exam updated'];
										}else{
											$data = ['status'=>'fail', 'msg'=>'Fail to update'];
										}
								}else{
									$data = ['status'=>'fail', 'msg'=>'Invalid id'];
								}
								
							}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
					} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
					
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 

	public function actionExamindex()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
							
						$index = ExamCreate::find()->asArray()->select('id,dept_id,exam_name,sec_id,start_date')->where(['record_status'=>'1'])->all();

						//return json_encode($status);
						$data = ['status'=>'success', 'msg'=>$index];
					
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 


	public function actionPublishadd() {
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				
				if($user) {
					if($postdata = file_get_contents("php://input")) {
						// echo "<pre>"; print_r($postdata);die;
						$request = json_decode($postdata);
						$dub = PublishExam::find()->where(['dept_id'=>$request->department_id])->andWhere(['exam_id'=>$request->exam_id])->andWhere(['section_id'=>$request->section_id])->andWhere(['sub_id'=>$request->subject_id])->andWhere(['record_status'=>'1'])->one();
						if($dub){
							$data = ['status'=>'fail', 'msg'=>'Duplicate Entry'];
						}else{
							$model = new PublishExam();
							$model->exam_id = $request->exam_id;
							$model->dept_id = $request->department_id;
							$model->sec_id = $request->section_id;
							$model->sub_id = $request->subject_id;
							$model->no_of_question = $request->no_of_question;
							$model->total_mark = $request->total_mark;
							$model->exam_date = $request->exam_date;
							$model->exam_start_time = $request->exam_start_time;
							$model->duration = $request->duration;
							$model->created_by = $user->id;
						if($model->save()){
							$data = ['status'=>'success', 'msg'=>'Exam Published Created'];
							}else{
								$data = ['status'=>'fail', 'msg'=>'Fail to Publish'];
							}
						}
						}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
						
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	}

	public function actionPublishupdate()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
						if($postdata = file_get_contents("php://input")) {
							$request = json_decode($postdata);	
							$exm = PublishExam::find()->where(['id'=>$request->id])->one();

							if($exm){
								$model->exam_id = $request->exam_id;
								$model->dept_id = $request->department_id;
								$model->sec_id = $request->section_id;
								$model->sub_id = $request->subject_id;
								$model->no_of_question = $request->no_of_question;
								$model->total_mark = $request->total_mark;
								$model->exam_date = $request->exam_date;
								$model->exam_start_time = $request->exam_start_time;
								$model->duration = $request->duration;
								$dept->updated_by = $user->id;
								$dept->updated_date = date('y/m/d');

								if($dept->save()){
									$data = ['status'=>'success', 'msg'=>'Exam updated'];
										}else{
											$data = ['status'=>'fail', 'msg'=>'Fail to update'];
										}
								}else{
									$data = ['status'=>'fail', 'msg'=>'Invalid id'];
								}
								
							}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
					} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
					
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 

	public function actionPublishindex()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
							
						$index = PublishExam::find()->asArray()->select('id,exam_id,dept_id,section_id,sub_id,no_of_question,total_mark,exam_date,exam_start_time,duration')->where(['record_status'=>'1'])->all();

						//return json_encode($status);
						$data = ['status'=>'success', 'msg'=>$index];
					
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 
	 
	public function actionQuestionadd() {
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				
				if($user) {
					if($postdata = file_get_contents("php://input")) {
						// echo "<pre>"; print_r($postdata);die;
						$request = json_decode($postdata);
						$dub = PublishExam::find()->where(['dept_id'=>$request->department_id])->andWhere(['exam_id'=>$request->exam_id])->andWhere(['section_id'=>$request->section_id])->andWhere(['sub_id'=>$request->subject_id])->andWhere(['record_status'=>'1'])->one();
						if($dub){
							$data = ['status'=>'fail', 'msg'=>'Duplicate Entry'];
						}else{
							$model = new PublishExam();
							$model->exam_id = $request->exam_id;
							$model->dept_id = $request->department_id;
							$model->sec_id = $request->section_id;
							$model->sub_id = $request->subject_id;
							$model->no_of_question = $request->no_of_question;
							$model->total_mark = $request->total_mark;
							$model->exam_date = $request->exam_date;
							$model->exam_start_time = $request->exam_start_time;
							$model->duration = $request->duration;
							$model->created_by = $user->id;
						if($model->save()){
							$data = ['status'=>'success', 'msg'=>'Exam Published Created'];
							}else{
								$data = ['status'=>'fail', 'msg'=>'Fail to Publish'];
							}
						}
						}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
						
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	}

	public function actionQuestionupdate()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
						if($postdata = file_get_contents("php://input")) {
							$request = json_decode($postdata);	
							$exm = PublishExam::find()->where(['id'=>$request->id])->one();

							if($exm){
								$model->exam_id = $request->exam_id;
								$model->dept_id = $request->department_id;
								$model->sec_id = $request->section_id;
								$model->sub_id = $request->subject_id;
								$model->no_of_question = $request->no_of_question;
								$model->total_mark = $request->total_mark;
								$model->exam_date = $request->exam_date;
								$model->exam_start_time = $request->exam_start_time;
								$model->duration = $request->duration;
								$dept->updated_by = $user->id;
								$dept->updated_date = date('y/m/d');

								if($dept->save()){
									$data = ['status'=>'success', 'msg'=>'Exam updated'];
										}else{
											$data = ['status'=>'fail', 'msg'=>'Fail to update'];
										}
								}else{
									$data = ['status'=>'fail', 'msg'=>'Invalid id'];
								}
								
							}else{
							$data = ['status'=>'fail', 'msg'=>$model->errors];
						}
					} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
					
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 

	public function actionQuestionindex()
	{
		if($headers = apache_request_headers())
		{
			if(isset($headers['token']) && $token = $headers['token']) {
				$user = User::find()->where(['auth_key'=>$token])->one();
				if($user) {
							
						$index = PublishExam::find()->asArray()->select('id,exam_id,dept_id,section_id,sub_id,no_of_question,total_mark,exam_date,exam_start_time,duration')->where(['record_status'=>'1'])->all();

						//return json_encode($status);
						$data = ['status'=>'success', 'msg'=>$index];
					
				} else {
					$data = ['status'=>'fail', 'msg'=>'Invalid token'];
				}
			} else {
				$data = ['status'=>'fail', 'msg'=>'Missing token'];
			}
		} else {
			$data = ['status'=>'fail', 'msg'=>'Invalid header'];
		}
		return json_encode($data);
	} 



  //   public function actionVersion()
  //   {
		// if($headers = apache_request_headers())
		// {
		// 	if($token = $headers['token'])
		// 	{
		// 		if($postdata = file_get_contents("php://input"))
		// 		{
		// 			$request = json_decode($postdata);
		// 			$app = Appversion::find()->where(['sl'=>$request->id])->one();
		// 			return '{"reply":"'.$app->version.'"}';
		// 		}
		// 		else
		// 		{
		// 			return "invalid Token";
		// 		}
		// 	}
		// 	else
		// 	{
		// 		return "invalid header";
		// 	}
		// }
		// else
		// {
		// return '{"reply":"Invalid Header"}';
		// }
  //   }
}
