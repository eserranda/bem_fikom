<table class="table table-striped" id="datanamaangkatan">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Nama Angkatan</th>
            <th>Tahun</th>
            <th>Logo</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($angkatan as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['tahun']; ?></td>
            <td><?= $row['logo']; ?></td>

            <td>
                <div class="hstack gap-1">
                    <button class="btn btn-sm btn-danger remove-list" onclick="hapus('<?= $row['id_namaangkatan'] ?>')">
                        <i class="ri-delete-bin-5-fill align-bottom"></i></button>
                    <button class="btn btn-sm btn-info edit-list" onclick="edit('<?= $row['id_namaangkatan'] ?>')">
                        <i class="ri-pencil-fill align-bottom"></i></button>
                </div>

                <!-- <button type="button" class="btn btn-info btn-icon waves-effect waves-light btn-sm" title="Detail"
                    onclick="detail('<?= $row['id_namaangkatan'] ?>')"><i class="ri-information-line"></i></button>
                </button> -->
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function hapus(id_namaangkatan) {
    Swal.fire({
        html: '<div class="mt-3">' +
            '<lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
            '<div class="mt-1 pt-2 fs-15 mx-5">' +
            '<h4>Hapus Data ?</h4>' +
            '<p class="text-muted mx-4 mb-0">Apakah Anda Yakin ingin Menghapus Data ini?</p>' +
            '</div>' +
            '</div>',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-danger w-xs me-2 mb-1',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonClass: 'btn btn-primary w-xs mb-1',
        cancelButtonText: 'Batal',
        buttonsStyling: false,
        showCloseButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?= base_url('namaangkatan/hapus') ?>",
                data: {
                    id_namaangkatan: id_namaangkatan
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            title: 'Terhapus !',
                            text: 'Data berhasil dihapus!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            showCloseButton: true,
                        })

                        dataangkatan();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    })
}

$(function() {
    $("#datanamaangkatan").DataTable({
        "responsive": true,
        "autoWidth": false,
        'columnDefs': [{
            'targets': [4], // column index (start from 0)
            'orderable': false, // set orderable false for selecte  d columns 
        }, ],

    })

});
</script>