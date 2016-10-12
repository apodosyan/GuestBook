<?php if($this->session->flashdata('admin_updated')):?>
    <div class="alert alert-success fade in" style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Success!</strong> Admin updated!
    </div>
<?php endif?>

<h2> Administrators</h2>
<a href="<?=site_url('admin-1000/add_admin')?>" class=" btn btn-success" >Add New Administrator</a>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>User id</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Created date</th>
            <th>IP</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; if(isset($admins)):?>
            <?php foreach($admins as $admin):?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$admin['username']?></td>
                    <td><?=$admin['email']?></td>
                    <td><?=$admin['created_date']?></td>
                    <td><?=$admin['ip']?></td>
                    <td>
                        <a href="<?php echo site_url('admin-1000/edit_admin/'.$admin['id']);?>" title="Edit" class="glyphicon glyphicon-edit edit_button"></a>
                        <a href="<?=site_url('admin-1000/del_admin/'. $admin['id']);?>" class="glyphicon glyphicon-remove"  title="Delete" onclick="return confirm('Are you sure delete <?=$admin['username']?> admin')"></a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif?>
        </tbody>
    </table>
</div>
<div class="page_pagination"> <?=$pagination?></div>

