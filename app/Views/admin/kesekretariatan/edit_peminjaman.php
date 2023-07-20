<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog modal-fullscreen-sm-down"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Update Peminjaman Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <?= form_open('kesekretariatan/update_peminjam', ['class' => 'formupdate'])  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="mb-2">
                    <label for="task-title-input" class="form-label">Nama Peminjam</label>
                    <input type="hidden" class="form-control" id="id_peminjaman" name="id_peminjaman"
                        value="<?= $id_peminjaman; ?>" readonly>
                    <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam"
                        value="<?= $nama_peminjam; ?>" disabled>
                </div>
                <div class="mb-2">
                    <label for="task-title-input" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                        value="<?= $nama_barang; ?>" disabled>
                </div>

                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <label for="task-duedate-input" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" id="tanggal_peminjaman" class="form-control" name="tanggal_peminjaman"
                            value="<?= $tanggal_peminjaman; ?>" disabled>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                        <label for="task-duedate-input" class="form-label">Jangka Waktu</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="jangka_waktu" id="jangka_waktu"
                                value="<?= $jangka_waktu; ?>" disabled>
                            <span class="input-group-text" name="hari">Hari</span>
                        </div>
                    </div>
                    <!--end col-->
                </div>

                <div class="mb-2">
                    <label for="task-title-input" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian"
                        value="<?= $tanggal_pengembalian; ?>">

                    <div class="invalid-feedback errortanggalpengembalian">

                    </div>
                </div>

                <div class="mb-2">
                    <label for="exampleFormControlTextarea5" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan"
                        rows="2"><?= $keterangan; ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i
                        class="ri-close-line me-1 align-middle"></i>Batal</a>
                <button type="submit" class="btn btn-primary btnupdate">Update</button>
            </div>
            <?= form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                $('.btnupdate').attr('disable', 'disabled');
                $('.btnupdate').html(
                    '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading...'
                );

            },
            complete: function() {
                $('.btnupdate').removeAttr('disabled');
                $('.btnupdate').html('Save');
            },

            success: function(response) {
                if (response.error) {
                    if (response.error.tanggal_pengembalian) {
                        $('#tanggal_pengembalian').addClass('is-invalid');
                        $('.errortanggalpengembalian').html(response.error
                            .tanggal_pengembalian);
                    } else {
                        $('#tanggal_pengembalian').removeClass('is-invalid');
                        $('.errortanggalpengembalian').html('');
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
                    datapeminjam();
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