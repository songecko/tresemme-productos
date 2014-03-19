<?php

/**
 * This is the model class for table "tbl_landing".
 *
 * The followings are the available columns in table 'tbl_landing':
 * @property integer $id_landing
 * @property string $copy
 * @property string $image_back
 * @property string $image_mobile
 */
class TLanding extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TLanding the static model class
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
		return 'tbl_landing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('copy', 'required'),
				//array('image_back', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id_landing, copy, image_back, image_mobile', 'safe', 'on' => 'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id_landing' => 'Id Landing',
				'copy' => 'Texto (Copy)',
				'image_back' => 'Imagen de Fondo (810x683, .png o .jpg)',
				'image_mobile' => 'Imagen de Fondo (.png o .jpg)',
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

		$criteria->compare('id_landing', $this->id_landing);
		$criteria->compare('copy', $this->copy, true);
		$criteria->compare('image_back', $this->image_back, true);
		$criteria->compare('image_mobile', $this->image_mobile, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}