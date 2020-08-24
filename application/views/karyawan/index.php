<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <?= $this->session->flashdata('message'); ?>
        <div class="d-flex justify-content-between">
            <h3 class="mb-0"><?= $tittle; ?> table</h3>
            <a href="<?= base_url('karyawan/add') ?>">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow" title="Tambah">
                    <i class="ni ni-fat-add"></i>
                </div>
            </a>
        </div>
    </div>
    <!-- Light table -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <!-- <table class="table align-items-center table-flush"> -->
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Strata</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Position</th>
                    <th scope="col">Group</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="list">
                <?php $n = 1;
                foreach ($karyawan as $key => $t) { ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $t['Personnel_Number']; ?></td>
                        <td><?= $t['Gender_Key']; ?></td>
                        <td><?= date('d-M-y', strtotime($t['Birth_date'])) ?></td>
                        <td><?= $t['Strata'] ?></td>
                        <td><?= $t['Organizational_Unit'] ?></td>
                        <td><?= $t['Position'] ?></td>
                        <td><?= $t['Employee_Group'] ?></td>
                        <td><?= $t['Lv'] ?></td>
                        <td>
                            <a href="<?= base_url('karyawan/edit/') . $key ?>">
                                <div class="icon icon-shape icon-sm bg-gradient-orange text-white rounded-circle shadow" title="Edit">
                                    <i class="ni ni-palette"></i>
                                </div>
                            </a>
                            <a href="<?= base_url('karyawan/delete/') . $key ?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $t['Personnel_Number']; ?>?');">
                                <div class="icon icon-shape icon-sm bg-gradient-red text-white rounded-circle shadow" title="Hapus">
                                    <i class="ni ni-fat-remove"></i>
                                </div>
                            </a>
                            <a href="<?= base_url('karyawan/cetak/') . $key ?>">
                                <div class="icon icon-shape icon-sm bg-gradient-purple text-white rounded-circle shadow" title="Hapus">
                                    <i class="ni ni-cloud-download-95"></i>
                                </div>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Card footer -->
</div>