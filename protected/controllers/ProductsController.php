<?php

class ProductsController extends Controller {

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
						'actions' => array('index', 'create', 'update', 'delete'),
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
		$model = new TProducts('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['TProducts'])) {
			$oldImageName1 = strtolower($model->image1);

			$model->attributes = $_POST['TProducts'];

			$image1 = CUploadedFile::getInstance($model, 'image1');
			//echo var_dump($image) . '++';
			//exit;

			if ($image1 && ($image1->type == 'image/jpeg' || $image1->type == 'image/png')) {
				$image_arr = explode('.', $image1->name);
				$imageName = uniqid($image1->name) . '.' . ($image_arr[1]);
				//echo $imageName;

				$model->image1 = $imageName;

				$uploadPath = realpath('./uploads/');

				$orignalPath = $uploadPath . '/originals/' . $oldImageName1;
				$thumbPath = $uploadPath . '/thumb/' . $oldImageName1;
				//echo is_file($orignalPath);
				if (is_file($orignalPath) && file_exists($orignalPath)) {
					unlink($orignalPath);
				}
				if (is_file($thumbPath) && file_exists($thumbPath)) {
					unlink($thumbPath);
				}

				$imageToSave = $uploadPath . '/originals/' . $imageName;
				$image1->saveAs($imageToSave);

				//echo 'end';
				//exit;
			}

			if ($model->save())
				$this->redirect(array('index'));
		}

		$data = CHtml::listData(TCollections::getCollections(), 'id_collection', 'title');

		$this->render('create', array(
				'model' => $model,
				'collections' => $data,
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

		if (isset($_POST['TProducts'])) {
			$oldImageName1 = strtolower($model->image1);

			$model->attributes = $_POST['TProducts'];

			$image1 = CUploadedFile::getInstance($model, 'image1');
			//echo var_dump($image) . '++';
			//exit;

			if ($image1 && ($image1->type == 'image/jpeg' || $image1->type == 'image/png')) {
				$image_arr = explode('.', $image1->name);
				$imageName = uniqid($image1->name) . '.' . ($image_arr[1]);
				//echo $imageName;

				$model->image1 = $imageName;

				$uploadPath = realpath('./uploads/');

				$orignalPath = $uploadPath . '/originals/' . $oldImageName1;
				$thumbPath = $uploadPath . '/thumb/' . $oldImageName1;

				if (is_file($orignalPath) && file_exists($orignalPath)) {
					unlink($orignalPath);
				}
				if (is_file($thumbPath) && file_exists($thumbPath)) {
					unlink($thumbPath);
				}

				$imageToSave = $uploadPath . '/originals/' . $imageName;
				$image1->saveAs($imageToSave);
			}

			if ($model->save())
				$this->redirect(array('index'));
		}
		
		$data = CHtml::listData(TCollections::getCollections(), 'id_collection', 'title');

		$this->render('update', array(
				'model' => $model,
				'collections' => $data,
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
			
			$image1 = $model->image1;
			$uploadPath = realpath('./uploads/');

			$orignalPath = $uploadPath . '/originals/' . $image1;
			$thumbPath = $uploadPath . '/thumb/' . $image1;
			@unlink($orignalPath);
			@unlink($thumbPath);
			
			$model->delete();
		}catch(Exception $e){}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(array('products/index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('TProducts', array(
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
		$model = new TProducts('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['TProducts']))
			$model->attributes = $_GET['TProducts'];

		$this->render('admin', array(
				'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TProducts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = TProducts::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TProducts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'tproducts-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
