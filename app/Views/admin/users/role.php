<?= $this->extend('admin/index'); ?>

<?= $this->section('head_title'); ?>
<?php echo view('./partials/title-meta', array('title' => 'Input data role')); ?>
<?= $this->endSection(); ?>


<?= $this->section('css'); ?>
<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<?php echo view('partials/page-title', array('pagetitle' => 'Admin', 'title' => 'Input data role')); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Input data</h4>
            </div>
            <div class="card-body">
                <?= form_open('admin/users/save_data_role', ['class' => 'formadd']) ?>
                <?= csrf_field(); ?>
                <div class="row gy-4">
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="search" class="form-label">Nama atau Nim</label>
                            <select class="form-select" name="select" id="select"></select>
                            <div class="invalid-feedback errornama">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="basiInput" class="form-label">Pilih Role</label>
                            <select class="form-select" id="role" name="role">
                                <option value="">- Pilih Role -</option>
                                <?php foreach ($role as $row) : ?>
                                <option value="<?= $row['id']; ?>"><?= ucwords($row['name']); ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback errorrole">

                            </div>
                        </div>
                    </div>
                    <!--end col-->

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

<!-- select 2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
function resultsdata() {
    $('#select').select2({
        minimumInputLength: 1,
        placeholder: 'Nama atau Nim',
        ajax: {
            dataType: 'json',
            url: "<?= base_url('admin/users/roleSearch'); ?>",
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
}
$(document).ready(function() {
    resultsdata()
});
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
                    if (response.error.select) {
                        $('#select').addClass('is-invalid');
                        $('.errornama').html(response.error.select);
                    } else {
                        $('#select').removeClass('is-invalid');
                        $('.errornama').html('');
                    }
                    if (response.error.role) {
                        $('#role').addClass('is-invalid');
                        $('.errorrole').html(response.error.role);
                    } else {
                        $('#role').removeClass('is-invalid');
                        $('.errorrole').html('');
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
});

function refreshPage() {
    location.reload(true);
}
</script>
<?= $this->endSection(); ?>