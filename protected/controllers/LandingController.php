<?php

class LandingController extends Controller {

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions' => array('update'),
						'users' => array('@'),
				),
				array('deny', // deny all users
						'users' => array('*'),
				),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
				'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new TLanding;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TLanding'])) {
			$model->attributes = $_POST['TLanding'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id_landing));
		}

		$this->render('create', array(
				'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TLanding'])) {
			$oldImageName = strtolower($model->image_back);
			$oldImageName_mobile = strtolower($model->image_mobile);
			
			$model->attributes = $_POST['TLanding'];
			//handle the image
			
			try{
				$image = CUploadedFile::getInstance($model, 'image_back');
				
				if ($image && ($image->type == 'image/jpeg' || $image->type == 'image/png')) {
					$image_arr = explode('.', $image->name);
					$imageName = uniqid($image->name) . '.' . ($image_arr[1]);

					$model->image_back = $imageName;

					$uploadPath = realpath('../tressemme/uploads/');

					$orignalPath = $uploadPath . '/originals/' . $oldImageName;
					$thumbPath = $uploadPath . '/thumb/' . $oldImageName;
					if(file_exists($orignalPath)) unlink ($orignalPath);
					if(file_exists($thumbPath)) unlink ($thumbPath);

					$imageToSave = $uploadPath . '/originals/' . $imageName;
					$image->saveAs($imageToSave);
				}

				$image_mobile = CUploadedFile::getInstance($model, 'image_mobile');

				if ($image_mobile && ($image_mobile->type == 'image/jpeg' || $image_mobile->type == 'image/png')) {
					$image_arr = explode('.', $image_mobile->name);
					$imageName = uniqid($image_mobile->name) . '.' . ($image_arr[1]);

					$model->image_mobile = $imageName;

					$uploadPath = realpath('../tressemme/uploads/');

					$orignalPath = $uploadPath . '/originals/' . $oldImageName_mobile;
					$thumbPath = $uploadPath . '/thumb/' . $oldImageName_mobile;
					if(file_exists($orignalPath)) unlink ($orignalPath);
					if(file_exists($thumbPath)) unlink ($thumbPath);

					$imageToSave = $uploadPath . '/originals/' . $imageName;
					$image_mobile->saveAs($imageToSave);
				}
			}catch(Exception $e){}

			if ($model->save()) {
				Yii::app()->user->setFlash('saved', 'Se actualizo con exito el Landing Page');
			}
		}

		$this->render('update', array(
				'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('TLanding');
		$this->render('index', array(
				'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new TLanding('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['TLanding']))
			$model->attributes = $_GET['TLanding'];

		$this->render('admin', array(
				'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TLanding the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = TLanding::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TLanding $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'tlanding-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
