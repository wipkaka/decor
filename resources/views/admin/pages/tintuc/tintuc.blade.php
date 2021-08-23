@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TIN TỨC</h1>
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
                <button style=" margin-bottom:10px" class="create-modal btn btn-success btn-sm"><i class="fas fa-plus"></i> Thêm tin mới</button>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Tiêu Đề</th>
                      <th>Hình</th>
                      <th>Tóm Tắt</th>
                      <th>Nội Dung</th>
                      <th>Sửa</th>
                      <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tintuc as $tt)
                    <tr id="{{ $tt->id }}">
                      <td>{{ $tt->id }}</td>
                      <td>{{ $tt->tieude }}</td>
                      <td><img src="upload/tintuc/{{ $tt->hinh }}" alt="" srcset="" width="100%"></td>
                      <td>{!! $tt->tomtat !!}</td>
                      <td>{{ $tt->noidung }}</td>
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="{{ $tt->id }}" data-tieude="{{ $tt->tieude }}"   style="color:blue"><i class="fas fa-edit"></i></a></td>
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="{{ $tt->id }}" data-tieude="{{ $tt->tieude }}" style="color:red"><i class="fas fa-trash"></i></a></td>
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
  @include('admin.pages.tintuc.add')
  @include('admin.pages.tintuc.edit')
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
                    $('.modal-title').text('Thêm tin mới');
                });
                $(document).on('click', '#add' ,function(event){
                    event.preventDefault();
                    $('.error').attr("hidden",true);
                    var formData = new FormData(document.getElementById('addnew'));
                    var data = CKEDITOR.instances.noidung.getData();
                    formData.set('noidung',data);
                    $.ajax({
                        url: 'admin/news/them',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            if(response.code == 200)
                            {
                                $('#example2').append('<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.tieude+'</td><td><img src="upload/tintuc/'+response.data.hinh+'" alt="" srcset="" width="100%"></td><td>'+response.data.tomtat+'</td><td>'+response.data.noidung+'</td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-tieude="'+response.data.tieude+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-tieude="'+response.data.tieude+'" style="color:red"><i class="fas fa-trash"></i></a></td></tr>');
                            }
                            $('#create').modal('hide');
                            $.alert(response.message);
                        },
                        error: function(err)
                        {
                            $('.error').removeAttr('hidden');
                            var jsondata = err.responseJSON;
                            $('.error').text(jsondata.errors.tomtat);
                            $('.error').text(jsondata.errors.image);
                            $('.error').text(jsondata.errors.tieude);
                            $('.error').text(jsondata.errors.noidung);  
                        }
                    })
                });
                $(document).on('click','.delete-modal',function(event){
                    event.preventDefault();
                    var id = $(this).attr('data-id');
                    var tieude = $(this).attr('data-tieude');
                    $.confirm({
                        title: 'Alert',
                        content: 'Bạn muốn xóa tin tức '+tieude,
                        buttons:{
                            confirm:{
                                text: 'Có',
                                btnClass: 'btn-red',
                                action: function(){
                                    $.ajax({
                                        url: 'admin/news/xoa/'+id,
                                        type: 'DELETE',
                                        success: function(response){
                                            $('#'+id).remove();
                                            $.alert(response.message);
                                        }
                                    })
                                }
                            },
                            cancel: {
                                text: 'Không',
                                action: function(){

                                }
                            }
                        }    
                    })
                });
                $(document).on('click','.edit-modal',function(event){
                    event.preventDefault();
                    $('.error').attr("hidden",true);
                    $('.modal-title').text('Sửa tin tức');
                    var id = $(this).attr('data-id');
                    $.ajax({
                        type: 'GET',
                        url: 'admin/news/sua/'+id,
                        success: function(response){
                            $('#btnedit').val(response.data.id);
                            $('#etieude').val(response.data.tieude);
                            $('#hinh').attr('src','upload/tintuc/'+response.data.hinh);
                            $('#etomtat').val(response.data.tomtat);
                            CKEDITOR.instances.enoidung.setData(response.data.noidung);
                            $('#edit').modal('show');
                        }
                    })
                });
                $(document).on('click','#btnedit',function(){
                    event.preventDefault();
                    $('.error').attr("hidden",true);
                    var id = $(this).val();
                    var formData = new FormData(document.getElementById('editnew'));
                    var data = CKEDITOR.instances.enoidung.getData();
                    formData.set('enoidung',data);
                    $.ajax({
                        type: 'POST',
                        url: 'admin/news/sua/'+id,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response)
                        {
                            if(response.code == 200){
                                $('#'+id).remove();
                                $('#example2').append('<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.tieude+'</td><td><img src="upload/tintuc/'+response.data.hinh+'" alt="" srcset="" width="100%"></td><td>'+response.data.tomtat+'</td><td>'+response.data.noidung+'</td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-tieude="'+response.data.tieude+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-tieude="'+response.data.tieude+'" style="color:red"><i class="fas fa-trash"></i></a></td></tr>');
                            }
                            $('#edit').modal('hide');
                             $.alert(response.message);
                        },
                        error: function(err)
                        {
                            $('.error').removeAttr('hidden');
                            var jsondata = err.responseJSON;
                            $('.error').text(jsondata.errors.etomtat);
                            $('.error').text(jsondata.errors.eimage);
                            $('.error').text(jsondata.errors.etieude);
                            $('.error').text(jsondata.errors.enoidung);  
                        },
                    })
                })
            })
    </script>
@endsection