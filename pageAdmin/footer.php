        <!-- <div class="clearfix" style="margin-top:25.5vh;"></div> -->
        <!--main content end-->
            <!--footer start-->
            <div >
              <footer class="footer">
                <div class="site-footer">
                  <div class="text-center">
                      <?php echo date('Y');?> - Sistem Penjualan Barang Berbasis Web | Perdangan Luar Janti Park
                      <a href="#" class="go-top">
                          <i class="fa fa-angle-up"></i>
                      </a>
                  </div>
                </div>
              </footer>
            </div>
            <!--footer end-->
      </section>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <!-- <script src="assets/js/jquery.js"></script> -->
    <!-- <script src="assets/js/jquery-1.8.3.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

    <!-- Datatable Script -->
	<script src="assets/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/datatables/dataTables.bootstrap.min.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
	<script type="text/javascript">
		// datatable
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable();
			$('#example3').DataTable();
		});
        // document.addEventListener("mousewheel", this.mousewheel.bind(this), { passive: false });
        
        //angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
        $(document).ready(function(){setTimeout(function(){$(".alert-danger").fadeIn('slow');}, 500);});
		//angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
		setTimeout(function(){$(".alert-danger").fadeOut('slow');}, 5000);

		$(document).ready(function(){setTimeout(function(){$(".alert-success").fadeIn('slow');}, 500);});
		setTimeout(function(){$(".alert-success").fadeOut('slow');}, 5000);

		$(document).ready(function(){setTimeout(function(){$(".alert-warning").fadeIn('slow');}, 500);});
		setTimeout(function(){$(".alert-success").fadeOut('slow');}, 5000);
    </script>	
    <script>
        $(".modal-create").hide();
        $(".bg-shadow").hide();
        $(".bg-shadow").hide();
        function clickModals(){
            $(".bg-shadow").fadeIn();
            $(".modal-create").fadeIn();
        }
        function cancelModals(){
            $('.modal-view').fadeIn();
            $(".modal-create").hide();
            $(".bg-shadow").hide();
        }
    </script>
</body>
</html>