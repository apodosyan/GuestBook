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
        <input type="hidden" name="parent" value="0">
    </form>
</div>
<?php if(isset($messages)):?>
    <?php foreach ($messages as $message):?>
        <div class="row message-block">
            <div class="col-md-12">
                <div class="col-md-12"><h3><?php echo $message['name']?></h3> </div>
                <div class="col-md-12"><?php echo $message['message']?> </div>
                <div class="col-md-12"><h5> Added  <?php echo $message['added']?></h5> </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="button"  data-toggle="modal" data-target="#replyModal" data-parent="<?php echo $message['id']?>" class="btn btn-primary reply_button">Reply</button>
                    </div>
                </div>

            </div>
            <?php if(isset($reply_messages)):?>
                <?php foreach($reply_messages as $reply_message):?>
                    <?php if($reply_message['parent_id'] == $message['id']):?>
                        <div class="col-md-12 ">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10 message_reply_div ">
                                <div class="col-md-12"><h4><?php echo $reply_message['name']?></h4> </div>
                                <div class="col-md-12"><h7><?php echo $reply_message['message']?></h7> </div>
                                <div class="col-md-12"><h6> Added  <?php echo $reply_message['added']?></h6> </div>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
        </div>

    <?php endforeach;?>
<?php endif?>
<div class="page_pagination"> <?php echo $pagination?></div>




<div id="replyModal" class="modal fade" role="dialog">
    <form id="replyForm" method="post" class="form-horizontal" >
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reply</h4>
            </div>
            <div class="modal-body">
                <div class="row form-container ">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="<?php echo  set_value('name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" value="<?php echo  set_value('email')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Message</label>
                            <div class="col-md-8">
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
                        <input type="hidden" class="parent" name="parent">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Add message</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
    </form>
</div>