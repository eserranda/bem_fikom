<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Pemasukan Dana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('keuangan/save_basar', ['class' => 'formadd']) ?>
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-xxl-6">
                        <div>
                            <label for="firstName" class="form-label">Jenis Basar</label>
                            <input type="text" class="form-control" id="jenis_basar" name="jenis_basar"
                                placeholder="Jenis Basar">

                            <div class="invalid-feedback errorjenis_basar">

                            </div>
                        </div>
                    </div>
                    <!--end col-->


                    <div class="col-xxl-6">
                        <div>
                            <label for="lastName" class="form-label">Tempat Basar</label>
                            <input type="text" class="form-control" id="tempat_basar" name="tempat_basar"
                                placeholder="Tempat basar">

                            <div class="invalid-feedback errortempat_basar">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label class="form-label">Tanggal Basar</label>
                            <input type="date" class="form-control" id="tanggal_basar" name="tanggal_basar"
                                placeholder="Tanggal">

                            <div class="invalid-feedback errortanggal_basar">

                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label for="passwordInput" class="form-label">Jumlah Pendapatan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="pendapatan_basar" name="pendapatan_basar">

                                <div class="invalid-feedback errorpendapatan_basar">

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
                    if (response.error.jenis_basar) {
                        $('#jenis_basar').addClass('is-invalid');
                        $('.errorjenis_basar').html(response.error
                            .jenis_basar);
                    } else {
                        $('#jenis_basar').removeClass('is-invalid');
                        $('.errorjenis_basar').html('');
                    }

                    if (response.error.tempat_basar) {
                        $('#tempat_basar').addClass('is-invalid');
                        $('.errortempat_basar').html(response.error
                            .tempat_basar);
                    } else {
                        $('#tempat_basar').removeClass('is-invalid');
                        $('.errortempat_basar').html('');
                    }

                    if (response.error.tanggal_basar) {
                        $('#tanggal_basar').addClass('is-invalid');
                        $('.errortanggal_basar').html(response.error.tanggal_basar);
                    } else {
                        $('#tanggal_basar').removeClass('is-invalid');
                        $('.errortanggal_basar').html('');
                    }

                    if (response.error.pendapatan_basar) {
                        $('#pendapatan_basar').addClass('is-invalid');
                        $('.errorpendapatan_basar').html(response.error.pendapatan_basar);
                    } else {
                        $('#pendapatan_basar').removeClass('is-invalid');
                        $('.errorpendapatan_basar').html('');
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