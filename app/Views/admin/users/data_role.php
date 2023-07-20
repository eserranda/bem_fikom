<table class="table" id="data_users">
    <thead>
        <tr>
            <th>No</th>
            <th>Stambuk</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Opsi</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $nomor = 0;

            foreach ($users as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row->username; ?></td>
            <td><?= ucwords($row->fullname); ?></td>
            <td><?= $row->email; ?></td>
            <td><?= ucwords($row->name); ?></td>
            <td>
                <div class="hstack gap-1">
                    <button class="btn btn-sm btn-soft-danger remove-list" onclick="hapus('<?= $row->userid; ?>')">
                        <i class="ri-delete-bin-5-fill align-bottom"></i></button>
                    <button class="btn btn-sm btn-soft-info edit-list" onclick="edit('<?= $row->userid; ?>')">
                        <i class="ri-pencil-fill align-bottom"></i></button>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
function edit(id) {
    $.ajax({
        type: "get",
        url: "<?= base_url('users/edit_data') ?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#exampleModalgrid').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}


$(function() {
    $("#data_users").DataTable({
        "responsive": true,
        "autoWidth": false,
        'columnDefs': [{
            'targets': [4],
            'orderable': false,
        }, ],

    })

});
</script>