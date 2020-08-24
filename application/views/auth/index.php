<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <?= $this->session->flashdata('message'); ?>
                        <small>Or sign in with credentials</small>
                    </div>
                    <?php echo form_open('auth/', array("role" => "form")); ?>
                    <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input class="form-control" placeholder="Email" type="email" name="email" />
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" placeholder="Password" type="password" name="password" />
                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">
                            Sign in
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <!-- <div class="row mt-3">
                        <div class="col-6">
                            <a href="#" class="text-light"><small>Forgot password?</small></a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#" class="text-light"><small>Create new account</small></a>
                        </div>
                    </div> -->
        </div>
    </div>
</div>