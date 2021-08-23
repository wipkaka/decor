@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SẢN PHẨM</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Sản phẩm</li>
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
                <button style=" margin-bottom:10px" class="create-modal btn btn-success btn-sm"><i class="fas fa-plus"></i> Thêm Sản Phẩm</button>
                @endif
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Danh mục</th>
                      <th>Tên</th>
                      <th>Tóm Tắt</th>
                      <th style="width: 350px; height: fit-content;overflow: hidden;">Nội Dung</th>
                      <th></th>
                      <th>Hình</th>
                      @if (Auth::user()->quyen == 1)
                      <th>Sửa</th>
                      <th>Xóa</th>
                      @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sanpham as $sp)
                    <tr id="{{ $sp->id }}">
                      <td>{{ $sp->id }}</td>
                      <td>{{ $sp->danhmuc->name }}</td>
                      <td>{{ $sp->name }}</td>
                      <td>{{ $sp->tomtat }}</td>
                      <td ><p style="width: 350px; height: fit-content;overflow: hidden;">{{ $sp->noidung }}</p></td>
                      <td>@if ($sp->new == 1) Sản phẩm mới @else  @endif</td>
                      <td><img src="upload/sp/{{ $sp->hinh }}" alt="" srcset="" width="100%"></td>
                      @if (Auth::user()->quyen == 1)
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="{{ $sp->id }}" data-name="{{ $sp->name }}" style="color:blue"><i class="fas fa-edit"></i></a></td>
                      <td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="{{ $sp->id }}" data-name="{{ $sp->name }}" style="color:red"><i class="fas fa-trash"></i></a></td>
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
  @include('admin.pages.sanpham.add')
  @include('admin.pages.sanpham.edit')
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
            $(document).on('click','.create-modal', function(event){
                event.preventDefault();
                $('#create').modal('show');
                $('.form-horizontal').show();
                $("#new").prop( "checked", false );
                $('.modal-title').text('Thêm sản phẩm');
                $('.error').attr("hidden",true);
            });
            $(document).on('click',"#add",function(event){
                event.preventDefault();
                var formData = new FormData(document.getElementById('addproduct'));
                var data = CKEDITOR.instances.noidung.getData();
                formData.set('noidung',data);
                $.ajax({
                        url: 'admin/sanpham/them',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            if(response.code == 200)
                            {
                                var noidung = $('<div/>').text(response.data.noidung).html();
                                var news = '';
                                if(response.data.new == 1)
                                {
                                  news = 'Sản phẩm mới';
                                }
                                $('#example2').prepend('<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.dm.name+'</td><td>'+response.data.name+'</td><td>'+response.data.tomtat+'</td><td><p style="width: 350px; height: fit-content;overflow: hidden;">'+noidung+'</p></td><td>'+news+'</td><td><img src="upload/sp/'+response.data.hinh+'" alt="" srcset="" width="100%"></td><td>'+response.data.view+'</td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:red"><i class="fas fa-trash"></i></a></td></tr>')
                            }
                            $('#create').modal('hide');
                            $.alert(response.message);
                            $(document).scrollTo('#'+response.data.id);
                        },
                        error: function(err)
                        {
                            $('.error').removeAttr('hidden');
                            var jsondata = err.responseJSON;
                            $('.error').text(jsondata.errors.image);
                            $('.error').text(jsondata.errors.noidung);
                            $('.error').text(jsondata.errors.tomtat);
                            $('.error').text(jsondata.errors.name);
                              
                        }
                    })
            });
            $(document).on('click','.delete-modal',function(event){
                event.preventDefault();
                var id =$(this).attr('data-id');
                var name =$(this).attr('data-name');
                $.confirm({
                    title: 'Alert',
                     content: 'Bạn muốn xóa sản phẩm '+name,
                     buttons:{
                     confirm:{
                        text: 'Có',
                        btnClass: 'btn-red',
                        action: function(){
                            $.ajax({
                                url: 'admin/sanpham/xoa/'+id,
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
               var id =$(this).attr('data-id');
                $('.error').attr("hidden",true);
                $("#enew").prop( "checked", false );
                $('.modal-title').text('Sửa tin tức');
                $.ajax({
                        type: 'GET',
                        url: 'admin/sanpham/sua/'+id,
                        success: function(response){
                            $('#btnedit').val(response.data.id);
                            $(".col-sm-12 select").val(response.data.idDanhmuc).change();
                            $('#ename').val(response.data.name);
                            $('#etomtat').val(response.data.tomtat);
                            if(response.data.new == 1)
                            {
                              $("#enew").prop( "checked", true );
                            }
                            $('#hinh').attr('src','upload/sp/'+response.data.hinh);
                            CKEDITOR.instances.enoidung.setData(response.data.noidung);
                            $('#edit').modal('show');
                        }
                    })
            });
            $(document).on('click','#btnedit',function(event){
               event.preventDefault();
               var id =$(this).val();
                $('.error').attr("hidden",true);
                event.preventDefault();
                var formData = new FormData(document.getElementById('editproduct'));
                var data = CKEDITOR.instances.enoidung.getData();
                formData.set('enoidung',data);
                $.ajax({
                        url: 'admin/sanpham/sua/'+id,
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            if(response.code == 200)
                            {
                                $('#'+id).remove();
                                var noidung = $('<div/>').text(response.data.noidung).html();
                                var news = '';
                                if(response.data.new == 1)
                                {
                                  news = 'Sản phẩm mới';
                                }
                                var elem = $('#'+id);
                                $('#example2').prepend('<tr id="'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.dm.name+'</td><td>'+response.data.name+'</td><td>'+response.data.tomtat+'</td><td><p style="width: 350px; height: fit-content;overflow: hidden;">'+noidung+'</p></td><td>'+news+'</td><td><img src="upload/sp/'+response.data.hinh+'" alt="" srcset="" width="100%"></td><td>'+response.data.view+'</td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="edit-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:blue"><i class="fas fa-edit"></i></a></td><td class="center" style="text-align: center;font-size: 20px;"><a href="javascript:void(0)"  class="delete-modal btn btn-warning btn-sm" data-id="'+response.data.id+'" data-name="'+response.data.name+'" style="color:red"><i class="fas fa-trash"></i></a></td></tr>');
                            }
                            $('#edit').modal('hide');
                            $.alert(response.message);
                        },
                        error: function(err)
                        {
                            $('.error').removeAttr('hidden');
                            var jsondata = err.responseJSON;
                            $('.error').text(jsondata.errors.eimage);
                            $('.error').text(jsondata.errors.enoidung);
                            $('.error').text(jsondata.errors.etomtat);
                            $('.error').text(jsondata.errors.ename);
                              
                        }
                    })
            });
        })
    </script>
@endsection