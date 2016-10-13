<?php if($this->session->flashdata('wrong_login')):?>
    <div class="alert alert-danger fade in" style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Danger!</strong> Wrong login or password
    </div>
<?php endif?>
<div class="row form-container">
    <form id="contactForm" method="post" class="form-horizontal" >
        <div class="form-group">
            <div class="col-md-3"></div>
              <h3 class="col-md-6">Login in admin section</h3>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Login</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="login"  />
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
                <div class=error><?php echo validation_errors()?></div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 login_button">
                <button type="submit" class="btn btn-default">Login</button>
            </div>
        </div>
    </form>
</div>