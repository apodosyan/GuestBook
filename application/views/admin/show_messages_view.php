<h2> All Comments</h2>
<div class="table-responsive">
    <form id="search_messages" method="get">
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="5%">Id</th>
            <th width="10%">Full Name</th>
            <th width="10%">Email</th>
            <th width="40%">Comment message</th>
            <th width="10%" colspan="2">Creation Date</th>
            <th width="10%">Ip</th>
            <th width="15%">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="text" class="form-control" name="id"  value="<?=$this->input->get('id')?>"></td>
            <td><input type="text" class="form-control" name="name" value="<?=$this->input->get('name')?>"></td>
            <td><input type="text" class="form-control" name="email" value="<?=$this->input->get('email')?>"></td>
            <td><input type="text" class="form-control" name="message" value="<?=$this->input->get('message')?>"></td>
            <td><input type="text" class="form-control datepicker_input" name="added_from" value="<?=$this->input->get('added_from')?>"></td>
            <td><input type="text" class="form-control datepicker_input"  name="added_to" value="<?=$this->input->get('added_to')?>"></td>
            <td><input type="text" class="form-control "  name="ip" value="<?=$this->input->get('ip')?>"></td>
            <td>
                <input type="submit" class="btn btn-success" value="Search">
                <a href="<?=site_url('admin-1000/show_messages')?>" class="btn btn-default">Reset</a>
            </td>
        </tr>
        <?php if(isset($messages)):?>
            <?php foreach($messages as $message):?>
                <tr>
                    <td><?=$message['id']?></td>
                    <td><?=$message['name']?></td>
                    <td ><?=$message['email']?></td>
                    <td><?=$message['message']?></td>
                    <td colspan="2"><?=$message['added']?></td>
                    <td><?=$message['ip']?></td>
                    <td>
                        <a href="<?php echo site_url('admin-1000/edit_message/'.$message['id']);?>" title="Edit" class="glyphicon glyphicon-edit edit_button"></a>
                        <a href="<?=site_url('admin-1000/del_message/'. $message['id']);?>" class="glyphicon glyphicon-remove"  title="Delete" onclick="return confirm('Are you sure delete message?')"></a>
                    </td>
                </tr>
            <?php endforeach;?>

        <?php else:?>
            <tr>
                <td colspan="7" class="text-center"><b>No results</b></td>
            </tr>
        <?php endif?>
        </tbody>
    </table>
    </form>
</div>
<div class="page_pagination"> <?=$pagination?></div>

