<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-4-16
 * Time: 下午2:23
 * File: _listView.php
 * To change this template use File | Settings | File Templates.
 */
/* @var Navigation $data*/
?>
<tr style="line-height: 24px;">
    <td class="align-left">
        <a href="<?php echo url('/navigation/update',array('id'=>$data->navid));?>"
           target="_blank"><?php echo $data->nav_name;?></a>
    </td>
    <td class="align-center">
        <a href="<?php echo strstr($data->url_data,'http://')?:url($data->url_data);?>"
           target="_blank"><?php echo $data->url_data;?></a>
    </td>
    <td class="align-center">
        <a href="<?php echo url('admin/navigation/update' ,array('id'=>$data->navid)) ?>">修改</a>
        <a href="<?php echo url('admin/navigation/delete' ,array('id'=>$data->navid)) ?>" onclick="return confirm('确认删除吗？');">删除</a>
    </td>
</tr>