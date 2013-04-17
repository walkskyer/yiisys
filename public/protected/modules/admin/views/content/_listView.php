<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-4-16
 * Time: 下午2:23
 * File: _listView.php
 * To change this template use File | Settings | File Templates.
 */
/* @var Content $data*/
?>
<tr style="line-height: 24px;">
    <td class="item-checkbox"><input type="checkbox" name="itemid[]" value="<?php echo $data->cnt_id;?>" /></td>
    <td class="align-left">
        <a href="<?php echo url('/content/view',array('id'=>$data->cnt_id));?>"
           target="_blank"><?php echo $data->cnt_id;?></a>
    </td>
    <td class="align-left">
        <a href="<?php echo url('/content/view',array('id'=>$data->cnt_id));?>"
           target="_blank"><?php echo $data->title;?></a>
    </td>
    <td class="align-center">
            <?php echo date('Y-m-d H:i:s',$data->created) ?>
    </td>
    <td class="align-center">
        <a href="<?php echo url('admin/content/update' ,array('id'=>$data->cnt_id)) ?>">修改</a>
        <a href="<?php echo url('admin/content/delete' ,array('id'=>$data->cnt_id)) ?>">删除</a>
    </td>
</tr>