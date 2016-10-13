<?php if($this->session->flashdata('message_added')):?>
    <div class="alert alert-success fade in" style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Success!</strong> Your message was added!
    </div>
<?php endif?>
<div class="row form-container">
    <form id="contactForm" method="post" class="form-horizontal" >
        <div class="form-group">
            <label class="col-md-3 control-label">Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="<?php echo  set_value('name')?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Email</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="email" value="<?php echo  set_value('email')?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Message</label>
            <div class="col-md-6">
                <textarea  class="form-control" minlength="6" name="message" rows="4" cols="50"><?php echo  set_value('message')?></textarea>
            </div>
        </div>
        <!-- #messages is where the messages are placed inside -->
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <div id="messages"></div>
                <div class=error><?php echo validation_errors()?></div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-default">Add message</button>
            </div>
        </div>
    </form>
</div>

<?php if(isset($messages)):?>
    <?php foreach ($messages as $message):?>
        <div class="row message-block">
            <div class="col-md-12">
                <div class="col-md-12"><h3><?php echo $message['name']?></h3> </div>
                <div class="col-md-12"><?php echo $message['message']?> </div>
                <div class="col-md-12"><h5> Added  <?php echo $message['added']?></h5> </div>
            </div>
        </div>

    <?php endforeach;?>
<?php endif?>
<div class="page_pagination"> <?php echo $pagination?></div>


