<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public $defaultAction = 'admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'postOnly + delete', // we only allow deletion via POST request
		);
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$profileAttr = array();
		if (!empty($model->profile)) {
			if (method_exists($model->profile,'detailData')) {
				$profileAttr = $model->profile->detailData();
			}
		}

		$this->render('view',array(
			'model'=> $model,
			'profileAttr' => $profileAttr,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
		$model->profile = new Profile();

		$profileForm = Yii::app()->controller->module->profileForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			$transaction = Yii::app()->db->beginTransaction();
			if ($model->save()) {

				if (isset($_POST['Profile'])) {
					$model->profile->attributes = $_POST['Profile'];
				}

				$model->profile->user_id = $model->id;
				if ($model->profile->save()) {
					$transaction->commit();

					$this->onUserCreate = Yii::app()->controller->module->eventOnUserCreate;

					$event = new CEvent($model);
					$this->onUserCreate($event);

					$this->redirect(array('view','id'=>$model->id));
				} else {
					$transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'profileForm'=>$profileForm,
		));
	}

	public function onUserCreate($event) {
		$this->raiseEvent('onUserCreate', $event);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if (!$model->profile) {$model->profile = new Profile();}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$profileForm = Yii::app()->controller->module->profileForm;
		$profileModel = Yii::app()->controller->module->profileModel;

		if (isset($_POST['User'])) {
			$model->attributes=$_POST['User'];
			if ($model->save()) {
				// save profile if exist
				if (isset($_POST[$profileModel])) {
					$model->profile->attributes = $_POST[$profileModel];
					$model->profile->save();
				}

				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'profileForm'=>$profileForm,
		));
	}

	public function actionReset($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$model->attributes=$_POST['User'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('reset',array(
				'model'=>$model,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['User'])) {
			$model->attributes=$_GET['User'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}
}