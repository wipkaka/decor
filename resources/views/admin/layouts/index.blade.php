<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin</title>
    <base href="{{ asset('') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin_asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin_asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
  <link rel="stylesheet" href="admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin_asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin_asset/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="admin_asset/dist/css/jquery-confirm.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="admin_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="admin_asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="admin_asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_asset/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    @include('admin.layouts.footer')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="admin_asset/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin_asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin_asset/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin_asset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin_asset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin_asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin_asset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin_asset/plugins/moment/moment.min.js"></script>
<script src="admin_asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin_asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin_asset/dist/js/adminlte.js"></script>
<script src="admin_asset/dist/js/jquery-confirm.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<!-- DataTables  & Plugins -->
<script src="admin_asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="admin_asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin_asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="admin_asset/plugins/jszip/jszip.min.js"></script>
<script src="admin_asset/plugins/pdfmake/pdfmake.min.js"></script>
<script src="admin_asset/plugins/pdfmake/vfs_fonts.js"></script>
<script src="admin_asset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="admin_asset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="admin_asset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="admin_asset/dist/js/adminlte.min.js"></script>
<script src="admin_asset/dist/js/pages/dashboard.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
      $('#changepassword').change(function(){
          if($(this).is(":checked"))
          {
            $('#epass').removeAttr('disabled');
            $('#epass').attr('placeholder','Nhập mật khẩu mới');
          }
          else
          {
            $('#epass').attr('disabled','');
            $('#epass').attr('placeholder','');
          }
      })
  });
</script>
<script type="text/javascript">
  CKEDITOR.replace('noidung', {
      filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
      filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token()])}}",
      filebrowserImageUploadUrl:  "{{route('ckeditor.image-upload', ['_token' => csrf_token()])}}",
      filebrowserFlashUploadUrl:  "{{route('ckeditor.image-upload', ['_token' => csrf_token()])}}",
      filebrowserUploadMethod: 'form'
  });
  CKEDITOR.replace('enoidung', {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
      filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token()])}}",
      filebrowserImageUploadUrl:  "{{route('ckeditor.image-upload', ['_token' => csrf_token()])}}",
      filebrowserFlashUploadUrl:  "{{route('ckeditor.image-upload', ['_token' => csrf_token()])}}",
      filebrowserUploadMethod: 'form'
  });
</script>
@yield('script')
</body>
</html>
