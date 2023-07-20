<table class="table" id="datainventaris">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Brg</th>
            <th>Nama Brg</th>
            <th>Jumlah</th>
            <th>Rusak</th>
            <th>Kondisi</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($resultdatainventaris as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['jenis_barang']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['jumlah_barang']; ?></td>
            <td><?= $row['barang_rusak']; ?></td>
            <td><?= $row['kondisi_lama']; ?> Lama, <?= $row['kondisi_baru']; ?> Baru </td>
            <td><?= $row['status']; ?></td>

            <td>

                <div class="dropdown d-inline-block">
                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-more-fill align-middle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li><a href="#!" class="dropdown-item edit-item-btn"
                                onclick="edit('<?= $row['id_inventaris'] ?>')">
                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>

                        <li class="dropdown-divider"></li>
                        <li><a href="#!" class="dropdown-item remove-item-btn"
                                onclick="hapus('<?= $row['id_inventaris'] ?>')">
                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                Hapus</a></li>

                    </ul>

                </div>

            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function edit(id_inventaris) {
    $.ajax({
        type: "get",
        url: "<?= base_url('kesekretariatan/edit_inventaris') ?>",
        data: {
            id_inventaris: id_inventaris
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#largeModal').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

function hapus(id_inventaris) {
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
                url: "<?= base_url('kesekretariatan/hapus_inventaris') ?>",
                data: {
                    id_inventaris: id_inventaris
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            title: 'Terhapus !',
                            text: 'Data berhasil di hapus.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000,
                            showCloseButton: true,
                        })
                        datainventaris();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    })
}


$(function() {
    $("#datainventaris").DataTable({
        "responsive": true,
        "autoWidth": false,


    })

});
</script>