<?php if(isset($message)):?>
<div class="row form-container">
    <form id="contactForm" method="post" class="form-horizontal" >
        <div class="form-group">
            <label class="col-md-3 control-label">Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="<?=$message['name']?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Email</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="email" value="<?=$message['email']?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Message</label>
            <div class="col-md-6">
                <textarea  class="form-control" minlength="6" name="message" rows="4" cols="50"><?=$message['message']?></textarea>
            </div>
        </div>
        <!-- #messages is where the messages are placed inside -->
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <div id="messages"></div>
                <div class=error><?=validation_errors()?></div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-default">Add message</button>
            </div>
        </div>
    </form>
</div>
<?php endif;?>