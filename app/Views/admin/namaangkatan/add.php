<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Tambah data nama angkatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('namaangkatan/save_namaangkatan', ['class' => 'formadd']) ?>
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-xxl-6">
                        <div>
                            <label class="form-label">Nama Angkatan</label>
                            <input type="text" class="form-control" id="nama_angkatan" name="nama_angkatan"
                                placeholder="Nama Angkatan">

                            <div class="invalid-feedback errornama_angkatan">

                            </div>
                        </div>
                    </div>
                    <!--end col-->


                    <div class="col-xxl-6">
                        <div>
                            <label class="form-label">Tahun</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun">

                            <div class="invalid-feedback errortahun">

                            </div>
                        </div>
                    </div>

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
                    if (response.error.nama_angkatan) {
                        $('#nama_angkatan').addClass('is-invalid');
                        $('.errornama_angkatan').html(response.error
                            .nama_angkatan);
                    } else {
                        $('#nama_angkatan').removeClass('is-invalid');
                        $('.errornama_angkatan').html('');
                    }

                    if (response.error.tahun) {
                        $('#tahun').addClass('is-invalid');
                        $('.errortahun').html(response.error
                            .tahun);
                    } else {
                        $('#tahun').removeClass('is-invalid');
                        $('.errortahun').html('');
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

                    dataangkatan();
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