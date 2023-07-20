<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Pemasukan Dana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('keuangan/update_pemasukan', ['class' => 'formupdate']) ?>
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-xxl-6">
                        <div>
                            <label for="firstName" class="form-label">Sumber Dana</label>
                            <input type="hidden" class="form-control" id="id_pemasukan" name="id_pemasukan"
                                placeholder="Sumber Dana" value="<?= $id_pemasukan; ?>">
                            <input type="text" class="form-control" id="sumber_pemasukan" name="sumber_pemasukan"
                                placeholder="Sumber Dana" value="<?= $sumber_pemasukan; ?>">

                            <div class="invalid-feedback errorsumber_pemasukan">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label for="lastName" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan_pemasukan"
                                name="keterangan_pemasukan" placeholder="Keterangan"
                                value="<?= $keterangan_pemasukan; ?>">

                            <div class="invalid-feedback errorketerangan_pemasukan">

                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal_pemasukan" name="tanggal_pemasukan"
                                placeholder="Tanggal" value="<?= $tanggal_pemasukan; ?>">

                            <div class="invalid-feedback errortanggal_pemasukan">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label for="passwordInput" class="form-label">Jumlah Dana</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="jumlah_pemasukan" name="jumlah_pemasukan"
                                    value="<?= $jumlah_pemasukan; ?>">

                                <div class="invalid-feedback errorjumlah_pemasukan">

                                </div>
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
                    if (response.error.sumber_pemasukan) {
                        $('#sumber_pemasukan').addClass('is-invalid');
                        $('.errorsumber_pemasukan').html(response.error
                            .sumber_pemasukan);
                    } else {
                        $('#sumber_pemasukan').removeClass('is-invalid');
                        $('.errorsumber_pemasukan').html('');
                    }

                    if (response.error.keterangan_pemasukan) {
                        $('#keterangan_pemasukan').addClass('is-invalid');
                        $('.errorketerangan_pemasukan').html(response.error
                            .keterangan_pemasukan);
                    } else {
                        $('#keterangan_pemasukan').removeClass('is-invalid');
                        $('.errorketerangan_pemasukan').html('');
                    }

                    if (response.error.tanggal_pemasukan) {
                        $('#tanggal_pemasukan').addClass('is-invalid');
                        $('.errortanggal_pemasukan').html(response.error.tanggal_pemasukan);
                    } else {
                        $('#tanggal_pemasukan').removeClass('is-invalid');
                        $('.errortanggal_pemasukan').html('');
                    }

                    if (response.error.jumlah_pemasukan) {
                        $('#jumlah_pemasukan').addClass('is-invalid');
                        $('.errorjumlah_pemasukan').html(response.error.jumlah_pemasukan);
                    } else {
                        $('#jumlah_pemasukan').removeClass('is-invalid');
                        $('.errorjumlah_pemasukan').html('');
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

                    datapemasukan();
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