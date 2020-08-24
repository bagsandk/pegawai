<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <h3 class="mb-0"><?= $tittle; ?></h3>
    </div>
    <div class="card-body px-lg-5 py-lg-5">
        <?php echo form_open('user/add', array("role" => "form")); ?>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                </div>
                <input class="form-control" placeholder="Name" type="text" name="name" value="<?php echo $this->input->post('name'); ?>">
                <span class="text-danger"><?php echo form_error('name'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" placeholder="Email" type="email" name="email" value="<?php echo $this->input->post('email'); ?>">
                <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                </div>
                <input class="form-control" placeholder="Phone Number" type="text" name="phone" value="<?php echo $this->input->post('phone'); ?>">
                <span class="text-danger"><?php echo form_error('phone'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Password" type="password" name="password">
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-badge"></i></span>
                </div>
                <select name="role" class="form-control">
                    <option value="">Role</option>
                    <?php
                    $role = array(
                        'admin' => 'Admin',
                        'user' => 'User',
                    );
                    foreach ($role as $value => $display_text) {
                        $selected = ($value == $this->input->post('role')) ? ' selected="selected"' : "";
                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('role'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-button-play"></i></span>
                </div>
                <select name="verif" class="form-control">
                    <option value="">Verifikasi</option>
                    <?php $verif = array(
                        0 => 'Tidak Aktif',
                        1 => 'Aktif',
                        2 => 'Untuk Karyawan',
                    );
                    foreach ($verif as $value => $display_text) {
                        $selected = ($value == $this->input->post('verif')) ? ' selected="selected"' : "";
                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('verif'); ?></span>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-4">Create account</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>