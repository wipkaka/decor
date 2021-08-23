<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  method="POST"  id="adduser" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="fullname" >Tên: </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="fullname" name="fullname" required>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="name" >Tài khoản: </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="pass" >Mật khẩu: </label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
            </div>
            <p class="error text-center alert alert-danger" hidden></p>
        </form>
        </div>
        <div class="modal-footer">
          <button  class="btn btn-primary" id="add" type="submit">Thêm</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>