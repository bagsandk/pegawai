<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <?= $this->session->flashdata('message'); ?>
        <h3 class="mb-0"><?= $tittle; ?></h3>
    </div>
    <div class="card-body px-lg-5 py-lg-5">
        <?php echo form_open('position/add', array("role" => "form")); ?>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                </div>
                <input class="form-control" placeholder="Name" type="text" name="position_name" value="<?php echo $this->input->post('position_name'); ?>">
                <span class="text-danger"><?php echo form_error('position_name'); ?></span>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-4">Add</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>