<?php

/**
 * This is the model class for table "tbl_products".
 *
 * The followings are the available columns in table 'tbl_products':
 * @property integer $id_product
 * @property string $model
 * @property string $copy
 * @property string $image1
 * @property integer $id_collection
 *
 * The followings are the available model relations:
 * @property TblCollections $idCollection
 */
class TProducts extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TProducts the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('model, copy, id_collection', 'required'),
				array('id_collection', 'numerical', 'integerOnly' => true),
				array('model, copy, id_collection, image1', 'required', 'on' => 'create'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('model, copy, image1, id_collection', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'idCollection' => array(self::BELONGS_TO, 'TCollections', 'id_collection'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id_product' => 'Id Product',
				'header' => 'Encabezado',
				'copy' => 'Texto (Copy)',
				'model' => 'Modelo',
				'image1' => 'Imagen del producto (316x320 .png o .jpg)',
				'id_collection' => 'Colección',
				'idCollection' => 'Colección',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id_product', $this->id_product);
		$criteria->compare('header', $this->header, true);
		$criteria->compare('model', $this->model, true);
		$criteria->compare('copy', $this->copy, true);
		$criteria->compare('image1', $this->image1, true);
		$criteria->compare('id_collection', $this->id_collection);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}