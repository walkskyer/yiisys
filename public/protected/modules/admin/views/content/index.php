<?php
/* @var ContentController $this*/
?>
<div class="btn-toolbar">
    <button class="btn btn-small" id="select-all">全选</button>
</div>

<?php $template=<<<EOF
<table class="table table-striped table-bordered beta-list-table table-post-list">
    <thead>
    <tr>
        <th class="item-checkbox align-center">#</th>
        <th class="span1 align-center">ID</th>
        <th class="span6">标题</th>
        <th class="span2 align-center">发布时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>{items}
    </tbody>
</table>
<div class="beta-pages">{pager}</div>
EOF;
/* @var CDataProvider $dataProvider*/
$this->widget('zii.widgets.CListView',array(
    'dataProvider'=>$dataProvider,
    'pager'=>array('class'=>'CLinkPager',
        'htmlOptions'=>array(
            'class'=>'pagination'
        ),
    ),
    'template'=>$template,
    'itemView'=>'_listView'
));
//$this->widget('CLinkPager', array('pages'=>$pages, 'htmlOptions'=>array('class'=>'pagination')));?>

<script type="text/javascript">
    $(function(){
        $(document).on('click', '.set-trash, .set-delete', {confirmText:confirmAlertText}, BetaAdmin.deleteRow);
        $(document).on('click', '#batch-delete, #batch-trash', {confirmText:confirmAlertText}, BetaAdmin.deleteMultiRows);
        $(document).on('click', '#batch-recommend, #batch-hottest', BetaAdmin.setMultiRowsMark);
        $(document).on('click', '#batch-verify', BetaAdmin.verifyMultiRows);
        $(document).on('click', '#batch-reject', {confirmText:confirmAlertText}, BetaAdmin.rejectMultiPosts);

        $(document).on('click', '#select-all', BetaAdmin.selectAll);
        $(document).on('click', '#reverse-select', BetaAdmin.reverseSelect);

        $(document).on('click', '.btn-update-state', BetaAdmin.quickUpdate);

        $('table td.post-quick-edit').mouseenter(function(event){
            $(this).find('.state-update-block').animate({'visibility':'hidden'},200, function(){
                $(this).css('visibility', 'visible');
            });
        });
        $('table td.post-quick-edit').mouseleave(function(event){
            $(this).find('.state-update-block').stop(true, true).css('visibility', 'hidden');
        });
        $('table td.post-preivew-link').mouseenter(function(event){
            $(this).find('.quick-links').hide().delay(150).show(1);
        });
        $('table td.post-preivew-link').mouseleave(function(event){
            $(this).find('.quick-links').stop(true, true).hide();
        });
    });
</script>
