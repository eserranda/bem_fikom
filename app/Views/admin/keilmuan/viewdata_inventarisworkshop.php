<?= $this->extend('admin/index'); ?>

<?= $this->section('head_title'); ?>
<?php echo view('./partials/title-meta', array('title' => 'Data Inventaris Workshop')); ?>
<?= $this->endSection(); ?>


<?= $this->section('css'); ?>
<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<?php echo view('partials/page-title', array('pagetitle' => 'Keilmuan', 'title' => 'Data Inventaris Workshop')); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Data Inventaris Worshop</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-primary btn-sm  add">
                        <i class="bx bx-add-to-queue"></i></button>
                    </button>
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

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
function datainventaris_workshop() {
    $.ajax({
        url: "<?= base_url('keilmuan/getdata_inventaris') ?>",
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
    datainventaris_workshop()
    $('.add').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('keilmuan/formtambah_inventaris') ?>",
            dataType: "json",

            // beforeSend: function() {
            //     $('.add').attr('disable', 'disabled');
            //     $('.add').html(
            //         '<span class="spinner-grow spinner-grow-sm me-1" role="status" aria-hidden="true"></span>Add Data...'
            //     );
            // },

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