  <!-- /#wrap -->
</div>
            <footer class="Footer bg-dark dker">
                <p>2021 &copy; PQAFU </p>
            </footer>
            <!-- /#footer -->
            <!-- #helpModal -->
            <div id="helpModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- /#helpModal -->
            <!--jQuery -->
          

		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.26.6/js/jquery.tablesorter.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

		<!--Bootstrap -->
		<script src="<?=base_url()?>assets/lib/bootstrap/js/bootstrap.js"></script>
		<!-- MetisMenu -->
		<script src="<?=base_url()?>assets/lib/metismenu/metisMenu.js"></script>
		<!-- onoffcanvas -->
		<script src="<?=base_url()?>assets/lib/onoffcanvas/onoffcanvas.js"></script>
		<!-- Screenfull -->
		<script src="<?=base_url()?>assets/lib/screenfull/screenfull.js"></script>

		<!-- Metis core scripts -->
		<script src="<?=base_url()?>assets/js/core.js"></script>
		<!-- Metis demo scripts -->
		<script src="<?=base_url()?>assets/js/app.js"></script>
		<!--  <script src="<?=base_url()?>assets/js/style-switcher.js"></script> -->


<?php /*?><script src="<?=base_url()?>assets/admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?=base_url()?>assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script><?php */?>

  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?=base_url()?>assets/admin/js/off-canvas.js"></script>
  <script src="<?=base_url()?>assets/admin/js/hoverable-collapse.js"></script>

  <script src="<?=base_url()?>assets/admin/js/template.js"></script>
  
  

  <!-- endinject -->
  <!-- Custom js for this page-->
  <?php /*?><script src="<?=base_url()?>assets/admin/js/data-table.js"></script><?php */?>
  <!-- End custom js for this page-->

 <?php /*?> <script src="<?=base_url()?>assets/admin/vendors/chart.js/Chart.min.js"></script><?php */?>
  <!-- <script src="{{ asset('public/admin/js/chart.js') }}"></script> -->




            <script>
                //    $(function() {
                 //     Metis.MetisTable();
                //      Metis.metisSortable();
                //    });
                </script>

                <script>
                $(document).on("change keyup blur", "#chDiscount", function() {
                    console.log();
                    var val  = 0;
                  var amd = $('#cBalance').val();
                  var disc = $('#chDiscount').val();
                  if (disc != '' && amd != '' && disc !='0') {

                     val = amd*(disc/100)
                    $('#result').val((parseInt(amd)) - (parseInt(val)));
                  }else{
                    $('#result').val(parseInt(amd));
                  }
                });
               </script>

        </body>

</html>