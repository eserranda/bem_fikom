<?= $this->extend('admin/index'); ?>

<?= $this->section('head_title'); ?>
<link href="<?= base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<?php echo view('partials/title-meta', array('title' => 'Users List')); ?>
<?= $this->endSection(); ?>


<?= $this->section('css'); ?>
<!--datatable css-->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/buttons.dataTables.min.css">

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<?php echo view('partials/page-title', array('pagetitle' => 'Users List', 'title' => 'Users List')); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Data Users</h4>
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

<!--datatable js-->
<script src="<?= base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/buttons.html5.min.js"></script>

<script src="<?= base_url(); ?>/assets/js/jsvfs_fonts.js"></script>
<!-- <script src="<?= base_url(); ?>/assets/js/pdfmake.min.js"></script> -->
<script src="<?= base_url(); ?>/assets/js/jszip.min.js"></script>

<script src="<?= base_url(); ?>/assets/js/pages/profile-setting.init.js"></script>

<script>
// $(document).ready(function() {
//     selesai();
// });

// function selesai() {
//     setTimeout(function() {
//         datausers();
//         selesai();
//     }, 200);
// }


function datausers() {
    $.ajax({
        url: "<?= base_url('/users/getdatausers') ?>",
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
    datausers()
    $('.add').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('pengurus/formtambah_pengurus') ?>",
            dataType: "json",

            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#largeModal').modal('show');

            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
});
</script>
<?= $this->endSection(); ?>