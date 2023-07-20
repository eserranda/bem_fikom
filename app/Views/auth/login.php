<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Sign In')); ?>

    <?= $this->include('partials/head-css') ?>

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 border-1">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Log in Administrator BEM FIKOM</h5>
                                    <!-- <p class="text-muted">Silahkan login terlebih dahulu</p> -->
                                </div>
                                <div class="p-2 mt-4">
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <form action="<?= url_to('login') ?>" method="post">
                                        <?= csrf_field() ?>
                                        <?php if ($config->validFields === ['email']) : ?>
                                        <div class="mb-3">
                                            <label for="login"><?= lang('Auth.email') ?></label>
                                            <input type="email"
                                                class="form-control<?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                name="login" placeholder="<?= lang('Auth.email') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                        <?php else : ?>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email Atau Stambuk</label>
                                            <input type="text"
                                                class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                name="login" placeholder="Email atau Stambuk">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <div class="mb-3">
                                            <?php if ($config->activeResetter) : ?>
                                            <div class="float-end">
                                                <a href="<?= url_to('forgot') ?>"
                                                    class="text-muted"><?= lang('Auth.forgotYourPassword') ?></a>
                                            </div>
                                            <?php endif; ?>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password"
                                                    class="form-control pe-5 password-input  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                                    placeholder="<?= lang('Auth.password') ?>" id="password-input"
                                                    name="password">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i></button>

                                                <div class="invalid-feedback">
                                                    <?= session('errors.password') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($config->allowRemembering) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                <?php if (old('remember')) : ?> checked <?php endif ?>>
                                            <label class="form-check-label"
                                                for="auth-remember-check"><?= lang('Auth.rememberMe') ?></label>
                                        </div>
                                        <?php endif; ?>
                                        <div class="mt-4">
                                            <button class="btn btn-success w-100"
                                                type="submit"><?= lang('Auth.loginAction') ?></button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <?php if ($config->allowRegistration) : ?>
                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="<?= url_to('register') ?>"
                                    class="fw-bold text-primary text-decoration-underline ">
                                    Sign Up </a> </p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy; <script>
                                document.write(new Date().getFullYear())
                                </script> BEM FIKOM UKIP. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a
                                    href="https://www.instagram.com/aserranda/">EserRanda</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- particles js -->
    <script src="/assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="/assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="/assets/js/pages/password-addon.init.js"></script>
</body>

</html>