<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="mb-0"><?= $tittle; ?> table</h3>
            <a href="<?= base_url('user/add') ?>">
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
                    <th scope="col">Project</th>
                    <th scope="col">Budget</th>
                    <th scope="col">Status</th>
                    <th scope="col">Users</th>
                    <th scope="col">Completion</th>
                </tr>
            </thead>
            <tbody class="list">
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Card footer -->
</div>