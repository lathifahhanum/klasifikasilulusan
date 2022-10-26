<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-4.3.1/fontawesome-free-5.15.2-web/css/all.min.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>

<body>


    </div>
    <div class="card text-left p-4">
        <div class="card-body">
            <h4 class="card-title text-primary">SISTEM KLASIFIKASI PROFIL LULUSAN</h4>
            <h5 class="card-title text-primary">ACCOUNT LOGIN</h5>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="my-4">
                <form method="post" action="<?= base_url(); ?>/login/process">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-secondary labels text-uppercase" for="username">Username</label>
                        <input type="text" name="username" id="text" autocomplete="off" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label class="text-secondary labels text-uppercase" for="password">password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" autocomplete="off" class="form-control password" placeholder="" aria-describedby="helpId">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <div class="" id="toggle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-8">
                            <a href="<?= base_url('register/index') ?>">Belum punya akun? Register</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-4">Log IN</button>
                </form>
            </div>
        </div>
    </div>

    <script src="/bootstrap-4.3.1/js/jquery-3.3.1.slim.min.js"></script>
    <script src="/bootstrap-4.3.1/js/popper.min.js"></script>
    <script src="/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="/bootstrap-4.3.1/fontawesome-free-5.15.2-web/js/all.min.js"></script>
    <script src="/assets/script.js"></script>
</body>

</html>