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
              <li class="breadcrumb-item">Config</li>
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
            <form>
              {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                <div class="card-body">
                  <p class="error text-center alert alert-danger" hidden></p>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" required value="{{ $cfg->address }}"> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" required pattern="([0])([3,5,7,8,9])([0-9]{8})\b" title="Số điện thoại không hợp lệ." value="{{ $cfg->phone }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ $cfg->email }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Link Logo:</label>
                    <img src="{{$cfg->logo}}" alt="">
                    <div>&nbsp;</div>
                    <input type="text" class="form-control" id="logo" name="logo" required value="{{ $cfg->logo }}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="btnedit" value="{{ $cfg->id}}" class="btn btn-primary">Sửa</button>
                </div>
              </form>    
            <div>&nbsp;</div>
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
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      $('.error').attr("hidden",true);
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $(document).on('click', '#btnedit', function (event) 
      { 
          event.preventDefault();
          $('.error').attr("hidden",true);
          $.confirm({
            title: 'Thông báo',
            content: 'Bạn muốn sửa mục này ?',
            buttons: {
              confirm: {
                text: 'Có',
                btnClass: 'btn-blue',
                action: function()
                {
                  $.ajax({
                    type: 'POST',
                    url: 'admin/config',
                    data: {
                      address: $('#address').val(),
                      phone: $('#phone').val(),
                      email: $('#email').val(),
                      logo: $('#logo').val(),
                    },
                    success: function(response)
                    {
                      if(response.code == 200)
                      {
                        $('#address').val(response.data.address);
                        $('#phone').val(response.data.phone);
                        $('#email').val(response.data.email);
                        $('#logo').val(response.data.logo);
                      }
                      $.alert(response.message);
                    },
                    error: function(err){
                      $('.error').removeAttr('hidden');
                      var jsondata = err.responseJSON;
                      $('.error').text(jsondata.errors.logo);
                      $('.error').text(jsondata.errors.email);
                      $('.error').text(jsondata.errors.phone);
                      $('.error').text(jsondata.errors.address);
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
      })
    })
  </script>
@endsection
