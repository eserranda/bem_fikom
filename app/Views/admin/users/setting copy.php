<?= $this->extend('admin/index'); ?>

<?= $this->section('head_title'); ?>

<?php echo view('partials/title-meta', array('title' => 'Edit Profile')); ?>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>
<div class="row mb-1">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="card-title mb-0 text-danger">Penting :</h6>
                    </div>
                    <div class="flex-shrink-0">
                        <ul class="list-inline card-toolbar-menu d-flex align-items-center mb-0">
                            <li class="list-inline-item">
                                <a class="align-middle minimize-card" data-bs-toggle="collapse" href="#collapseexample1"
                                    role="button" aria-expanded="false" aria-controls="collapseExample2">
                                    <i class="mdi mdi-plus align-middle plus"></i>
                                    <i class="mdi mdi-minus align-middle minus"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body collapse show" id="collapseexample1">
                <div class="col-xxl-4 col-lg-6">
                    <div class="card">
                        <img class="card-img img-fluid" src="<?= base_url(); ?>/assets/images/rulesfoto.jpg"
                            alt="rules-images">
                    </div>
                </div>

                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <i class="ri-checkbox-circle-fill text-danger"></i>
                    </div>
                    <div class="flex-grow-1 ms-2 text-danger">
                        Foto akan ditinjau oleh badan Pengurus, Foto yang tidak sesuai dengan
                        ketentuan di atas akan dihapus dan divalidasi ulang!
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-xxl-3">

        <div class="card mt-n3">
            <div class="card-body p-4">
                <div class="text-center">

                    <div class="profile-user position-relative d-inline-block mx-auto mb-2">
                        <img src="<?= base_url(); ?>/<?= user()->user_image; ?>?<?= user()->updated_at; ?>"
                            class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit tekan" name="your_id" id="tekan">
                            <?= form_open_multipart('', ['class' => 'formupload']) ?>
                            <?= csrf_field(); ?>
                            <input type="hidden" class="form-control" name="user_image" value="<?= user()->id; ?>">
                            <input type="hidden" class="form-control" name="username" value="<?= user()->username; ?>">
                            <input type="file" id="profile-img-file-input" name="foto" class="profile-img-file-input ">

                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-0 tblgantifoto" id="tes" style="display: none;">
                        <button type="submit" class="btn btn-info btn-sm m-1 btnupload">Upload
                        </button>
                        <?= form_close() ?>
                        <button class="btn btn-danger btn-sm btnbatal">Batal</button>
                    </div>
                    <div class="invalid-feedback errorfoto">

                    </div>
                </div>

            </div>
        </div>



        <!--end card-->


        <!--end card-->
        <div class="col-xxl-9">
            <?= form_open('users/update_users', ['class' => 'formupdate']) ?>
            <?= csrf_field(); ?>
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Edit Biodata
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="firstnameInput" class="form-label">Nama Lengkap</label>
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        placeholder="Enter your firstname" value="<?= user()->id; ?>">
                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                        placeholder="Enter your firstname" value="<?= user()->fullname; ?>">
                                    <div class="invalid-feedback errorfullname">

                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="lastnameInput" class="form-label">Nama Panggilan</label>
                                    <input type="text" class="form-control" id="nickname" name="nickname"
                                        placeholder="Nama panggilan sehari-hari" value="<?= user()->nickname; ?>">
                                    <div class="invalid-feedback errornickname">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="stambuk" class="form-label">Stambuk <sup class="text-danger">*Hubungi
                                            pengurus untuk mengganti
                                            stambuk</sup></label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="<?= user()->username; ?>" readonly disabled>
                                    <div class="invalid-feedback errorusername">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="stambuk" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        value="<?= user()->tempat_lahir; ?>" placeholder="Tempat Lahir">
                                    <div class="invalid-feedback errortempat_lahir">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="stambuk" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="<?= user()->tanggal_lahir; ?>">
                                    <div class="invalid-feedback errortanggal_lahir">

                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="task-title-input" class="form-label">Gender</label>
                                    <div class="mb-2 col-lg-12">
                                        <select class="form-select" id="gender" name="gender">
                                            <option value="">Pilih Gender</option>
                                            <option value="Laki-laki"
                                                <?php if (user()->gender == 'Laki-laki') echo "selected"; ?>>Laki-laki
                                            </option>
                                            <option value="Perempuan"
                                                <?php if (user()->gender == 'Perempuan') echo "selected"; ?>>Perempuan
                                            </option>
                                        </select>
                                        <div class="invalid-feedback errorgender">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="nomor_hp" class="form-label">Nomor HP/Whatsapp</label>
                                    <input type="text" class="form-control phone" id="phone_number" name="phone_number"
                                        value="<?= user()->phone_number; ?>" placeholder="0811-1234-2233-7xxx">
                                    <div class="invalid-feedback errorphone_number">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="nama_angkatan" class="form-label">Nama Angkatan</label>
                                    <input type="text" class="form-control" id="nama_angkatan" name="nama_angkatan"
                                        value="<?= user()->nama_angkatan; ?>" placeholder="Nama Angkatan">
                                    <div class="invalid-feedback errornama_angkatan">

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tahun_masuk" class="form-label">Tahun Masuk <sup
                                            class="text-danger"></label>
                                    <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk"
                                        value="<?= user()->tahun_masuk; ?>" placeholder="Tahun Masuk">
                                    <div class="invalid-feedback errortahun_masuk">

                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="emailInput" class="form-label">Email <sup class="text-danger">*Email
                                            digunakan untuk login</sup>
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email" value="<?= user()->email; ?>">
                                    <div class="invalid-feedback erroremail">

                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat <sup class="text-danger">*Isi
                                            alamat dengan lengkap ( Jalan/lorong?, Nama
                                            kost/pondokan, Nomor )</sup></label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Alamat Lengkap" value="<?= user()->address; ?>"
                                        placeholder="Alamat">
                                    <div class="invalid-feedback erroraddress">

                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="mb-3 pb-2">
                                    <label for="exampleFormControlTextarea" class="form-label">Quote</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea"
                                        placeholder="Quote penyemangat kamu" rows="3"
                                        name="quote"><?= user()->quote; ?></textarea>

                                </div>
                            </div>
                            <!--end col-->

                            <!--end col-->
                            <!-- <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-start m-4">
                                        <button type="submit" class="btn btn-primary">Updates</button>
                                        <button type="button" class="btn btn-soft-secondary">Cancel</button>
                                    </div>
                                    
                                </div> -->
                        </div>


                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Social Media</h5>
                        </div>

                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-dark text-dark">
                                <i class="bx bxl-tiktok"></i>
                            </span>
                        </div>
                        <input type="test" class="form-control" id="tiktok" name="tiktok" placeholder="@Username"
                            value="<?= user()->tiktok; ?>">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-primary text-primary">
                                <i class="ri-facebook-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="facebook" name="facebook"
                            placeholder="Url Profil Facebook" value="<?= user()->facebook; ?>">
                    </div>

                    <div class="d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-danger text-danger">
                                <i class="ri-instagram-line"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="username"
                            value="<?= user()->instagram; ?>">

                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="hstack gap-2 justify-content-start m-4">

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="profile">
                            <button type="button" class="btn btn-soft-success">Back</button></a>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="<?= base_url(); ?>/assets/js/pages/profile-setting.init.js"></script>
<script>
$(document).ready(function() {
    $('.btnupload').click(function(e) {
        e.preventDefault();

        let form = $('.formupload')[0];

        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= base_url('/users/doupload') ?>",
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",

            beforeSend: function() {
                $('.btnupload').addClass('disabled');
                $('.btnbatal').addClass('disabled');
                $('.btnupload').html(
                    '<i class="spinner-border spinner-border-sm text-secondary" role="status"></i>'
                );
            },
            complete: function() {
                $('.btnupload').removeClass('disabled');
                $('.btnbatal').removeClass('disabled');
                $('.btnupload').html('Upload');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.foto) {
                        $('#profile-img-file-input').addClass('is-invalid');
                        $('.errorfoto').html(response.error.foto);
                    }
                } else {
                    Swal.fire({
                        html: '<div class="mt-3">' +
                            ' <lord-icon src="https://cdn.lordicon.com/pithnlch.json" trigger="loop" colors="primary:#25a0e2,secondary:#00bd9d" style="width:120px;height:120px"></lord-icon>' +
                            '<div class="mt-1 pt-2 fs-15 mx-5">' +
                            '<h4>Upload foto berhasil</h4>' +
                            '<p class="text-muted mx-4 mb-0">What are you feeling?</p>' +
                            '</div>' +
                            '</div>',
                        showDenyButton: true,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-success w-xs me-2 mb-1',
                        denyButtonClass: 'btn btn-primary w-xs mb-1',
                        confirmButtonText: 'Im very cute',
                        denyButtonText: 'b aja..',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                html: '<div class="mt-3">' +
                                    '<lord-icon src="https://cdn.lordicon.com/vixtkkbk.json" trigger="loop" style="width:120px;height:120px"></lord-icon>' +
                                    '<div class="mt-1 pt-2 fs-15 mx-5">' +
                                    '<h4>Yeahh.. Im very cutee</h4>' +
                                    '</div>' +
                                    '</div>',
                                buttonsStyling: false,
                                confirmButtonClass: 'btn btn-success w-xs me-2 mb-1',
                                confirmButtonText: 'Thank you!',
                            })
                        } else if (result.isDenied) {
                            Swal.fire({

                                html: '<div class="mt-3">' +
                                    '<lord-icon src="https://cdn.lordicon.com/hrqwmuhr.json" trigger="loop" style="width:120px;height:120px"></lord-icon>' +
                                    '<div class="mt-1 pt-2 fs-15 mx-5">' +
                                    '<h4>:(</h4>' +
                                    '</div>' +
                                    '</div>',
                                buttonsStyling: false,
                                confirmButtonClass: 'btn btn-danger w-xs me-2 mb-1',
                                confirmButtonText: 'Oke!',
                            })
                        }
                    })
                }
                $('.tblgantifoto').hide();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    })

    $("#tekan").click(function() {
        $('.tblgantifoto').show();

    });

    $(".btnbatal").click(function() {
        $('.tblgantifoto').hide();
        location.reload();

    });
});

$('.phone').on('keypress', function(e) {
        var key = e.charCode || e.keyCode || 0;
        var phone = $(this);
        if (phone.val().length === 0) {
            phone.val(phone.val());
        }
        // Auto-format- do not expose the mask as the user begins to type
        if (key !== 12 && key !== 11) {
            if (phone.val().length === 4) {
                phone.val(phone.val() + '-');
            }
            if (phone.val().length === 9) {
                phone.val(phone.val() + '-');
            }
            if (phone.val().length === 14) {
                phone.val(phone.val() + '-');
            }
            if (phone.val().length >= 15) {
                phone.val(phone.val().slice(0, 15));
            }
        }

        // Allow numeric (and tab, backspace, delete) keys only
        return (key == 8 ||
            key == 9 ||
            key == 46 ||
            (key >= 48 && key <= 57) ||
            (key >= 96 && key <= 105));

    })

    .on('focus', function() {
        phone = $(this);
        if (phone.val().length === 0) {
            phone.val('');
        } else {
            var val = phone.val();
            phone.val('').val(val); // Ensure cursor remains at the end
        }
    })

    .on('blur', function() {
        $phone = $(this);

        if ($phone.val() === '') {
            $phone.val('');
        }
    })

$(document).ready(function() {

    $('.formupdate').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "get",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btnupload').attr('disable', 'disabled');
                $('.btnupload').html(
                    '<span class="d-flex align-items-center"> <span class = "spinner-border flex-shrink-0" role = "status" ></span> </span>'
                );
            },

            complete: function() {
                $('.btnupload').removeAttr('disabled');
                $('.btnupload').html('Save');
            },

            success: function(response) {

                if (response.error) {
                    alert('Isi data dengan lengkap');
                    if (response.error.fullname) {
                        $('#fullname').addClass('is-invalid');
                        $('.errorfullname').html(response.error.fullname);
                    } else {
                        $('#fullname').removeClass('is-invalid');
                        $('.errorfullname').html('');
                    }

                    if (response.error.nickname) {
                        $('#nickname').addClass('is-invalid');
                        $('.errornickname').html(response.error
                            .nickname);
                    } else {
                        $('#nickname').removeClass('is-invalid');
                        $('.errornickname').html('');
                    }

                    if (response.error.username) {
                        $('#username').addClass('is-invalid');
                        $('.errorusername').html(response.error.username);
                    } else {
                        $('#username').removeClass('is-invalid');
                        $('.errorusername').html('');
                    }

                    if (response.error.gender) {
                        $('#gender').addClass('is-invalid');
                        $('.errorgender').html(response.error.gender);
                    } else {
                        $('#gender').removeClass('is-invalid');
                        $('.errorgender').html('');
                    }
                    if (response.error.phone_number) {
                        $('#phone_number').addClass('is-invalid');
                        $('.errorphone_number').html(response.error.phone_number);
                    } else {
                        $('#phone_number').removeClass('is-invalid');
                        $('.errorphone_number').html('');
                    }
                    if (response.error.nama_angkatan) {
                        $('#nama_angkatan').addClass('is-invalid');
                        $('.errornama_angkatan').html(response.error.nama_angkatan);
                    } else {
                        $('#nama_angkatan').removeClass('is-invalid');
                        $('.errornama_angkatan').html('');
                    }
                    if (response.error.tahun_masuk) {
                        $('#tahun_masuk').addClass('is-invalid');
                        $('.errortahun_masuk').html(response.error.tahun_masuk);
                    } else {
                        $('#tahun_masuk').removeClass('is-invalid');
                        $('.errortahun_masuk').html('');
                    }
                    if (response.error.address) {
                        $('#address').addClass('is-invalid');
                        $('.erroraddress').html(response.error.address);
                    } else {
                        $('#address').removeClass('is-invalid');
                        $('.erroraddress').html('');
                    }
                    if (response.error.email) {
                        $('#email').addClass('is-invalid');
                        $('.erroremail').html(response.error.email);
                    } else {
                        $('#email').removeClass('is-invalid');
                        $('.erroremail').html('');
                    }
                    if (response.error.tempat_lahir) {
                        $('#tempat_lahir').addClass('is-invalid');
                        $('.errortempat_lahir').html(response.error.tempat_lahir);
                    } else {
                        $('#tempat_lahir').removeClass('is-invalid');
                        $('.errortempat_lahir').html('');
                    }
                    if (response.error.tanggal_lahir) {
                        $('#tanggal_lahir').addClass('is-invalid');
                        $('.errortanggal_lahir').html(response.error.tanggal_lahir);
                    } else {
                        $('#tanggal_lahir').removeClass('is-invalid');
                        $('.errortanggal_lahir').html('');
                    }

                } else {

                    Swal.fire({
                        title: 'Success',
                        text: response.sukses,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000,
                        showCloseButton: true,
                    })
                    // $('#setting').hide();
                    // $('.eser').show();
                    // window.open("profile", "_blank").focus();
                }

            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

        return false;
    });
});
</script>

<?= $this->endSection(); ?>