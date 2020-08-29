<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <?= $this->session->flashdata('message'); ?>
        <div class="d-flex justify-content-between">
            <h3 class="mb-0"><?= $tittle; ?> table</h3>
            <a href="<?= base_url('unit/add') ?>">
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
                    <th scope="col">Unit</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="list">
                <?php $n = 1;
                foreach ((array)$unit as $key => $t) { ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $t['unit_name']; ?></td>
                        <td>
                            <a href="<?= base_url('unit/edit/') . $key ?>">
                                <div class="icon icon-shape icon-sm bg-gradient-orange text-white rounded-circle shadow" title="Edit">
                                    <i class="ni ni-palette"></i>
                                </div>
                            </a>
                            <a href="<?= base_url('unit/delete/') . $key ?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $t['unit_name']; ?>?');">
                                <div class="icon icon-shape icon-sm bg-gradient-red text-white rounded-circle shadow" title="Hapus">
                                    <i class="ni ni-fat-remove"></i>
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