@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DANH MỤC</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/dashboard">Home</a></li>
              <li class="breadcrumb-item">Cửa hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                @if (Auth::user()->quyen == 1)
                <button style=" margin-bottom:10px" class="create-modal btn btn-success btn-sm"><i class="fas fa-plus"></i> Thêm cửa hàng</button>
                @endif
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Địa chỉ</th>
                      <th>Hotline</th>
                      <th>Google Map</th>
                      @if (Auth::user()->quyen == 1)
                      <th>Sửa</th>
                      <th>Xóa</th>
                      @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($store as $str)
                    <tr id="{{ $str->id }}">
                      <td>{{ $str->id }}</td>
                      <td>{{ $str->address }}</td>
                      <td>{{ $str->phone }}</td>
                      <td><p style="width: 350px; height: fit-content;overflow: hidden;">{{ $str->ggmap }}</p></td>
                      @if (Auth::user()->quyen == 1)
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="{{ $str->id }}" data-name="{{ $str->address }}" style="color:blue"><i class="fas fa-edit"></i></a></td>
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="{{ $str->id }}" data-name="{{ $str->address }}" style="color:red"><i class="fas fa-trash"></i></a></td>
                      @endif
                    </tr>
                    @endforeach 
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" id="addstore">
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="name" >Địa chỉ: </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="address" name="address" required> 
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="name" >Holine: </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="phone" name="phone" required pattern="([0])([3,5,7,8,9])([0-9]{8})\b" title="Số điện thoại không hợp lệ.">
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="name" >Google Map: </label>
                <div class="col-sm-12">
                    <textarea type="text" class="form-control" id="ggmap" name="ggmap" required></textarea>
                </div>
            </div>
            <p class="error text-center alert alert-danger" hidden></p>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="add" type="submit">Thêm</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" id="editstore">
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="name" >Địa chỉ: </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="eaddress" name="eaddress" required> 
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="name" >Holine: </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="ephone" name="ephone" required>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="name" >Google Map: </label>
                <div class="col-sm-12">
                    <textarea type="text" class="form-control" id="eggmap" name="eggmap" required></textarea>
                </div>
            </div>
            <p class="error text-center alert alert-danger" hidden></p>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnedit" value="" type="submit">Sửa</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $(document).on('click', '.create-modal', function (event) { 
          event.preventDefault();
          $('#create').modal('show');
          $('.form-horizontal').show();
          $('.modal-title').text('Thêm cửa hàng');
          $('.error').attr("hidden",true);
    });
    $(document).on('click', '#add', function (event) { 
        event.preventDefault();
        $('.error').attr("hidden",true);
        var formData = new FormData(document.getElementById('addstore'));
        $.ajax({
            type: 'POST',
            url: 'admin/store/add',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response)
            {
                if(response.code == 200)
                {
                    $('#example2').append('<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.address+'</td><td>'+response.data.phone+'</td><td><p style="width: 350px; height: fit-content;overflow: hidden;">'+response.data.ggmap+'</p></td>@if (Auth::user()->quyen == 1)<td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.address+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.address+'" style="color:red"><i class="fas fa-trash"></i></a></td>@endif</tr>');
                }
                $('#create').modal('hide');
                $.alert(response.message);
            },
            error: function(err)
            {
                $('.error').removeAttr('hidden');
                var jsondata = err.responseJSON;
                $('.error').text(jsondata.errors.ggmap);
                $('.error').text(jsondata.errors.phone);
                $('.error').text(jsondata.errors.address);
            }
        })
    });
    $(document).on('click', '.delete-modal', function (event) { 
        event.preventDefault();
        $('.error').attr("hidden",true);
        var id =$(this).attr('data-id');
        var name =$(this).attr('data-name');
        $.confirm({
            title: 'Thông báo',
            content: 'Bạn muốn xóa cửa hàng '+name,
            buttons: {
              confirm: {
                text: 'Có',
                btnClass: 'btn-blue',
                action: function()
                {
                  $.ajax({
                    type: 'DELETE',
                    url: 'admin/store/delete/'+id,
                    success: function(response)
                    {
                      $('#'+id).remove();
                      $.alert(response.message);
                    },
                    error: function(err){
                      $.alert('Xóa không thành công');
                    }
                  })
                }
              },
              Cancel: {
                text: 'Không',
                action: function(){ 

                }
              }
            }
          })
    }); 
    $(document).on('click', '.edit-modal', function (event) { 
        event.preventDefault();
        $('.error').attr("hidden",true);
        var id =$(this).attr('data-id');
        $.confirm({
            title: 'Thông báo',
            content: 'Bạn muốn sửa mục này ?',
            buttons: {
              confirm: {
                text: 'Có',
                btnClass: 'btn-blue',
                action: function()
                {
                  $('.error').attr("hidden",true);
                  $('#edit').modal('show');
                  $('.modal-title').text('Sửa cửa hàng');
                  $.ajax({
                    type: 'GET',
                    url: 'admin/store/edit/'+id,
                    success: function(response)
                    {
                        $('#btnedit').val(response.data.id);
                        $('#eaddress').val(response.data.address);
                        $('#ephone').val(response.data.phone);
                        $('#eggmap').val(response.data.ggmap);
                    },
                  })
                }
              },
              Cancel: {
                text: 'Không',
                action: function(){ 

                }
              }
            }
          })
    });
    $(document).on('click', '#btnedit', function (event) { 
        event.preventDefault();
        $('.error').attr("hidden",true);
        var id =$(this).val();
        var formData = new FormData(document.getElementById('editstore'));
        $.ajax({
            type: 'POST',
            url: 'admin/store/edit/'+id,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response)
            {
                if(response.code == 200)
                {
                    $('#'+id).remove();
                    $('#example2').append('<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.address+'</td><td>'+response.data.phone+'</td><td><p style="width: 350px; height: fit-content;overflow: hidden;">'+response.data.ggmap+'</p></td>@if (Auth::user()->quyen == 1)<td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.address+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.address+'" style="color:red"><i class="fas fa-trash"></i></a></td>@endif</tr>');
                }
                $('#edit').modal('hide');
                $.alert(response.message);
            },
            error: function(err)
            {
                $('.error').removeAttr('hidden');
                var jsondata = err.responseJSON;
                $('.error').text(jsondata.errors.eggmap);
                $('.error').text(jsondata.errors.ephone);
                $('.error').text(jsondata.errors.eaddress);
            }
        })
    });    
})
  </script>
@endsection

