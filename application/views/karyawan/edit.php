<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <h3 class="mb-0"><?= $tittle; ?> table</h3>
    </div>
    <div class="card bg-secondary border-0">
        <div class="card-body px-lg-5 py-lg-5">
            <?php
            echo form_open('karyawan/edit/' . $uid, array("role" => "form")); ?>
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-atom"></i></span>
                    </div>
                    <input class="form-control" placeholder="pers_no" type="text" name="pers_no" value="<?php echo ($this->input->post('pers_no') ? $this->input->post('pers_no') : $karyawan['Pers_No']); ?>">
                    <span class="text-danger"><?php echo form_error('pers_no'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" placeholder="Name" type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $karyawan['Personnel_Number']); ?>">
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
                            $selected = $p['position_name'] == $this->input->post('position_name') ? ' selected="selected"' : ($p['position_name'] == $karyawan['Position'] ? ' selected="selected"' : "");
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
                            $selected = ($p['unit_name'] == $this->input->post('unit_name')) ? ' selected="selected"' : ($p['unit_name'] == $karyawan['Organizational_Unit'] ? ' selected="selected"' : "");
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
                            $selected = ($value == $karyawan['Personnel_Area']) ? ' selected="selected"' : "";
                            echo '<option value="' . $value . '"' . $selected . '>' . $display_text . '</option>';
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
                            $selected = ($value == $karyawan['Personnel_Subarea']) ? ' selected="selected"' : "";
                            echo '<option value="' . $value . '"' . $selected . '>' . $display_text . '</option>';
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
                            $selected = ($p['ps_group_name'] == $this->input->post('ps_group_name')) ? ' selected="selected"' : ($p['ps_group_name'] == $karyawan['PS_group'] ? ' selected="selected"' : "");
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
                            $selected = (sprintf("%02d", $n) == $karyawan['Lv']) ? ' selected="selected"' : "";
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
                            $selected = ($p['strata_name'] == $this->input->post('strata_name')) ? ' selected="selected"' : ($p['strata_name'] == $karyawan['Strata'] ? ' selected="selected"' : "");
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
                            $selected = ($value == $karyawan['Employee_Group']) ? ' selected="selected"' : "";
                            echo '<option value="' . $value . '"' . $selected . '>' . $display_text . '</option>';
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
                            $selected = ($value == $karyawan['Education']) ? ' selected="selected"' : "";
                            echo '<option value="' . $value . '"' . $selected . '>' . $display_text . '</option>';
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
                            $selected = ($value == $karyawan['Gender_Key']) ? ' selected="selected"' : "";
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
                    <?php $bd = strtotime($karyawan['Birth_date']) ?>
                    <input class="form-control" placeholder="DD" type="text" name="dd" maxlength="2" value="<?php echo ($this->input->post('dd') ? $this->input->post('dd') : date('d', $bd)); ?>">
                    <input class="form-control" placeholder="MM" type="text" name="mm" maxlength="2" value="<?php echo ($this->input->post('mm') ? $this->input->post('mm') : date('m', $bd)); ?>">
                    <input class="form-control" placeholder="YYYY" type="text" name="yyyy" maxlength="4" value="<?php echo ($this->input->post('yyyy') ? $this->input->post('yyyy') : date('y', $bd)); ?>">
                    <span class="text-danger"><?php echo form_error('birth_date'); ?></span>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Edit Karyawan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>