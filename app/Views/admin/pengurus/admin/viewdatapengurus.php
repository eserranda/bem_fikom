<?= $this->extend('admin/index'); ?>

<?= $this->section('head_title'); ?>
<link href="<?= base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php echo view('partials/title-meta', array('title' => 'Team')); ?>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>

<?php echo view('partials/page-title', array('pagetitle' => 'Pages', 'title' => 'Data Pengurus')); ?>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Data Pengurus</h4>
                <div class="flex-shrink-0">
                    <a class="btn btn-primary btn-sm" href="<?= base_url('admin/add_pengurus') ?>">
                        <i class="mdi mdi-cog-outline text-light fs-16 align-middle me-1"></i> <span
                            class="align-middle">Tambah Data</span>
                    </a>
                </div>
            </div>
            <div class="card-body viewdata">

            </div>
        </div>
    </div>
</div>

<div class="viewmodal" style="display: none;"></div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- datatable -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<!-- select2 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<script>
function datapengurus() {
    $.ajax({
        url: "<?= base_url('admin/getdatapengurus') ?>",
        dataType: "json",
        success: function(response) {
            $('.viewdata').html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

$(document).ready(function() {
    datapengurus()

    // $('.add').click(function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //         url: "<?= base_url('admin/formtambah_pengurus') ?>",
    //         dataType: "json",

    //         success: function(response) {
    //             $('.viewmodal').html(response.data).show();
    //             $('#exampleModalgrid').modal('show');

    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    //         }
    //     });
    // });
});
</script>
<?= $this->endSection(); ?>