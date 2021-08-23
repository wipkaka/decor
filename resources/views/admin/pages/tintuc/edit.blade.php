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
          <form  method="POST"  id="editnew" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="etieude" >Tiêu đề: </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="etieude" name="etieude" required>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="eimage" >Hình: </label>
                <img id="hinh" src="" alt="" srcset="" width="100%">
                <div>&nbsp;</div>
                <div class="col-sm-12">
                      <input type="file"  id="eimage" name="eimage" required>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="etomtat" >Tóm tắt: </label>
                <div class="col-sm-12">
                    <textarea type="text" class="form-control" id="etomtat" name="etomtat" required> </textarea>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="enoidung" >Nội dung: </label>
                <div class="col-sm-12">
                    <textarea type="text" class="form-control" id="enoidung" name="enoidung" required>
                        
                    </textarea>
                </div>
            </div>
            <p class="error text-center alert alert-danger" hidden></p>
        </form>
        </div>
        <div class="modal-footer">
          <button  class="btn btn-primary" id="btnedit" val="" type="submit">Sửa</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>