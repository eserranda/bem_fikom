<table class="table" id="data">
    <thead>
        <tr>
            <th>No</th>
            <th>Stambuk</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Opsi</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($results as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['stambuk']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><span class="badge bg-danger"><?= $row['jabatan']; ?></span></td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" title="Edit Data"
                    onclick="edit('<?= $row['id_pengurus'] ?>')">
                    <i class="bi bi-pencil-square"></i></button>
                </button>

                <button type="button" class="btn btn-danger btn-sm" title="Hapus Data"
                    onclick="hapus('<?= $row['id_pengurus'] ?>')">
                    <i class="bi bi-trash"></i></button>
                </button>

                <button type="button" class="btn btn-info btn-sm" title="Detail Data"
                    onclick="info('<?= $row['id_pengurus'] ?>')">
                    <i class="bi bi-info-circle"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
$(document).ready(function() {
    $('#data').DataTable({
        "responsive": true,
        "autoWidth": false,
        'columnDefs': [{
            'targets': [4], // column index (start from 0)
            'orderable': false, // set orderable false for selected columns
        }]

    });

});

function hapus(id_pengurus) {
    Swal.fire({
        title: 'Hapus Data?',
        // text: "Yakin menghapus data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?= base_url('admin/hapus') ?>",
                data: {
                    id_pengurus: id_pengurus
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire(
                            'Deleted!',
                            'Data berhasil dihapus!',
                            'success'
                        )
                        dataitems();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    })
}

function detail(id_pengurus) {
    $.ajax({
        type: "get",
        url: "<?= base_url('admin/detail') ?>",
        data: {
            id_pengurus: id_pengurus
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#largeModal').modal('show');
            }
        },

        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
    console.log(id_pengurus)
}


function edit(id_pengurus) {
    $.ajax({
        type: "get",
        url: "<?= base_url('admin/edit') ?>",
        data: {
            id_pengurus: id_pengurus
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#largeModal').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}
</script>