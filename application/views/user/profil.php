<div class="row">
    <div class="col-xl-12 order-xl-6">
        <div class="card card-profile">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            <img src="../assets/img/default.png" class="rounded-circle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            </div>
            <div class="card-body pt-5">
                <div class="text-center">
                    <h5 class="h3">
                        <?= $user['nama']; ?><span class="font-weight-light">, <?= $user['role'] ?> </span>
                    </h5>
                    <div class="h5 font-weight-300">
                        <i class="ni ni-email-83 mr-2"></i><?= $user['email']; ?>
                    </div>
                    <?php if ($this->session->userdata('verif') == false) { ?>
                        <div class="alert alert-danger mt-5" role="alert">Akun anda belum aktif</div>
                    <?php } else { ?>
                        <div class="alert alert-success mt-5" role="alert">Akun anda sudah aktif</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>