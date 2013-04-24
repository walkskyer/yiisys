<?php
/* @var UserController $this*/
/* @var CActiveDataProvider $dataProvider*/
?>
<div class="sys-container">
    <fieldset>
        <legend>用户列表</legend>
        <?php $template=<<<EOF
<table class="table table-striped table-bordered sys-list-table table-post-list">
    <thead>
    <tr>
        <th class="span2">用户名</th>
        <th class="span2 align-center">Email</th>
        <th class="span2 align-center">创建时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>{items}
    </tbody>
</table>
<div class="beta-pages">{pager}</div>
EOF;
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_listView',
    'pager'=>array('class'=>'CLinkPager',
        'htmlOptions'=>array(
            'class'=>'pagination'
        ),
    ),
    'template'=>$template,
)); ?>
    </fieldset>
</div>