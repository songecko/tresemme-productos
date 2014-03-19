<?php

/**
 * This is the model class for table "tbl_collections".
 *
 * The followings are the available columns in table 'tbl_collections':
 * @property integer $id_collection
 * @property string $header
 * @property string $copy
 * @property string $image_back
 * @property string $image_collection
 * @property string $model
 * @property string $copy
 * @property string $header
 * @property string $image_mobile
 *
 * The followings are the available model relations:
 * @property TblProducts[] $tblProducts
 */
class TCollections extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TCollections the static model class
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
		return 'tbl_collections';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('header, title, copy', 'required'),
				array('header, title, image_back, image_collection, copy, image_mobile', 'required', 'on' => 'create'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id_collection, image_back, header, image_collection, copy, image_mobile', 'safe', 'on' => 'search'),
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
				'tblProducts' => array(self::HAS_MANY, 'TblProducts', 'id_collection'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id_collection' => 'Id Collection',
				'image_back' => 'Imagen de fondo (810x683, .png o .jpg)',
				'image_collection' => 'Imagen de la colección (472x426, .png o .jpg)',
				'title' => 'Titulo',
				'copy' => 'Texto (Copy)',
				'header' => 'Encabezado',
				'image_mobile' => 'Imagen de fondo movil (640x960, .png o .jpg)',
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

		$criteria->compare('id_collection', $this->id_collection);
		$criteria->compare('image_back', $this->image_back, true);
		$criteria->compare('title', $this->image_back, true);
		$criteria->compare('copy', $this->image_back, true);
		$criteria->compare('header', $this->header, true);
		$criteria->compare('image_collection', $this->image_collection, true);
		$criteria->compare('image_mobile', $this->image_mobile, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}
	
	public static function getCollections()
	{
		return TCollections::model()->findAll();
	}

}