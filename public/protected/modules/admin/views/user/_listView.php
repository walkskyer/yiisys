<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-4-16
 * Time: 下午2:23
 * File: _listView.php
 * To change this template use File | Settings | File Templates.
 */
/* @var User $data*/
?>
<tr style="line-height: 24px;">
    <td class="align-left">
        <a href="<?php echo url('/user/view',array('id'=>$data->userid));?>"
           target="_blank"><?php echo $data->username;?></a>
    </td>
    <td class="align-center">
        <?php echo $data->email;?>
    </td>
    <td class="align-center">
            <?php echo date('Y-m-d H:i:s',$data->created) ?>
    </td>
    <td class="align-center">
        <a href="<?php echo url('admin/user/update' ,array('id'=>$data->userid)) ?>">修改</a>
        <a href="<?php echo url('admin/user/delete' ,array('id'=>$data->userid)) ?>" onclick="return confirm('确认删除吗？');">删除</a>
    </td>
</tr>