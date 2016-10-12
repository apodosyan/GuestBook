<?php if(isset($admin)):?>
<form id="contactForm" method="post" class="form-horizontal" >
    <div class="form-group">
        <div class="col-md-3"></div>
        <h3 class="col-md-6">Edit administrator</h3>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Login</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="login" value="<?=$admin['username']?>"  />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Email</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="email" value="<?=$admin['email']?>"  />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password"  />
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
        <div class="col-md-12 login_button">
            <button type="submit" class="btn btn-default">Save</button>
        </div>
    </div>
</form>
<?php endif;?>