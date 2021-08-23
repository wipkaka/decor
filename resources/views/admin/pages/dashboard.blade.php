@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Online Store Visitors</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg">820</span>
                      <span>Visitors Over Time</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->
  
                  <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                  </div>
  
                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This Week
                    </span>
  
                    <span>
                      <i class="fas fa-square text-gray"></i> Last Week
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card" style="height: 403px">
                <div class="card-header border-0">
                  <h3 class="card-title" style="font-weight: bold">Top sản phẩm xem nhiều</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>Tên</th>
                      <th>Tổng view</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sanpham as $sp)
                      <tr>
                        <td><a href="chitiet/{{ $sp->name }}">{{ $sp->name }}</a></td>
                        <td>{{ $sp->view }}</td>
                      </tr>
                    @endforeach  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div id="calendar"></div>
            </div>
          <!-- /.col-md-6 -->
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>

    <!-- /.content -->
  </div>
@endsection
@section('script')
  <script>
        $(document).ready(function(){
        $.ajaxSetup({
          headers:{
              'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          }
        });
        var calendar = $('#calendar').fullCalendar({
          editable:true,
          header:{
            left:'prev,next today',
            center:'title',
            right:'month'
          },
          events:'admin/full-calender',
          selectable:true,
          selectHelper: true,
          select:function(start, end, allDay)
          {
              var title = prompt('Tên tiệc:');
              var time = prompt('Thời gian: VD: 13:00:00');
            if((title) && (time))
            {
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD '+time);
                $.ajax({
                    url:"admin/full-calender/add",
                    type:"POST",
                    data:{  
                        title: title,
                        start: start,
                    },
                    success:function(data)
                    {
                        calendar.fullCalendar('refetchEvents');
                        $.alert("Đã thêm tiệc vào bảng biểu");
                    },
                    error: function(){
                      $.alert('Định dạng thời gian chưa chính xác')
                    }
                })
            }
            else
            {
              $.alert('Chưa nhập tên hoặc thời gian');
            }
          },
        eventDrop: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"admin/full-calender/update",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    id: id,
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    $.alert("Thay đổi lịch thành công");
                }
            })
        },
        eventClick:function(event)
        {
            if(confirm("Bạn muốn xóa tiệc này ?"))
            {
                var id = event.id;
                $.ajax({
                    url:"admin/full-calender/delete",
                    type:"POST",
                    data:{
                        id:id,
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        $.alert("Xóa thành công");
                    }
                })
            }
        }
        })
      })
  </script>
@endsection