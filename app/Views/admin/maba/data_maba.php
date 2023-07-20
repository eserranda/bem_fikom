<table class="table" id="datamaba">
    <thead>
        <tr>
            <th>No</th>
            <th>Stambuk</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Email</th>
            <th>HP</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($resultdatamaba as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['stambuk_maba']; ?></td>
            <td><?= $row['nama_maba']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><?= $row['email_maba']; ?></td>
            <td><?= $row['nomor_hp_maba']; ?></td>
            <td>
                <div class="dropdown d-inline-block">
                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-more-fill align-middle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="#!" class="dropdown-item" onclick="detail('<?= $row['id_maba'] ?>')">
                                <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                Detail</a></li>
                        <li><a href="#!" class="dropdown-item edit-item-btn" onclick="edit('<?= $row['id_maba'] ?>')">
                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>

                        <li class="dropdown-divider"></li>
                        <li><a href="#!" class="dropdown-item remove-item-btn"
                                onclick="hapus('<?= $row['id_maba'] ?>')">
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
$(function() {
    $("#datamaba").DataTable({
        "responsive": true,
        "autoWidth": false,
    })

});

function detail(id_maba) {
    $.ajax({
        type: "get",
        url: "<?= base_url('maba/detail') ?>",
        data: {
            id_maba: id_maba
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