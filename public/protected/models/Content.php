<?php

/**
 * This is the model class for table "Content".
 *
 * The followings are the available columns in table 'Content':
 * @property string $cnt_id
 * @property integer $catid
 * @property string $title
 * @property string $content
 * @property string $keywords
 * @property string $summary
 * @property string $tag
 * @property integer $modified
 * @property integer $created
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Content the static model class
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
		return 'Content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('catid', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('keywords, summary, tag', 'length', 'max'=>255),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cnt_id, catid, title, content, keywords, summary, tag, modified, created', 'safe', 'on'=>'search'),
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
			'cnt_id' => 'Cnt',
			'catid' => 'Catid',
			'title' => 'Title',
			'content' => 'Content',
			'keywords' => 'Keywords',
			'summary' => 'Summary',
			'tag' => 'Tag',
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

		$criteria->compare('cnt_id',$this->cnt_id,true);

		$criteria->compare('catid',$this->catid);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('keywords',$this->keywords,true);

		$criteria->compare('summary',$this->summary,true);

		$criteria->compare('tag',$this->tag,true);

		$criteria->compare('modified',$this->modified);

		$criteria->compare('created',$this->created);

		return new CActiveDataProvider('Content', array(
			'criteria'=>$criteria,
		));
	}

    public function beforeSave(){
        $this->modified=time();
        if($this->getIsNewRecord()){
            $this->created=$this->modified;
        }
        return parent::beforeSave();
    }
}