<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-4-16
 * Time: 下午2:23
 * File: _listView.php
 * To change this template use File | Settings | File Templates.
 */
/* @var Category $data*/
?>
<tr style="line-height: 24px;">
    <td class="align-left">
        <?php echo level_style($data->level-1,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');?><a href="<?php echo url('/category/view',array('id'=>$data->catid));?>"
           target="_blank"><?php echo $data->cat_name;?></a>
    </td>
    <td class="align-center">
        <?php echo $data->level;?>
    </td>
    <td class="align-center">
            <?php echo date('Y-m-d H:i:s',$data->created) ?>
    </td>
    <td class="align-center">
        <a href="<?php echo url('admin/category/update' ,array('id'=>$data->catid)) ?>">修改</a>
        <a href="<?php echo url('admin/category/delete' ,array('id'=>$data->catid)) ?>" onclick="return confirm('确认删除吗？');">删除</a>
    </td>
</tr>