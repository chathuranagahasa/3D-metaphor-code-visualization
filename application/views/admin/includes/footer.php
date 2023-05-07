<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <strong>Design & Developed By <a href="https://www.webarktec.com">WebArk</a>.</strong>
        <b>&nbsp;&nbsp;V</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://www.carmart.com">CarMart Pvt Ltd</a>.</strong> All rights reserved.

</footer>

<!-- Control Sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--assets/admin/js/bootstrap-select.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.js"></script>

<!--<script src="--><?php //echo base_url(); ?><!--assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>-->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.fileuploader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/form-validation.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
<!--<script src="<?php /*echo base_url(); */?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>-->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    /*$.widget.bridge('uibutton', $.ui.button);*/
</script>
<!-- Bootstrap 3.3.5 -->
<!--<script src="--><?php //echo base_url(); ?><!--assets/admin/bootstrap/js/bootstrap.min.js"></script>-->

<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/fastclick/fastclick.min.js "></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?php /*echo base_url(); */?>assets/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/demo.js"></script>


<script src="<?php echo base_url(); ?>assets/admin/dist/js/datepicker.min.js"></script>

<!-- Include English language -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/i18n/datepicker.en.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/sweatalert-lib/sweetalert.min.js"></script>



<script src="<?php echo base_url(); ?>assets/admin/js/custom-dragdrop-banner.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/custom-dragdrop.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/custom-dragdrop-edit.js"></script>



<script>
        $("#product_expiredate").datepicker();
        $('#product_expiredate').data('datepicker');

        $("#emp_passport_issuedate").datepicker();
        $('#emp_passport_issuedate').data('datepicker');

        $("#pro_available_from").datepicker({
            autoClose: true,
        });
</script>

</body>
</html>