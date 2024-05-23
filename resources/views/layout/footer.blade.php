  <!-- /.content-wrapper -->
<!--  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://timemason">TimeMason</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>-->

  <!-- Control Sidebar -->
<!--  <aside class="control-sidebar control-sidebar-dark">
     Control sidebar content goes here 
  </aside>-->

</div>
<!-- ./wrapper -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-lg-square rounded-circle back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>




    <script src="{{asset('assets/dist/js/main.js')}}"></script>

    <!-- Data Table JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

 <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

     <script src="https://unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
 <script>
      new DataTable("#customer-table", {
        dom: "Bfrtip",
        responsive: false,
        columnDefs: [{ orderable: false }],
        ordering: false,
        searching: false,
        info: false,
        lengthChange: false,
        paging: false,
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
      });
    </script>



</body>
</html>
