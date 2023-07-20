<div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Tambah Data Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <?= form_open('kesekretariatan/save_pengadaan', ['class' => 'formadd']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label class="form-label">Jenis</label>
                        <input type="text" class="form-control" id="jenis_pengadaan" name="jenis_pengadaan">
                        <div class="invalid-feedback errorjenispengadaan">

                        </div>
                    </div>

                    <div class="col-sm-6 ">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_pengadaan" name="nama_pengadaan">
                        <div class="invalid-feedback errornamapengadaan">

                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-sm-6 mt-1">
                        <label for="inputEmail4" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah_pengadaan" name="jumlah_pengadaan">
                        <div class="invalid-feedback errorjumlahpengadaan">

                        </div>
                    </div>

                    <div class="col-sm-6 mt-1">
                        <label class="form-label">Tanggal Pengadaan</label>
                        <input type="date" class="form-control" id="tanggal_pengadaan" name="tanggal_pengadaan">
                        <div class="invalid-feedback errortanggalpengadaan">

                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col-sm-6 mt-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
                        <textarea class="form-control col-6" name="keterangan"></textarea>
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
                    if (response.error.jenis_pengadaan) {
                        $('#jenis_pengadaan').addClass('is-invalid');
                        $('.errorjenispengadaan').html(response.error.jenis_pengadaan);
                    } else {
                        $('#jenis_pengadaan').removeClass('is-invalid');
                        $('.errorjenispengadaan').html('');
                    }

                    if (response.error.nama_pengadaan) {
                        $('#nama_pengadaan').addClass('is-invalid');
                        $('.errornamapengadaan').html(response.error.nama_pengadaan);
                    } else {
                        $('#nama_pengadaan').removeClass('is-invalid');
                        $('.errornamapengadaan').html('');
                    }

                    if (response.error.jumlah_pengadaan) {
                        $('#jumlah_pengadaan').addClass('is-invalid');
                        $('.errorjumlahpengadaan').html(response.error.jumlah_pengadaan);
                    } else {
                        $('#jumlah_pengadaan').removeClass('is-invalid');
                        $('.errorjumlahpengadaan').html('');
                    }

                    if (response.error.tanggal_pengadaan) {
                        $('#tanggal_pengadaan').addClass('is-invalid');
                        $('.errortanggalpengadaan').html(response.error.tanggal_pengadaan);
                    } else {
                        $('#tanggal_pengadaan').removeClass('is-invalid');
                        $('.errortanggalpengadaan').html('');
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
                    $('.add').removeAttr('disabled');
                    $('.add').html(
                        '<i class="bi-plus-circle-dotted me-1"></i><span>ADD</span>');
                    datapengadaan();
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
</script>