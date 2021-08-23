<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 150%">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  method="POST"  id="addnew" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="link" >Tiêu đề: </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="tieude" name="tieude" required>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="image" >Hình: </label>
                <div class="col-sm-12">
                      <input type="file"  id="image" name="image" required>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="link" >Tóm tắt: </label>
                <div class="col-sm-12">
                    <textarea type="text" class="form-control" id="tomtat" name="tomtat" required></textarea>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="link" >Nội dung: </label>
                <div class="col-sm-12">
                    <textarea type="text" class="ckeditor form-control" id="noidung" name="noidung" required></textarea>
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