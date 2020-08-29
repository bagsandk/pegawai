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
                            <input class="form-control" placeholder="pers_no" type="text" name="pers_no" value="<?php echo $this->input->post('pers_no'); ?>">
                            <span class="text-danger"><?php echo form_error('pers_no'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                            </div>
                            <input class="form-control" placeholder="Name" type="text" name="name" value="<?php echo $this->input->post('name'); ?>">
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
                                    $selected = ($p['position_name'] == $this->input->post('position')) ? ' selected="selected"' : "";

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
                                    $selected = ($p['unit_name'] == $this->input->post('unit')) ? ' selected="selected"' : "";

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
                                $pers_area = array('Kebun PTPN VII',);
                                foreach ($pers_area as $p) {
                                    $selected = ($p == $this->input->post('pers_area')) ? ' selected="selected"' : "";
                                    echo '<option value="' . $p . '" ' . $selected . '>' . $p . '</option>';
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
                                $pers_subarea = array('Kedaton',);
                                foreach ($pers_subarea as $p) {
                                    $selected = ($p == $this->input->post('pers_subarea')) ? ' selected="selected"' : "";
                                    echo '<option value="' . $p . '" ' . $selected . '>' . $p . '</option>';
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
                                $ps_group = ["0HON", "0PKWT", "IA", "IB", "IC", "ID", "IIA", "IIB", "IIC", "IID", "IIIA", "IIIB", "IIID", "IVB"];
                                foreach ($ps_group as $p) {
                                    $selected = ($p == $this->input->post('ps_group')) ? ' selected="selected"' : "";
                                    echo '<option value="' . $p . '" ' . $selected . '>' . $p . '</option>';
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
                                    $selected = (sprintf("%02d", $n) == $this->input->post('lv')) ? ' selected="selected"' : "";
                                    echo '<option value="' . sprintf("%02d", $n) . '"' . $selected . '>' . sprintf("%02d", $n) . '</option>';
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
                                    $selected = ($p['strata_name'] == $this->input->post('strata')) ? ' selected="selected"' : "";

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
                                $emp_group = array('Karpim - Tetap', 'Karpel - Tetap', 'Tidak - Tetap',);
                                foreach ($emp_group as $p) {
                                    $selected = ($p == $this->input->post('emp_group')) ? ' selected="selected"' : "";
                                    echo '<option value="' . $p . '"' . $selected . '>' . $p . '</option>';
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
                                foreach ($education as $p) {
                                    $selected = ($p['education_name'] == $this->input->post('education')) ? ' selected="selected"' : "";
                                    echo '<option value="' . $p['education_name'] . '" ' . $selected . '>' . $p['education_name'] . '</option>';
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
                                    $selected = ($value == $this->input->post('gender')) ? ' selected="selected"' : "";
                                    echo '<option value="' . $value . '"' . $selected . '>' . $display_text . '</option>';
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
                            <input class="form-control" placeholder="DD" type="text" name="dd" value="<?php echo $this->input->post('dd'); ?>">
                            <span class="text-danger"><?php echo form_error('dd'); ?></span>
                            <input class="form-control" placeholder="MM" type="text" name="mm" value="<?php echo $this->input->post('mm'); ?>">
                            <span class="text-danger"><?php echo form_error('mm'); ?></span>
                            <input class="form-control" placeholder="YYYY" type="text" name="yyyy" value="<?php echo $this->input->post('yyyy'); ?>">
                            <span class="text-danger"><?php echo form_error('yyyy'); ?></span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4">Create account</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>