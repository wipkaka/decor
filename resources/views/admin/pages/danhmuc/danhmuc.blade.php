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
              <li class="breadcrumb-item">Danh mục</li>
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
                <button style=" margin-bottom:10px; width:" class="create-modal btn btn-success btn-sm"><i class="fas fa-plus"></i> Thêm danh mục</button>
                @endif
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Tên</th>
                      <th>Tên không dấu</th>
                      @if (Auth::user()->quyen == 1)
                      <th>Sửa</th>
                      <th>Xóa</th>
                      @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($danhmuc as $dm)
                    <tr id="{{ $dm->id }}">
                      <td>{{ $dm->id }}</td>
                      <td>{{ $dm->name }}</td>
                      <td>{{ $dm->TenKhongDau }}</td>
                      @if (Auth::user()->quyen == 1)
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="{{ $dm->id }}" data-name="{{ $dm->name }}" style="color:blue"><i class="fas fa-edit"></i></a></td>
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="{{ $dm->id }}" data-name="{{ $dm->name }}" style="color:red"><i class="fas fa-trash"></i></a></td>
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
  @include('admin.pages.danhmuc.add')
  @include('admin.pages.danhmuc.edit')
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
      $('.create-modal').click(function(){ 
        $('.error').attr("hidden",true);
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Thêm danh mục');
      });
      $('#add').click(function(){
        $('.error').attr("hidden",true);
        $.ajax({
          type: 'POST',
          url: 'admin/danhmuc/them',
          data: {
            name : $('input[name=name]').val(),
            _tokenn: $('meta[name=csrf-token]').attr('content')
          },
          success: function(response){
              if(response.code == 200){
                $('#example2').append(
                  '<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td><td>'+response.data.TenKhongDau+'</td>@if (Auth::user()->quyen == 1)<td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)" class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)" class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:red"><i class="fas fa-trash"></i></a></td> @endif</tr>'
                );
              }
              $('#name').val(''); 
              $('#create').modal('hide');
              $.alert(response.message);
          },
          error: function(err)
          {
            $('.error').removeAttr('hidden');
            var jsondata = err.responseJSON;
           $('.error').text(jsondata.errors.name[0]);
          },
        });   
      });
      $(document).on('click','.delete-modal',function(event){
        event.preventDefault();
        var id = $(this).attr('data-id');
        var name =$(this).attr('data-name')
        $.confirm({
                    title: 'Alert',
                    content: 'Bạn muốn xóa danh mục: '+name,
                    buttons:{
                        confirm: {
                          text: 'Có',
                          btnClass: 'btn-red',
                          action: function () {
                              $.ajax({
                              url: 'admin/danhmuc/xoa/'+id,
                              type: 'DELETE',
                              data:{
                                _tokenn: $('meta[name=csrf-token]').attr('content')
                              },
                              success: function(response){
                                if(response.code == 100)
                                {
                                  $.alert(response.message);
                                }
                                else
                                {
                                $('#'+id).remove();
                                $.alert(response.message);
                                }
                              },
                            })
                          }
                      },
                      Cancel:{
                        text: 'Không',
                        action:  function(){
                        
                        }
                      },
                    }
                })
      });
      $(document).on('click','.edit-modal',function(event){
        event.preventDefault();
        $('.error').attr("hidden",true);
        var id = $(this).attr('data-id');
        $('#name').val('');
        $.ajax({
          url: 'admin/danhmuc/sua/'+id,
          type: 'GET',
          success: function(response){
            $('#edit_name').val(response.data.name);
            $('.modal-title').text('Sửa danh mục');
            $('#btnedit').val(id);
            $('#edit').modal('show');
          }
        })
      })
      $('#btnedit').click(function(){
        var id = $(this).val();
        $('.error').attr("hidden",true);
        $.ajax({
          type: 'POST',
          url: 'admin/danhmuc/sua/'+id,
          data: {
            name : $('input[name=edit_name]').val(),
            _tokenn: $('meta[name=csrf-token]').attr('content')
          },
          success: function(response){
            if(response.code == 200){
              $('#'+id).remove();
              $('#example2').append(
                '<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td><td>'+response.data.TenKhongDau+'</td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)" class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)" class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:red"><i class="fas fa-trash"></i></a></td></tr>'
              );
              $('#edit').modal('hide');
              $.alert(response.message);
            }
          },
          error: function(err)
          {
            $('.error').removeAttr('hidden');
            var jsondata = err.responseJSON;
           $('.error').text(jsondata.errors.name[0]);
          },
        });   
      });
  });
</script>
@endsection