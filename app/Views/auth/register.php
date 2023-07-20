<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Sign Up')); ?>
    <!-- Select2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <?= $this->include('partials/head-css') ?>

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Sign Up</h5>
                                    <!-- <p class="text-muted">Silahkan isi from dibawah</p> -->
                                </div>



                                <div class="p-1 mt-4">
                                    <form action="<?= url_to('register') ?>" method="post">
                                        <?= view('Myth\Auth\Views\_message_block') ?>

                                        <div class="mb-3">
                                            <label for="username" class="form-label">NIM/Stambuk<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="username" name="username"></select>
                                            <div class=" invalid-feedback">
                                                Masukkan Stambuk
                                            </div>
                                        </div>


                                        <div class="mb-3">
                                            <label for="fullname" class="form-label">Nama Lengkap<span
                                                    class="text-danger">*</span></label>

                                            <input type="text" name="fullname"
                                                class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>"
                                                id="fullname" placeholder="Nama Lengkap" readonly>

                                            <div class="invalid-feedback">
                                                Masukkan nama lengkap
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label"><?= lang('Auth.email') ?> <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" name="email"
                                                class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                                id="useremail" placeholder="<?= lang('Auth.email') ?>" ">
                                            <div class=" invalid-feedback">
                                            Masukkan email
                                        </div>
                                </div>



                                <div class="mb-3">
                                    <label class="form-label" for="password"><?= lang('Auth.password') ?><span
                                            class="text-danger">*</span></label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" name="password" id="password"
                                            class="form-control pe-5 password-input  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                            placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon"><i
                                                class="ri-eye-fill align-middle"></i></button>
                                        <div class="invalid-feedback">
                                            Masukkan password
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="pass_confirm"><?= lang('Auth.repeatPassword') ?><span
                                            class="text-danger">*</span></label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" id="password" name="pass_confirm"
                                            class="form-control pe-5 password-input <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                            placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon"><i
                                                class="ri-eye-fill align-middle"></i></button>
                                        <div class="invalid-feedback">
                                            Ulangi password
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100"
                                            type="submit"><?= lang('Auth.register') ?></button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0"><?= lang('Auth.alreadyRegistered') ?> <a href=" <?= url_to('login') ?>"
                                class="fw-semibold text-primary text-decoration-underline"><?= lang('Auth.signIn') ?>
                            </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->

        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                document.write(new Date().getFullYear())
                                </script> BEM FIKOM UKIP. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                <a href="https://www.instagram.com/aserranda/">EserRanda</a>
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
    <script src="<?= base_url(); ?>/assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?= base_url(); ?>/assets/js/pages/particles.app.js"></script>
    <!-- validation init -->
    <script src="<?= base_url(); ?>/assets/js/pages/form-validation.init.js"></script>
    <!-- password create init -->
    <script src="<?= base_url(); ?>/assets/js/pages/passowrd-create.init.js"></script>
    <!-- Select2 -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="<?= base_url(); ?>/assets/js/registerSelect2.min.js"></script>

    <script>
    $('#username').select2({
        minimumInputLength: 12,
        placeholder: 'Masukkan Stambuk',
        ajax: {
            dataType: 'json',
            url: "<?= base_url('/users/ajaxSearch'); ?>",
            delay: 500,
            data: function(params) {
                return {
                    search: params.term
                }
            },
            processResults: function(data, page) {
                return {
                    results: data
                }
            }
        }
    });

    $('#username').change(function(e) {
        // e.preventDefault();
        $.ajax({
            type: 'post',
            url: '<?= base_url('/users/getName'); ?>',
            data: {
                username: $(this).val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.data) {
                    $('#fullname').val(response.data);

                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })

    });
    </script>

</body>

</html>