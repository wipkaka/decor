<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  method="POST"  id="editslide" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="edit_link" >Link: </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="edit_link" name="edit_link" required>
                </div>
            </div>
            <div class="form-group row add">
                <label class="control-label col-sm-12" for="edit_image" >Hình: </label>
                <img id="hinh" src="" alt="" srcset="" width="100%">
                <div>&nbsp</div>
                <div class="col-sm-12">
                      <input type="file"  id="edit_image" name="edit_image">
                </div>
            </div>
            <p class="error text-center alert alert-danger" hidden></p>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnedit" value="" type="submit">Sửa</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>