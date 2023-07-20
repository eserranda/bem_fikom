<table class="table" id="data_users">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Stambuk</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($datausers as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td>
                <div class="d-flex gap-2 align-items-center">
                    <div class="flex-shrink-0 mr-2">
                        <img src="<?= base_url(); ?>/<?= $row['user_image']; ?>?<?= user()->updated_at; ?>" alt=""
                            class="avatar-xs rounded-circle" />
                    </div>
                    <div class="flex-grow-1">
                        <?= $row['fullname']; ?>
                    </div>
                </div>
            </td>

            <td><?= $row['username']; ?></td>
            <td><?= $row['jabatan']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?php
                    $active =  $row['active'];
                    if ($active == 1) { ?>
                <span class="badge badge-soft-success fs-11"><i class="ri-checkbox-circle-line align-bottom"></i>
                    Success</span>
                <?php } else { ?>
                <span class="badge badge-soft-danger fs-11"><i class="ri-close-circle-line align-bottom"></i>
                    Failed</span>
                <?php } ?>
            </td>

            <td>
                <div class="hstack gap-1">
                    <button class="btn btn-sm btn-soft-danger remove-list" onclick="hapus('<?= $row['id'] ?>')">
                        <i class="ri-delete-bin-5-fill align-bottom"></i></button>
                    <button class="btn btn-sm btn-soft-info edit-list" onclick="edit('<?= $row['id'] ?>')">
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

function hapus(id) {
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
        buttonsStyling: false,
        showCloseButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?= base_url('users/hapus_users') ?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            title: 'Terhapus !',
                            text: 'Data berhasil di hapus.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                            showCloseButton: true,
                        })
                        datausers();
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