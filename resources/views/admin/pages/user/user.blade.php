@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>USER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">User</li>
              <li class="breadcrumb-item active">Danh sách</li>
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
                <button style=" margin-bottom:10px" class="create-modal btn btn-success btn-sm"><i class="fas fa-plus"></i> Thêm User</button>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Tài khoản</th>
                      <th>Họ và Tên</th>
                      <th>Loại</th>
                      <th>Sửa</th>
                      <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $usr)
                    <tr id="{{ $usr->id }}">
                      <td>{{ $usr->id }}</td>
                      <td>{{ $usr->name }}</td>
                      <td>{{ $usr->fullname }}</td>
                      <th>@if ($usr->quyen == 1)Admin @else Normal @endif</th>
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="{{ $usr->id }}" data-name="{{ $usr->name }}"  style="color:blue"><i class="fas fa-edit"></i></a></td>
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="{{ $usr->id }}" data-name="{{ $usr->name }}" style="color:red"><i class="fas fa-trash"></i></a></td>
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
  @include('admin.pages.user.add')
  @include('admin.pages.user.edit')
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
        $(document).on('click','.create-modal',function(event){
            event.preventDefault();
            $('#create').modal('show');
            $('.form-horizontal').show();
            $('.error').attr("hidden",true);
            $('.modal-title').text('Thêm User mới');
        });
        $(document).on('click','#add',function(event){
            $('.error').attr("hidden",true);
            var formData = new FormData(document.getElementById('adduser'));
            $.ajax({
                type: 'POST',
                url: 'admin/user/them',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response)
                {
                    if(response.code==200)
                    {
                        $('#example2').append(' <tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td> <td>'+response.data.fullname+'</td><th>@if ('+response.data.quyen+'== 1)Admin @else Normal @endif</th><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'"  style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:red"><i class="fas fa-trash"></i></a></td></tr>')
                    }
                    $('#create').modal('hide');
                    $.alert(response.message);
                },
                error: function(err)
                {
                    $('.error').removeAttr('hidden');
                    var jsondata = err.responseJSON;
                    $('.error').text(jsondata.errors.pass);  
                    $('.error').text(jsondata.errors.name);
                    $('.error').text(jsondata.errors.fullname);
                }
            })
        });
        $(document).on('click','.delete-modal',function(event){
            event.preventDefault();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            $.confirm({
                title: 'Alert',
                content: 'Bạn muốn xóa tài khoản '+name,
                buttons: {
                    confirm: {
                        text: 'Có',
                        btnClass: 'btn-red',
                        action: function(){
                            $.ajax({
                                type: 'DELETE',
                                url: 'admin/user/xoa/'+id,
                                success: function(response)
                                {
                                    if(response.code == 100)
                                    {
                                        $.alert(response.message);
                                    }
                                    else{
                                        $('#'+id).remove();
                                        $.alert(response.message);
                                    }
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
        $(document).on('click','.edit-modal',function(event){
            event.preventDefault();
            var id = $(this).attr('data-id');
            $('.error').attr("hidden",true);
            $("#changepassword").prop( "checked", false );
            $('#epass').attr('disabled','');
            $('#epass').attr('placeholder','');
            $('#epass').val('');
            $('.modal-title').text('Sửa User');
            $.ajax({
                type: 'GET',
                url: 'admin/user/sua/'+id,
                success: function(response)
                {
                    $('#btnedit').val(response.data.id);
                    $('#efullname').val(response.data.fullname);
                    $('#ename').val(response.data.name);
                    $(".col-sm-12 select").val(response.data.quyen).change();
                    $('#edit').modal('show');
                }
            })
        });
        $(document).on('click','#btnedit',function(event){
            event.preventDefault();
            $('.error').attr("hidden",true);
            var id = $(this).val();
            var formData = new FormData(document.getElementById('edituser'));
            $.ajax({
                type: 'POST',
                url: 'admin/user/sua/'+id,
                data: formData,
                contentType:false,
                processData:false,
                success: function(response)
                {
                    if(response.code == 100)
                    {
                        $('.error').removeAttr('hidden');
                        $('.error').text(response.message);
                    }
                    if(response.code==200)
                    {
                        $('#'+id).remove();
                        $('#example2').append(' <tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td> <td>'+response.data.fullname+'</td><th>@if ('+response.data.quyen+'== 1)Admin @else Normal @endif</th><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'"  style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:red"><i class="fas fa-trash"></i></a></td></tr>')
                        $('#edit').modal('hide');
                         $.alert(response.message);
                    }
                },
                error: function(err)
                {
                    $('.error').removeAttr('hidden');
                    var jsondata = err.responseJSON;
                    $('.error').text(jsondata.errors.epass);  
                    $('.error').text(jsondata.errors.ename);
                    $('.error').text(jsondata.errors.efullname);
                }
            })
        });  
    })
</script>
@endsection