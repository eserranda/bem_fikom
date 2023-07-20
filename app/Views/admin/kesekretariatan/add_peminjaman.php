<div id="myModal" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Input Peminjaman Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>


            <?= form_open('kesekretariatan/save_peminjaman', ['class' => 'formadd'])  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" id="taskid-input" class="form-control">
                <div class="mb-2">
                    <label for="task-title-input" class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam">
                    <div class="invalid-feedback errornamapeminjam">

                    </div>
                </div>

                <div class="mb-2">
                    <label for="search" class="form-label">Nama Barang</label>
                    <select class="form-select" name="nama_barang" id="nama_barang"></select>
                    <div class="invalid-feedback errornamabarang">

                    </div>
                </div>


                <!-- <div class="mb-2">
                    <label for="task-title-input" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                    <div class="invalid-feedback errornamabarang">

                    </div>
                </div> -->

                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <label for="task-duedate-input" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" id="tanggal_peminjaman" class="form-control" name="tanggal_peminjaman">
                        <div class="invalid-feedback errortanggalpeminjaman">

                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                        <label for="task-duedate-input" class="form-label">Jangka Waktu</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="jangka_waktu" id="jangka_waktu">
                            <span class="input-group-text" name="hari">Hari</span>

                            <div class="invalid-feedback errorjangkawaktu">

                            </div>
                        </div>
                    </div>
                    <!--end col-->
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
function resultsnamabarang() {
    $('.form-select').select2({
        dropdownParent: $('#myModal'),
        minimumInputLength: 3,
        placeholder: 'Cari nama barang',
        ajax: {
            dataType: 'json',
            url: "<?= base_url('admin/kesekretariatan/ajaxSearch'); ?>",
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
    resultsnamabarang()
});
</script>

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
                    if (response.error.nama_peminjam) {
                        $('#nama_peminjam').addClass('is-invalid');
                        $('.errornamapeminjam').html(response.error.nama_peminjam);
                    } else {
                        $('#nama_peminjam').removeClass('is-invalid');
                        $('.errornamapeminjam').html('');
                    }

                    if (response.error.nama_barang) {
                        $('#nama_barang').addClass('is-invalid');
                        $('.errornamabarang').html(response.error.nama_barang);
                    } else {
                        $('#nama_barang').removeClass('is-invalid');
                        $('.errornamabarang').html('');
                    }

                    if (response.error.tanggal_peminjaman) {
                        $('#tanggal_peminjaman').addClass('is-invalid');
                        $('.errortanggalpeminjaman').html(response.error
                            .tanggal_peminjaman);
                    } else {
                        $('#tanggal_peminjaman').removeClass('is-invalid');
                        $('.errortanggalpeminjaman').html('');
                    }

                    if (response.error.jangka_waktu) {
                        $('#jangka_waktu').addClass('is-invalid');
                        $('.errorjangkawaktu').html(response.error.jangka_waktu);
                    } else {
                        $('#jangka_waktu').removeClass('is-invalid');
                        $('.errorjangkawaktu').html('');
                    }

                    // if (response.error.keterangan) {
                    //     $('#keterangan').addClass('is-invalid');
                    //     $('.errorketerangan').html(response.error.keterangan);
                    // } else {
                    //     $('#keterangan').removeClass('is-invalid');
                    //     $('.errorketerangan').html('');
                    // }

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