<?php

class CollectionsController extends Controller {

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
						'actions' => array('index', 'create', 'update', 'delete', 'admin'),
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
		$model = new TCollections('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TCollections'])) {
			$oldImageName_back = strtolower($model->image_back);
			$oldImageName_collection = strtolower($model->image_collection);
			$oldImageName_mobile = strtolower($model->image_mobile);

			$model->attributes = $_POST['TCollections'];
			
			//handle the image
			$image_mobile = CUploadedFile::getInstance($model, 'image_mobile');
			
			if ($image_mobile && ($image_mobile->type == 'image/jpeg' || $image_mobile->type == 'image/png')) {
				$image_arr = explode('.', $image_mobile->name);
				$imageName = uniqid($image_mobile->name) . '.' . ($image_arr[1]);
				//echo $imageName;

				$model->image_mobile = $imageName;

				$uploadPath = realpath('../tressemme/uploads/');

				$orignalPath = $uploadPath . '/originals/' . $oldImageName_mobile;
				$thumbPath = $uploadPath . '/thumb/' . $oldImageName_mobile;
				//echo is_file($orignalPath);
				if (is_file($orignalPath) && file_exists($orignalPath)) {
					unlink($orignalPath);
				}
				if (is_file($thumbPath) && file_exists($thumbPath)) {
					unlink($thumbPath);
				}

				$imageToSave = $uploadPath . '/originals/' . $imageName;
				$image_mobile->saveAs($imageToSave);
			}
			
			$image_back = CUploadedFile::getInstance($model, 'image_back');

			if ($image_back && ($image_back->type == 'image/jpeg' || $image_back->type == 'image/png')) {
				$image_arr = explode('.', $image_back->name);
				$imageName = uniqid($image_back->name) . '.' . ($image_arr[1]);

				$model->image_back = $imageName;

				$uploadPath = realpath('../tressemme/uploads/');

				$orignalPath = $uploadPath . '/originals/' . $oldImageName_back;
				$thumbPath = $uploadPath . '/thumb/' . $oldImageName_back;
				
				if (is_file($orignalPath) && file_exists($orignalPath)) {
					unlink($orignalPath);
				}
				if (is_file($thumbPath) && file_exists($thumbPath)) {
					unlink($thumbPath);
				}

				$imageToSave = $uploadPath . '/originals/' . $imageName;
				$image_back->saveAs($imageToSave);
			}

			$image_collection = CUploadedFile::getInstance($model, 'image_collection');

			if ($image_collection && ($image_collection->type == 'image/jpeg' || $image_collection->type == 'image/png')) {
				$image_arr = explode('.', $image_collection->name);
				$imageName = uniqid($image_collection->name) . '.' . ($image_arr[1]);

				$model->image_collection = $imageName;

				$uploadPath = realpath('../tressemme/uploads/');

				$orignalPath = $uploadPath . '/originals/' . $oldImageName_collection;
				$thumbPath = $uploadPath . '/thumb/' . $oldImageName_collection;
				if (is_file($orignalPath) && file_exists($orignalPath)) {
					unlink($orignalPath);
				}
				if (is_file($thumbPath) && file_exists($thumbPath)) {
					unlink($thumbPath);
				}

				$imageToSave = $uploadPath . '/originals/' . $imageName;
				$image_collection->saveAs($imageToSave);
			}

			if ($model->save())
				$this->redirect(array('index'));
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

		if (isset($_POST['TCollections'])) {
			$oldImageName_back = strtolower($model->image_back);
			$oldImageName_collection = strtolower($model->image_collection);
			$oldImageName_mobile = strtolower($model->image_mobile);

			$model->attributes = $_POST['TCollections'];
			//handle the image
			
			$image_mobile = CUploadedFile::getInstance($model, 'image_mobile');
			
			if ($image_mobile && ($image_mobile->type == 'image/jpeg' || $image_mobile->type == 'image/png')) {
				$image_arr = explode('.', $image_mobile->name);
				$imageName = uniqid($image_mobile->name) . '.' . ($image_arr[1]);

				$model->image_mobile = $imageName;

				$uploadPath = realpath('../tressemme/uploads/');

				$orignalPath = $uploadPath . '/originals/' . $oldImageName_mobile;
				$thumbPath = $uploadPath . '/thumb/' . $oldImageName_mobile;
				if (is_file($orignalPath) && file_exists($orignalPath)) {
					unlink($orignalPath);
				}
				if (is_file($thumbPath) && file_exists($thumbPath)) {
					unlink($thumbPath);
				}

				$imageToSave = $uploadPath . '/originals/' . $imageName;
				$image_mobile->saveAs($imageToSave);
			}
			
			$image_back = CUploadedFile::getInstance($model, 'image_back');

			if ($image_back && ($image_back->type == 'image/jpeg' || $image_back->type == 'image/png')) {
				$image_arr = explode('.', $image_back->name);
				$imageName = uniqid($image_back->name) . '.' . ($image_arr[1]);

				$model->image_back = $imageName;

				$uploadPath = realpath('../tressemme/uploads/');

				$orignalPath = $uploadPath . '/originals/' . $oldImageName_back;
				$thumbPath = $uploadPath . '/thumb/' . $oldImageName_back;

				if (is_file($orignalPath) && file_exists($orignalPath)) {
					unlink($orignalPath);
				}
				if (is_file($thumbPath) && file_exists($thumbPath)) {
					unlink($thumbPath);
				}

				$imageToSave = $uploadPath . '/originals/' . $imageName;
				$image_back->saveAs($imageToSave);
			}

			$image_collection = CUploadedFile::getInstance($model, 'image_collection');

			if ($image_collection && ($image_collection->type == 'image/jpeg' || $image_collection->type == 'image/png')) {
				$image_arr = explode('.', $image_collection->name);
				$imageName = uniqid($image_collection->name) . '.' . ($image_arr[1]);

				$model->image_collection = $imageName;

				$uploadPath = realpath('../tressemme/uploads/');

				$orignalPath = $uploadPath . '/originals/' . $oldImageName_collection;
				$thumbPath = $uploadPath . '/thumb/' . $oldImageName_collection;
				if (is_file($orignalPath) && file_exists($orignalPath)) {
					unlink($orignalPath);
				}
				if (is_file($thumbPath) && file_exists($thumbPath)) {
					unlink($thumbPath);
				}

				$imageToSave = $uploadPath . '/originals/' . $imageName;
				$image_collection->saveAs($imageToSave);
			}

			if ($model->save())
				$this->redirect(array('index'));
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
	public function actionDelete($id=0)
	{
		try{
			$model = $this->loadModel($_POST['id']);
			
			$image_back = $model->image_back;
			$image_collection = $model->image_collection;
			$image_mobile = $model->image_mobile;
			$uploadPath = realpath('../tressemme/uploads/');

			$orignalPath = $uploadPath . '/originals/';
			$thumbPath = $uploadPath . '/thumb/';
			
			@unlink($orignalPath . $image_back);
			@unlink($thumbPath . $image_back);
			@unlink($orignalPath . $image_collection);
			@unlink($thumbPath . $image_collection);
			@unlink($orignalPath . $image_mobile);
			@unlink($thumbPath . $image_mobile);
			
			$model->delete();
		}catch(Exception $e){}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('TCollections', array(
				'pagination'=>array(
						'pageSize'=>300,
				),
		));
		$this->render('index', array(
				'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new TCollections('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['TCollections']))
			$model->attributes = $_GET['TCollections'];

		$this->render('admin', array(
				'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TCollections the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = TCollections::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TCollections $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'tcollections-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
