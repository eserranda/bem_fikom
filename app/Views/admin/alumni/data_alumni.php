<table class="table" id="dataalumni">
    <thead>
        <tr>
            <th>No</th>
            <th>Stambuk</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Angkatan</th>
            <th>Tahun</th>
            <th>HP</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($resultdataalumni as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['stambuk_alumni']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['nama_angkatan']; ?></td>
            <td><?= $row['alumni_tahun']; ?></td>
            <td><?= $row['nomor_hp']; ?></td>
            <td>
                <div class="dropdown d-inline-block">
                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-more-fill align-middle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="#!" class="dropdown-item" onclick="detail('<?= $row['id_alumni'] ?>')">
                                <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                Detail</a></li>

                        <li><a href="#!" class="dropdown-item edit-item-btn" onclick="edit('<?= $row['id_alumni'] ?>')">
                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a href="#!" class="dropdown-item remove-item-btn"
                                onclick="hapus('<?= $row['id_alumni'] ?>')">
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
function edit(id_alumni) {
    $.ajax({
        type: "get",
        url: "<?= base_url('alumni/edit') ?>",
        data: {
            id_alumni: id_alumni
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

function hapus(id_alumni) {
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
                url: "<?= base_url('alumni/hapus') ?>",
                data: {
                    id_alumni: id_alumni
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire(
                            'Deleted!',
                            'Data berhasil dihapus!',
                            'success'
                        )
                        dataalumni();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    })
}

function detail(id_alumni) {
    $.ajax({
        type: "get",
        url: "<?= base_url('alumni/detail') ?>",
        data: {
            id_alumni: id_alumni
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



$(function() {
    $("#dataalumni").DataTable({
        "responsive": true,
        "autoWidth": false,


    })

});
</script>