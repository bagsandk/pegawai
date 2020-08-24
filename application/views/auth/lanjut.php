<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <?= $this->session->flashdata('message'); ?>
                        <small>Input your data</small>
                    </div>
                    <?php echo form_open('auth/registerlanjut', array("role" => "form")); ?>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-atom"></i></span>
                            </div>
                            <input class="form-control" placeholder="pers_no" type="text" name="pers_no">
                            <span class="text-danger"><?php echo form_error('pers_no'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                            </div>
                            <input class="form-control" placeholder="Name" type="text" name="name">
                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-square-pin"></i></span>
                            </div>
                            <select name="position" class="form-control">
                                <option value="">Position</option>
                                <?php
                                foreach ($position as $p) {
                                    $selected = ($p['position_name'] == $this->input->post('position_name')) ? ' selected="selected"' : "";

                                    echo '<option value="' . $p['position_name'] . '" ' . $selected . '>' . $p['position_name'] . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('position'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-support-16"></i></span>
                            </div>
                            <select name="unit" class="form-control">
                                <option value="">Organizational unit</option>
                                <?php
                                foreach ($unit as $p) {
                                    $selected = ($p['unit_name'] == $this->input->post('unit_name')) ? ' selected="selected"' : "";

                                    echo '<option value="' . $p['unit_name'] . '" ' . $selected . '>' . $p['unit_name'] . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('unit'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-world"></i></span>
                            </div>
                            <select name="pers_area" class="form-control">
                                <option value="">Personnal Area</option>
                                <?php
                                $pers_area = array(
                                    'Kebun PTPN VII' => 'Kebun PTPN VII',
                                );
                                foreach ($pers_area as $value => $display_text) {
                                    echo '<option value="' . $value . '">' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('pers_area'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                            </div>
                            <select name="pers_subarea" class="form-control">
                                <option value="">Personnal Subarea</option>
                                <?php
                                $pers_subarea = array(
                                    'Kedaton' => 'Kedaton',
                                );
                                foreach ($pers_subarea as $value => $display_text) {
                                    echo '<option value="' . $value . '">' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('pers_subarea'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                            </div>
                            <select name="ps_group" class="form-control">
                                <option value="">Personnel Group</option>
                                <?php
                                foreach ($ps_group as $p) {
                                    $selected = ($p['ps_group_name'] == $this->input->post('ps_group_name')) ? ' selected="selected"' : "";

                                    echo '<option value="' . $p['ps_group_name'] . '" ' . $selected . '>' . $p['ps_group_name'] . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('ps_group'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-ui-04"></i></span>
                            </div>
                            <select name="lv" class="form-control">
                                <option value="">Level</option>
                                <?php
                                for ($n = 0; $n < 15; $n++) {
                                    echo '<option value="' . sprintf("%02d", $n) . '">' . sprintf("%02d", $n) . '</option>';
                                }
                                ?>

                            </select>
                            <span class="text-danger"><?php echo form_error('lv'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-trophy"></i></span>
                            </div>
                            <select name="strata" class="form-control">
                                <option value="">Strata</option>
                                <?php
                                foreach ($strata as $p) {
                                    $selected = ($p['strata_name'] == $this->input->post('strata_name')) ? ' selected="selected"' : "";

                                    echo '<option value="' . $p['strata_name'] . '" ' . $selected . '>' . $p['strata_name'] . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('strata'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-tag"></i></span>
                            </div>
                            <select name="emp_group" class="form-control">
                                <option value="">Employee Group</option>
                                <?php
                                $emp_group = array(
                                    'Karpim - Tetap' => 'Karpim - Tetap',
                                    'Karpel - Tetap' => 'Karpel - Tetap',
                                    'Tidak - Tetap' => 'Tidak - Tetap',
                                );
                                foreach ($emp_group as $value => $display_text) {
                                    echo '<option value="' . $value . '">' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('emp_group'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                            </div>
                            <select name="education" class="form-control">
                                <option value="">Education</option>
                                <?php
                                $education = array(
                                    'SD' => 'SD',
                                    'SLTP' => 'SLTP',
                                    'SLTA' => 'SLTA',
                                    'D3' => 'D3',
                                    'S1' => 'S1',
                                    'S2' => 'S2',
                                    'S3' => 'S3',
                                );
                                foreach ($education as $value => $display_text) {
                                    echo '<option value="' . $value . '">' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('education'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-tie-bow"></i></span>
                            </div>
                            <select name="gender" class="form-control">
                                <option value="">Gender</option>
                                <?php
                                $gender = array(
                                    'Male' => 'Laki-laki',
                                    'Female' => 'Perempuan',
                                );
                                foreach ($gender as $value => $display_text) {
                                    echo '<option value="' . $value . '">' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('gender'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control" placeholder="DD" type="text" name="dd">
                            <input class="form-control" placeholder="MM" type="text" name="mm">
                            <input class="form-control" placeholder="YYYY" type="text" name="yyyy">
                            <span class="text-danger"><?php echo form_error('birth_date'); ?></span>
                        </div>
                    </div>

                    <!-- <div class="row my-4">
                            <div class="col-12">
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                    <label class="custom-control-label" for="customCheckRegister">
                                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                                    </label>
                                </div>
                            </div>
                        </div> -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4">Create account</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>