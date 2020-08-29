<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <?= $this->session->flashdata('message'); ?>
        <h3 class="mb-0"><?= $tittle; ?></h3>
    </div>
    <div class="card-body px-lg-5 py-lg-5">
        <?php echo form_open('strata/edit/' . $id, array("role" => "form")); ?>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                </div>
                <input class="form-control" placeholder="Name" type="text" name="strata_name" value="<?php echo ($this->input->post('strata_name') ? $this->input->post('strata_name') : $data['strata_name']); ?>">
                <span class="text-danger"><?php echo form_error('strata_name'); ?></span>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>