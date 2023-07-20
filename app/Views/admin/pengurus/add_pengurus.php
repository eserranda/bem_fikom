<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Input data pengurus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('keuangan/save_pemasukan', ['class' => 'formadd']) ?>
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-xxl-6">

                        <label for="username" class="form-label">NIM/Stambuk<span class="text-danger">*</span></label>
                        <select class="form-select" id="username" name="username"></select>
                        <div class=" invalid-feedback">
                            Masukkan Stambuk
                        </div>

                    </div>
                    <!--end col-->
                    <div class="col-xxl-6">
                        <label for="fullname" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Nama Lengkap"
                            readonly>

                        <div class="invalid-feedback">
                            Masukkan nama lengkap
                        </div>
                    </div>
                    <!--end col-->

                    <!--end col-->
                    <div class="col-xxl-6">
                        <label for="form-select" class="form-label">Jabatan</label>
                        <select class="form-select" name="status_barang" id="status_barang">
                            <option value="">-Pilih Jababatan-</option>
                            <option value="Ada">Ketua</option>
                            <option value="Hilang">Sekretaris</option>
                            <option value="Dipinjam">Bendahara</option>
                            <option value="Dipinjam">Koordinator Keuangan</option>
                            <option value="Dipinjam">Koordinator Humas</option>
                            <option value="Dipinjam">Koordinator Kesekretariatan</option>
                            <option value="Dipinjam">Koordinator Keilmuan</option>
                            <option value="Dipinjam">Koordinator Kerohanian</option>
                            <option value="Dipinjam">Koordinator Kaderisasi</option>
                            <option value="Dipinjam">Anggota Keuangan</option>
                            <option value="Dipinjam">Anggota Kerohanian</option>
                            <option value="Dipinjam">Anggota Humas</option>
                            <option value="Dipinjam">Anggota Kesekretariatan</option>
                            <option value="Dipinjam">Anggota Keilmuan</option>
                            <option value="Dipinjam">Anggota Kaderisasi</option>

                        </select>

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
$('#username').select2({
    dropdownParent: $('#exampleModalgrid'),
    minimumInputLength: 2,
    placeholder: 'Masukkan Stambuk',
    ajax: {
        dataType: 'json',
        url: "<?= base_url('/pengurus/ajaxSearch'); ?>",
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

$('#username').change(function(e) {
    // e.preventDefault();
    $.ajax({
        type: 'post',
        url: '<?= base_url('/pengurus/getName'); ?>',
        data: {
            username: $(this).val()
        },
        dataType: 'json',
        success: function(response) {
            if (response.data) {
                $('#fullname').val(response.data);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    })
});
</script>