<?php echo form_open('user/add', array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
    <div class="col-md-8">
        <input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
        <span class="text-danger"><?php echo form_error('email'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password</label>
    <div class="col-md-8">
        <input type="text" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
        <span class="text-danger"><?php echo form_error('password'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="role" class="col-md-4 control-label"><span class="text-danger">*</span>Role</label>
    <div class="col-md-8">
        <input type="text" name="role" value="<?php echo $this->input->post('role'); ?>" class="form-control" id="role" />
        <span class="text-danger"><?php echo form_error('role'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="nama" class="col-md-4 control-label"><span class="text-danger">*</span>Nama </label>
    <div class="col-md-8">
        <input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
        <span class="text-danger"><?php echo form_error('nama'); ?></span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>

<?php echo form_close(); ?>