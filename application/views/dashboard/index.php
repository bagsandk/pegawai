<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <a href="<?= base_url('karyawan') ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">All Karyawan</h5>
                            <span class="h2 font-weight-bold mb-0"><?= $karyawan; ?></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-active-40"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <a href="<?= base_url('karyawan/order/karpim-tetap') ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Karpim-Tetap</h5>
                            <span class="h2 font-weight-bold mb-0"><?= $karpim; ?></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <a href="<?= base_url('karyawan/order/karpel-tetap') ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Karpel-Tetap</h5>
                            <span class="h2 font-weight-bold mb-0"><?= $karpel; ?></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <a href="<?= base_url('karyawan/order/tidak-tetap') ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Tidak-Tetap</h5>
                            <span class="h2 font-weight-bold mb-0"><?= $tt; ?></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                <i class="ni ni-chart-bar-32"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-transparent">
        <h3 class="mb-0">Karyawan berdasarkan strata</h3>
    </div>
    <div class="card-body">
        <div class="row icon-examples">
            <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('karyawan/order/juru') ?>">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Juru</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $juru; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-paper-diploma"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('karyawan/order/pelaksana') ?>">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Pelaksana</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $pelaksana; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                    <i class="ni ni-key-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('karyawan/order/pembina') ?>">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Pembina</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $pembina; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-satisfied"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('karyawan/order/penata') ?>">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Penata</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $penata; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
                                    <i class="ni ni-ruler-pencil"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('karyawan/order/pengatur') ?>">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Pengatur</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $pengatur; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-user-run"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('karyawan/order/pm') ?>">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Penyelia Madya</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $pm; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-vector"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('karyawan/order/pp') ?>">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Penyelia Pratama</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $pp; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                    <i class="ni ni-umbrella-13"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('karyawan/') ?>">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Semua</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $karyawan; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>