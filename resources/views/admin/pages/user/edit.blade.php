<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 150%">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  method="POST"  id="edituser" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group row add">
                    <label class="control-label col-sm-12" for="efullname" >Tên: </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="efullname" name="efullname" required>
                    </div>
                </div>
                <div class="form-group row add">
                    <label class="control-label col-sm-12" for="ename" >Tài khoản: </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="ename" name="ename" disabled>
                    </div>
                </div>
                <div class="form-group row add">
                    <div class="col-sm-12">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="changepassword" name="changepassword">
                        <label class="form-check-label" for="changepassword" style="font-weight: bold">Đổi mật khẩu: </label>
                      </div>
                        <input type="password" class="form-control" id="epass" name="epass" required placeholder="" disabled=''>
                    </div>
                </div>
                <div class="form-group row add">
                    <label class="control-label col-sm-12" for="equyen" >Loại tài khoản: </label>
                    <div class="col-sm-12">
                        <select class="form-control" id="equyen" name="equyen">
                            <option value="1">Admin</option>
                            <option value="0">Nomal</option>
                          </select>
                    </div>
                </div>
                <p class="error text-center alert alert-danger"></p>
            </form>
        </div>
        <div class="modal-footer">
          <button  class="btn btn-primary" id="btnedit" val="" type="submit">Sửa</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>