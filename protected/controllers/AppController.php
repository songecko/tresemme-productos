<?php

require_once __DIR__.'/../../mobile-detect/Mobile_Detect.php';
require_once __DIR__.'/../../php-sdk/facebook.php';

class AppController extends Controller
{
	var $layout = false;
	
	public function actionIndex()
	{
		$detect = new Mobile_Detect;
		$facebook = new Facebook(array(
			'appId' => '361977160579483',
			'secret' => 'f3b486795c02218cdfc69450e9a3609d',
			'allowSignedRequest' => true,
			'cookie' => true
		));
		$signedRequest = $facebook->getSignedRequest();
		
		if(!$detect->isMobile() && $signedRequest == null) 
		{
			$this->redirect('https://www.facebook.com/TRESemmePR/app_361977160579483');
		}
		
		$model_landing = TLanding::model()->findByPk('1');
		$model_collections = TCollections::model()->findAll();
		
		$this->render('index', array(
				'model_landing' => $model_landing,
				'model_collections' => $model_collections,
		));
	}
	
	public function actionLanding()
	{
		$model_landing = TLanding::model()->findByPk('1');
		$model_collections = TCollections::model()->findAll();
		
		$isMobile = false;
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		if(preg_match("/Android|webOS|iPhone|iPad|iPod|BlackBerry/i", $agent, $match)){
			$isMobile = true;
		}
		
		//$isMobile = true;
		
		$back = $isMobile? $model_landing->image_mobile : $model_landing->image_back;;
		
		$this->render('landing', array(
				'model_landing' => $model_landing,
				'model_collections' => $model_collections,
				'back' => $back,
		));
	}
	
	public function actionCollection($id)
	{
		$model_collection = TCollections::model()->findByPk($id);
		$model_products = TProducts::model()->findAllByAttributes(array(
				'id_collection' => $id)
		);
		
		$isMobile = false;
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		if(preg_match("/Android|webOS|iPhone|iPad|iPod|BlackBerry/i", $agent, $match)){
			$isMobile = true;
		}
		
		//$isMobile = true;
		
		if($id == '2'){
			$col = 'col2';
			$glow = 'glow_product_col2.png';
		}else if($id == '3'){
			$col = 'col3';
			$glow = 'glow_product_col3.png';
		}else if($id == '4'){
			$col = 'col4';
			$glow = 'glow_product_col4.png';
		}else if($id == '5'){
			$col = 'col5';
			$glow = 'glow_product_col5.png';
		}else{
			$col = 'col1';
			$glow = 'glow_product_col1.png';
		}
		
		$back = $isMobile? $model_collection->image_mobile : $model_collection->image_back;
		
		$this->render('collection', array(
				'model_collection' => $model_collection,
				'model_products' => $model_products,
				'col' => $col,
				'glow' => $glow,
				'back' => $back,
		));
	}
	
	public function actionProduct($id)
	{
		$model_product = TProducts::model()->findByPk($id);
		
		header('Content-type: application/json');
		echo CJSON::encode(array('copy'=>$model_product->copy, 'header'=>$model_product->model));
		
		Yii::app()->end();
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}