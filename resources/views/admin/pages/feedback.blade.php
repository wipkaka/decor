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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Tên</th>
                      <th>Số điện thoại</th>
                      <th>Nội dung</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($feedback as $fb)
                    <tr id="{{ $fb->id }}">
                      <td>{{ $fb->id }}</td>
                      <td>{{ $fb->name }}</td>
                      <td>{{ $fb->phone }}</td>
                      <td>{{ $fb->content }}</td>
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
@endsection