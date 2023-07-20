<table class="table" id="datainventaris">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tahun</th>
            <th>Logo</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $nomor = 0;
            foreach ($namaangkatan as $row) :
                $nomor++; ?>
            <td><?= $nomor ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['tahun']; ?></td>
            <td><?= $row['logo']; ?></td>

            <td>
                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light btn-sm" title="Edit"
                    onclick="edit('<?= $row['id_arsip'] ?>')"><i class="ri-edit-2-line"></i></button>
                </button>

                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light btn-sm" title="Hapus"
                    onclick="hapus('<?= $row['id_arsip'] ?>')"><i class="ri-delete-bin-5-line"></i></button>
                </button>

                <!-- <button type="button" class="btn btn-info btn-icon waves-effect waves-light btn-sm" title="Detail"
                    onclick="detail('<?= $row['id_arsip'] ?>')"><i class="ri-information-line"></i></button>
                </button> -->
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>