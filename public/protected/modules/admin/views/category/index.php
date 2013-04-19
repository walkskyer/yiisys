<?php
/* @var CategoryController $this*/
/* @var array $catTree*/
?>

<h1>分类管理</h1>
<table class="table table-striped table-bordered sys-list-table table-post-list">
    <thead>
    <tr>
        <th class="span4 align-center">分类名称</th>
        <th class="span2 align-center">分类层级</th>
        <th class="span2 align-center">发布时间</th>
        <th class="align-center">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php category_list($catTree,$this);?>
    </tbody>
</table>

<?php
function level_style($level,$style='----'){
    $level=intval($level);
    $return='';
    if($level){
        while($level){
            $return.=$style;
            $level--;
        }
        return $return;
    }
    return $return;
}

function category_list($category,$controller){
    /* @var CategoryController $controller*/
    if(is_array($category)){
        foreach($category as $data){
            /* @var Category $data*/
            $controller->renderPartial('_listView',array('data'=>$data));
            if(!is_null($data->son)){
                category_list($data->son,$controller);
            }
        }
    }else{
        $controller->renderPartial('_listView',array('data'=>$category));
    }
}
?>