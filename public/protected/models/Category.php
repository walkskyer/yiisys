<?php

/**
 * This is the model class for table "Category".
 *
 * The followings are the available columns in table 'Category':
 * @property integer $catid
 * @property string $cat_name
 * @property string $description
 * @property string $keywords
 * @property integer $pid
 * @property integer $modified
 * @property integer $created
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return 'Category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modified, created', 'required'),
			array('pid, modified, created', 'numerical', 'integerOnly'=>true),
			array('cat_name', 'length', 'max'=>100),
			array('description, keywords', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('catid, cat_name, description, keywords, pid, modified, created', 'safe', 'on'=>'search'),
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
			'catid' => 'Catid',
			'cat_name' => 'Cat Name',
			'description' => 'Description',
			'keywords' => 'Keywords',
			'pid' => 'Pid',
			'modified' => 'Modified',
			'created' => 'Created',
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

		$criteria->compare('catid',$this->catid);

		$criteria->compare('cat_name',$this->cat_name,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('keywords',$this->keywords,true);

		$criteria->compare('pid',$this->pid);

		$criteria->compare('modified',$this->modified);

		$criteria->compare('created',$this->created);

		return new CActiveDataProvider('Category', array(
			'criteria'=>$criteria,
		));
	}
}