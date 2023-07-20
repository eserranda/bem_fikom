<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Edit Data Iuran Pengurus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('keuangan/update_iuran', ['class' => 'formupdate']) ?>
                <?= csrf_field(); ?>
                <div class="row g-3">

                    <div class="col-xxl-6">
                        <label for="username" class="form-label">Nama Pengurus<span class="text-danger">*</span></label>
                        <input type="hidden" class="form-control" id="id_iuran" name="id_iuran"
                            value="<?= $id_iuran; ?>">
                        <input type="text" class="form-control bg-soft-secondary" id="nama" name="nama"
                            value="<?= $nama; ?>" readonly>
                    </div>
                    <!--end col-->

                    <div class="col-xxl-6">
                        <label class="form-label">Pilih Bulan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="bulan" id="datepicker" value="<?= $bulan; ?>">
                            <div class="invalid-feedback errorbulan">

                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label class="form-label">Keterangan</label>
                            <select class="form-select" id="keterangan" name="keterangan">
                                <option value="Lunas" <?= $keterangan == "Lunas" ? 'selected' : ''; ?>>Lunas</option>
                                <option value="Denda" <?= $keterangan == "Denda" ? 'selected' : ''; ?>>Denda
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="col-xxl-3 col-md-6 lunass" style="display: none;"> -->
                    <div class="col-xxl-3 col-md-6 lunass"
                        style="display: <?= $jumlah_uang != "" ? 'block' : 'none'; ?>;">
                        <label class="form-label">Total Bayar</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="jumlah_uang" name="jumlah_uang"
                                value="<?= $jumlah_uang; ?>">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 hutangg" style="display: <?= $denda != "" ? 'block' : 'none'; ?>;">
                        <label class="form-label">Total Denda</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="denda" name="denda" value="<?= $denda; ?>">
                        </div>
                    </div>

                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>/assets/js/bootstrap-datepicker.min.js"></script>

<script>
function resultsnamabarang() {
    $('#username').select2({
        dropdownParent: $('#exampleModalgrid'),
        minimumInputLength: 2,
        placeholder: 'Cari Nama atau Nim',
        ajax: {
            dataType: 'json',
            url: "<?= base_url('keuangan/ajaxSearch'); ?>",
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
        },
    });
}
$(document).ready(function() {
    resultsnamabarang()
    $("#datepicker").datepicker({
        format: "MM, yyyy",
        startView: "months",
        minViewMode: "months",
        autoclose: true
    });
});

$(document).ready(function() {
    $('select').on('change', function(e) {
        e.preventDefault();
        if (this.value == 'Lunas') {
            $('#denda').val('');
            $('.hutangg').hide();
            $('#denda').removeAttr('required');
            $('.lunass').show();
            $("#jumlah_uang").attr('required', 'required');
        } else if (this.value == 'Denda') {
            $('.lunass').hide();
            $('#jumlah_uang').val('');
            $('#jumlah_uang').removeAttr('required');
            $('.hutangg').show();
            $("#denda").attr('required', 'required');
        }
    });
});


$('.formupdate').submit(function(e) {
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

                if (response.error.bulan) {
                    $('#datepicker').addClass('is-invalid');
                    $('.errorbulan').html(response.error.bulan);
                } else {
                    $('#datepicker').removeClass('is-invalid');
                    $('.errorbulan').html('');
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
                $('#exampleModalgrid').modal('hide');

                databasar();
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
    return false;
});
</script>