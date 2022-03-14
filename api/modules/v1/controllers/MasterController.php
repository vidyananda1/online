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

class ApplyleaveController extends ActiveController
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
						$model = new Department();
						$model->dept_name = $request->department_name;
						$model->created_by = $user->id;
						if($model->save()){
							$data = ['status'=>'success', 'msg'=>'Department Added'];
							}else{
								$data = ['status'=>'fail', 'msg'=>'Fail to add'];
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
							$dept = Department::find()->where('id'=>$request->id)->one();

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
							
						$index = Department::find()->asArray()->select('id,dept_name')->where('record_status'=>'1')->all();

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
						$model = new Section();
						$model->section_name = $request->section_name;
						$model->dept_id = $request->department_id;
						$model->created_by = $user->id;
						if($model->save()){
							$data = ['status'=>'success', 'msg'=>'Section Added'];
							}else{
								$data = ['status'=>'fail', 'msg'=>'Fail to add'];
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
							$sec = Section::find()->where('id'=>$request->id)->one();

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
							
						$index = Section::find()->asArray()->select('id,section_name,dept_id')->where('record_status'=>'1')->all();

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
	 

    public function actionVersion()
    {
		if($headers = apache_request_headers())
		{
			if($token = $headers['token'])
			{
				if($postdata = file_get_contents("php://input"))
				{
					$request = json_decode($postdata);
					$app = Appversion::find()->where(['sl'=>$request->id])->one();
					return '{"reply":"'.$app->version.'"}';
				}
				else
				{
					return "invalid Token";
				}
			}
			else
			{
				return "invalid header";
			}
		}
		else
		{
		return '{"reply":"Invalid Header"}';
		}
    }
}
