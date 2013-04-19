<?php

/**
 * This is the model class for table "Category".
 *
 * The followings are the available columns in table 'Category':
 * @property integer $catid
 * @property string $cat_name
 * @property string $description
 * @property string $keywords
 * @property integer $level
 * @property integer $pid
 * @property integer $order
 * @property integer $modified
 * @property integer $created
 */
class Category extends CActiveRecord
{
    /* @var array
     */
    public $son;
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
			array('pid, modified, created, order', 'numerical', 'integerOnly'=>true),
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
			'cat_name' => '分类名称',
			'description' => '分类描述',
			'keywords' => '关键字',
            'level'=>'分类层级',
			'pid' => '父分类',
            'order'=>'显示顺序',
			'modified' => '修改时间',
			'created' => '创建时间',
		);
	}

    /**
     * 取得树形结构的分类信息
     * @param int $level
     * @return array
     */
    public function getTree($level=10){
        $level=intval($level);
        if(!$level){
            return array();
        }
        $criteria=new CDbCriteria(array(
            'limit'=>3000,
            'order'=>'`level` ASC,`order` ASC,`catid` DESC'
        ));
        /* @var array $temp*/
        $temp=$this->findAll($criteria);
        $items=array();
        /* @var Category $item*/
        foreach($temp as $item){
            if($item->level<=$level)
                $items[$item->catid]=$item;
        }
        $tree=array();
        foreach($items as $item){
            if($item->pid>0){
                $items[$item->pid]->son[]=& $items[$item->catid];
            }else{
                $tree[]=& $items[$item->catid];
            }
        }
        return $tree;
    }

    /**
     * 取得序列化的分类列表
     * @param int $level
     * @return array
     */
    public function categoryList($tree,& $list,$conj=''){
        if(is_array($tree)){
            foreach($tree as $item){
                /* @var Category $item*/
                $list[$item->catid]=$conj.$item->cat_name;
                if(isset($item->son) && !is_null($item->son)){
                    $this->categoryList($item->son,$list,$conj.'----');
                }
            }
        }else{
            $list[$tree->catid]=$conj.$tree->cat_name;
        }
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

    public function beforeSave(){
        $this->modified=time();
        if($this->getIsNewRecord()){
            $this->created=$this->modified;
        }
        if($this->pid>0){
            /* @var Category $parent*/
            $parent=Category::model()->findByPk($this->pid);
            if(!is_null($parent)){
                $this->level=$parent->level+1;
            }
        }
        return parent::beforeSave();
    }
}