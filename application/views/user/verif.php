<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <h3 class="mb-0"><?= $tittle; ?> table</h3>
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
                        <td>
                            <a href="<?= base_url('user/edit/') . $key ?>"> edit</a>
                            <a href="<?= base_url('user/edit/') . $key ?>"> delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Card footer -->
</div>