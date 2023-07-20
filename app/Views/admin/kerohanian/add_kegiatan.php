<div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Tambah Data Kegiatan Kerohanian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <?= form_open('kerohanian/save_kegiatan', ['class' => 'formadd']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <label for="task-title-input" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                            <div class="invalid-feedback errornamakegiatan">

                            </div>
                        </div>
                    </div>


                    <!--end col-->
                    <div class="col-lg-6">
                        <div class="mb-2 col-lg-12">
                            <label for="task-title-input" class="form-label">Tempat Kegiatan</label>
                            <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan">
                            <div class="invalid-feedback errortempat_kegiatan">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <div class="mb-2 col-lg-12">
                            <label for="task-title-input" class="form-label">Tanggal Kegiatan</label>
                            <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan">
                            <div class="invalid-feedback errortanggal_kegiatan">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row g-3 mb-2 ">

                    <div class="col-lg-6">
                        <div class="mb-2 col-lg-12">
                            <label for="task-title-input" class="form-label">Pengeluaran</label>
                            <div class="input-group">
                                <span class="input-group-text" name="hari">Rp</span>
                                <input type="number" class="form-control" name="pengeluaran_kegiatan"
                                    id="pengeluaran_kegiatan">
                                <div class="invalid-feedback errorpengeluaran_kegiatan">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="task-title-input" class="form-label">Pemasukan</label>
                        <div class="input-group">
                            <span class="input-group-text" name="hari">Rp</span>
                            <input type="number" class="form-control" name="pemasukan_kegiatan" id="pemasukan_kegiatan">
                            <div class="invalid-feedback errorpemasukan_kegiatan">

                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i
                            class="ri-close-fill align-bottom"></i> Close</button>
                    <button type="submit" class="btn btn-primary btnsave" id="addNewTodo">Simpan</button>
                </div>
            </div>
            <?= form_close() ?>
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
                    if (response.error.nama_kegiatan) {
                        $('#nama_kegiatan').addClass('is-invalid');
                        $('.errornamakegiatan').html(response.error.nama_kegiatan);
                    } else {
                        $('#nama_kegiatan').removeClass('is-invalid');
                        $('.errornamakegiatan').html('');
                    }

                    if (response.error.tempat_kegiatan) {
                        $('#tempat_kegiatan').addClass('is-invalid');
                        $('.errortempat_kegiatan').html(response.error.tempat_kegiatan);
                    } else {
                        $('#tempat_kegiatan').removeClass('is-invalid');
                        $('.errortempat_kegiatan').html('');
                    }
                    if (response.error.tanggal_kegiatan) {
                        $('#tanggal_kegiatan').addClass('is-invalid');
                        $('.errortanggal_kegiatan').html(response.error
                            .tanggal_kegiatan);
                    } else {
                        $('#tanggal_kegiatan').removeClass('is-invalid');
                        $('.errortanggal_kegiatan').html('');
                    }

                    if (response.error.pengeluaran_kegiatan) {
                        $('#pengeluaran_kegiatan').addClass('is-invalid');
                        $('.errorpengeluaran_kegiatan').html(response.error
                            .pengeluaran_kegiatan);
                    } else {
                        $('#pengeluaran_kegiatan').removeClass('is-invalid');
                        $('.errorpengeluaran_kegiatan').html('');
                    }
                    if (response.error.pemasukan_kegiatan) {
                        $('#pemasukan_kegiatan').addClass('is-invalid');
                        $('.errorpemasukan_kegiatan').html(response.error
                            .pemasukan_kegiatan);
                    } else {
                        $('#pemasukan_kegiatan').removeClass('is-invalid');
                        $('.errorpemasukan_kegiatan').html('');
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
                    $('#myModal').modal('hide');
                    datakegiatan();
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