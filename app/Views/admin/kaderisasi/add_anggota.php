<?= $this->extend('admin/index'); ?>

<?= $this->section('head_title'); ?>
<?php echo view('./partials/title-meta', array('title' => 'Data Anggota BEM')); ?>
<?= $this->endSection(); ?>


<?= $this->section('css'); ?>
<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<?php echo view('partials/page-title', array('pagetitle' => 'Kaderisasi', 'title' => 'Data Anggota BEM')); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Input data anggota</h4>
            </div>
            <div class="card-body">
                <?= form_open('kaderisasi/save_anggota', ['class' => 'formadd']) ?>
                <?= csrf_field(); ?>
                <div class="row gy-4">
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="basiInput" class="form-label">NIM/Stambuk</label>
                            <input type="number" class="form-control" id="stambuk" name="stambuk">

                            <div class="invalid-feedback errorstambuk">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="basiInput" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <div class="invalid-feedback errornama">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="basiInput" class="form-label">Nama Angkatan</label>
                            <select class="form-select" aria-label="Default select example" id="namaangkatan"
                                name="namaangkatan">
                                <option value="">- Nama Angkatan -</option>
                                <?php foreach ($nama_angkatan as $row) : ?>
                                <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback errornamaangkatan">

                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="basiInput" class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example" id="gender" name="gender">
                                <option value="">- Gender -</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="invalid-feedback errorgender">

                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="basiInput" class="form-label">Status Anggota</label>
                            <select class="form-select" aria-label="Default select example" id="status_anggota"
                                name="status_anggota">
                                <option value="">- Status Anggota -</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Dipecat">Dipecat</option>
                            </select>
                            <div class="invalid-feedback errorstatus_anggota">

                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-6 eser" style="display: none;">
                        <label for="inputPassword" class="form-label">Alasan
                            dipecat <sup class="text-danger">*isi dengan jelas</sup></label>

                        <div class="col-sm-12 mb-1">
                            <textarea class="form-control col-6" name="keterangan"></textarea>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-12 p-3">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
    <!--end col-->
</div>


<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<!-- <script src="/asset//js/pages/datatables.init.js"></script> -->
<script src="<?= base_url(); ?>/assets/js/pages/profile-setting.init.js"></script>

<script>
$(document).ready(function() {
    $('.formadd').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "get",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btnsave').attr('disable', 'disabled');
                $('.btnsave').html(
                    '<i class="spinner-border spinner-border-sm text-secondary" role="status"></i>'
                );
            },

            complete: function() {
                $('.btnsave').removeAttr('disabled');
                $('.btnsave').html('Save');
            },

            success: function(response) {
                if (response.error) {
                    if (response.error.stambuk) {
                        $('#stambuk').addClass('is-invalid');
                        $('.errorstambuk').html(response.error.stambuk);
                    } else {
                        $('#stambuk').removeClass('is-invalid');
                        $('.errorstambuk').html('');
                    }

                    if (response.error.nama) {
                        $('#nama').addClass('is-invalid');
                        $('.errornama').html(response.error.nama);
                    } else {
                        $('#nama').removeClass('is-invalid');
                        $('.errornama').html('');
                    }

                    if (response.error.namaangkatan) {
                        $('#namaangkatan').addClass('is-invalid');
                        $('.errornamaangkatan').html(response.error.namaangkatan);
                    } else {
                        $('#namaangkatan').removeClass('is-invalid');
                        $('.errornamaangkatan').html('');
                    }

                    if (response.error.gender) {
                        $('#gender').addClass('is-invalid');
                        $('.errorgender').html(response.error.gender);
                    } else {
                        $('#gender').removeClass('is-invalid');
                        $('.errorgender').html('');
                    }
                    if (response.error.status_anggota) {
                        $('#status_anggota').addClass('is-invalid');
                        $('.errorstatus_anggota').html(response.error.status_anggota);
                    } else {
                        $('#status_anggota').removeClass('is-invalid');
                        $('.errorstatus_anggota').html('');
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
                    setInterval('refreshPage()', 1000);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

        return false;
    });

    $('.btnclose').click(function(e) {
        e.preventDefault();
        $('.add').removeAttr('disabled');
        $('.add').html('<i class="bi-plus-square me-1"></i><span>ADD</span>');
    });
});

function refreshPage() {
    location.reload(true);
}

$(document).ready(function() {
    $('select').on('change', function(e) {
        e.preventDefault();
        if (this.value == 'Dipecat') {
            $('.eser').show();
        } else if (this.value == 'Aktif') {
            $('.eser').hide();
            // $('.eser').append(textareavalue[0]);
        }
    });
});
</script>
<?= $this->endSection(); ?>