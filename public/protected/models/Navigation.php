<?php

/**
 * This is the model class for table "Navigation".
 *
 * The followings are the available columns in table 'Navigation':
 * @property integer $navid
 * @property string $nav_name
 * @property string $url_data
 * @property string $type
 */
class Navigation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Navigation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Navigation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nav_name, url_data', 'length', 'max'=>45),
			array('type', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('navid, nav_name, url_data, type', 'safe', 'on'=>'search'),
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
			'navid' => 'Navid',
			'nav_name' => 'Nav Name',
			'url_data' => 'Url Data',
			'type' => 'Type',
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

		$criteria=new CDbCriteria;

		$criteria->compare('navid',$this->navid);

		$criteria->compare('nav_name',$this->nav_name,true);

		$criteria->compare('url_data',$this->url_data,true);

		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider('Navigation', array(
			'criteria'=>$criteria,
		));
	}
}