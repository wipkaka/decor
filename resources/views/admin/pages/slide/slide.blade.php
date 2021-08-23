@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SLIDE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Slides</li>
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
                <button style=" margin-bottom:10px" class="create-modal btn btn-success btn-sm"><i class="fas fa-plus"></i> Thêm Slide</button>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Link</th>
                      <th>Hình</th>
                      <th>Sửa</th>
                      <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($slide as $sl)
                    <tr id="{{ $sl->id }}">
                      <td>{{ $sl->id }}</td>
                      <td>{{ $sl->link }}</td>
                      <td><img src="upload/slide/{{ $sl->hinh }}" alt="" srcset="" width="100%"></td>
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="{{ $sl->id }}"  style="color:blue"><i class="fas fa-edit"></i></a></td>
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="{{ $sl->id }}"  style="color:red"><i class="fas fa-trash"></i></a></td>
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
  @include('admin.pages.slide.add')
  @include('admin.pages.slide.edit')
</div>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $(document).ready(function(){
            $(document).on('click','.create-modal',function(){
                 $('#create').modal('show');
                $('.form-horizontal').show();
                 $('.error').attr("hidden",true);
                $('.modal-title').text('Thêm Slide');
            })
            $(document).on('click','#add',function(event){
                event.preventDefault();
                var formData = new FormData(document.getElementById('addslide'));
                $('.error').attr("hidden",true);
                $.ajax({
                    url: 'admin/slide/them',
                    type: 'POST',
                    data:formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                      if(response.code == 200)
                        {
                          $('#example2').append('<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.link+'</td><td><img src="upload/slide/'+response.data.hinh+'" alt="" srcset="" width="100%"></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" style="color:red"><i class="fas fa-trash"></i></a></td></tr>');
                        }
                        $('#link').val('');
                        $('#create').modal('hide');
                        $.alert(response.message);  
                    },
                    error: function(err)
                    {
                        $('.error').removeAttr('hidden');
                        var jsondata = err.responseJSON;
                        $('.error').text(jsondata.errors.image);
                        $('.error').text(jsondata.errors.link);
                    }
                })
            });
            $(document).on('click','.delete-modal',function(event){ 
                event.preventDefault();
                var id = $(this).attr('data-id');
                $.confirm({
                    title: 'Alert',
                    content: 'Bạn muốn xóa Slide có id là: '+id,
                    buttons:{
                        confirm: {
                          text: 'Có',
                          btnClass: 'btn-red',
                          action: function () {
                              $.ajax({
                                type: 'DELETE',
                                url: 'admin/slide/xoa/'+id,
                                success: function(response)
                                {
                                  $('#'+id).remove();
                                  $.alert(response.message);
                                }
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
                $('#link').val('');
                $('#image').val('');
                $('#hinh').attr('src','');
                $('.error').attr("hidden",true);
                $('.modal-title').text('Sửa slide');
                var id = $(this).attr('data-id');
                $.ajax({
                  type: 'GET',
                  url: 'admin/slide/sua/'+id,
                  success: function(response){
                      $('#btnedit').val(response.data.id);
                      $('#edit_link').val(response.data.link);
                      $('#hinh').attr('src','upload/slide/'+response.data.hinh);
                      $('#edit').modal('show');
                  }
                })
            });
            $(document).on('click','#btnedit',function(event){
                event.preventDefault();
                $('.error').attr("hidden",true);
                var id = $(this).val();
                let formData = new FormData(document.getElementById('editslide'));
                $.ajax({
                  type: 'POST',
                  url: 'admin/slide/sua/'+id,
                  data:formData,
                  contentType: false,
                  processData: false,
                  success: function(response){
                    if(response.code == 200){
                      $('#'+id).remove();
                      $('#example2').append('<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.link+'</td><td><img src="upload/slide/'+response.data.hinh+'" alt="" srcset="" width="100%"></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" style="color:red"><i class="fas fa-trash"></i></a></td></tr>');
                    }
                    $('#edit').modal('hide');
                    $.alert(response.message);
                  },
                  error: function(err){
                    $('.error').removeAttr('hidden');
                    var jsondata = err.responseJSON;
                    $('.error').text(jsondata.errors.edit_link);
                    $('.error').text(jsondata.errors.edit_image);
                  }
                })
            })
        })
    </script>
@endsection