<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <?= $this->session->flashdata('message'); ?>
        <div class="d-flex justify-content-between">
            <h3 class="mb-0"><?= $tittle; ?> table</h3>
            <?php if ($tittle != 'Verifikasi User') : ?>
                <a href="<?= base_url('user/add') ?>">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow" title="Tambah">
                        <i class="ni ni-fat-add"></i>
                    </div>
                </a>
            <?php endif ?>
        </div>
    </div>
    <!-- Light table -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <!-- <table class="table align-items-center table-flush"> -->
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="list">
                <?php $n = 1;
                foreach ($users as $key => $t) { ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $t['nama']; ?></td>
                        <td><?= $t['email']; ?></td>
                        <td><?= $t['role'] ?></td>
                        <td><?= $t['verif'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                        <td>
                            <?php if ($tittle == 'Verifikasi User') { ?>
                                <a href="<?= base_url('user/verif/') . $key ?>">
                                    <div class="icon icon-shape icon-sm bg-gradient-green text-white rounded-circle shadow" title="Terima">
                                        <i class="ni ni-check-bold"></i>
                                    </div>
                                </a>
                                <a href="<?= base_url('user/verif/') . $key ?>">
                                    <div class="icon icon-shape icon-sm bg-gradient-red text-white rounded-circle shadow" title="Tolak">
                                        <i class="ni ni-fat-delete"></i>
                                    </div>
                                </a>
                            <?php } else { ?>
                                <a href="<?= base_url('user/edit/') . $key ?>">
                                    <div class="icon icon-shape icon-sm bg-gradient-orange text-white rounded-circle shadow" title="Edit">
                                        <i class="ni ni-palette"></i>
                                    </div>
                                </a>
                                <a href="<?= base_url('user/delete/') . $key ?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $t['nama']; ?>?');">
                                    <div class="icon icon-shape icon-sm bg-gradient-red text-white rounded-circle shadow" title="Hapus">
                                        <i class="ni ni-fat-remove"></i>
                                    </div>
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Card footer -->
</div>