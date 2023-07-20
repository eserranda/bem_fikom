<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Edit Dana Kreatif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('keuangan/update_kreatif', ['class' => 'formupdate']) ?>
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-xxl-6">
                        <div>
                            <label for="firstName" class="form-label">Jenis Basar</label>
                            <input type="hidden" class="form-control" id="id_kreatif" name="id_kreatif"
                                placeholder="Jenis Basar" value="<?= $id_kreatif; ?>">

                            <input type="text" class="form-control" id="jenis_basar" name="jenis_basar"
                                placeholder="Jenis Basar" value="<?= $nama_basar; ?>">

                            <div class="invalid-feedback errorjenis_basar">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label for="lastName" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Keterangan"
                                value="<?= $tanggal_basar; ?>">

                            <div class="invalid-feedback errortanggal">

                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="pelanggan" name="pelanggan"
                                placeholder="Nama Pelanggan" value="<?= $pelanggan; ?>">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label for="passwordInput" class="form-label">Hutang</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="hutang" name="hutang"
                                    value="<?= $hutang; ?>">
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label for="passwordInput" class="form-label">Pemasukan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="pendapatan" name="pendapatan"
                                    value="<?= $pendapatan; ?>">
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
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

<script>
$(document).ready(function() {
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
                    if (response.error.jenis_basar) {
                        $('#jenis_basar').addClass('is-invalid');
                        $('.errorjenis_basar').html(response.error.jenis_basar);
                    } else {
                        $('#jenis_basar').removeClass('is-invalid');
                        $('.errorjenis_basar').html('');
                    }

                    if (response.error.tanggal) {
                        $('#tanggal').addClass('is-invalid');
                        $('.errortanggal').html(response.error
                            .tanggal);
                    } else {
                        $('#tanggal').removeClass('is-invalid');
                        $('.errortanggal').html('');
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
});
</script>