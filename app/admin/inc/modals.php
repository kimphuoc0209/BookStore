<!-- Thêm sản phẩm -->
<div class="modal fade" id="addProd">
  <div class="modal-dialog" style="max-width: 550px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dedModalLabel">Thêm sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/actions.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Tiêu đề</label>
            <input type="text" class="form-control" name="b-title">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="">Giá</label>
              <input type="text" class="form-control" name="b-price">
            </div>
            <div class="col-md-6">
              <label for="">Bìa sách</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="b-file" name="b-image">
                <label class="custom-file-label" for="b-file">Choose file</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Mô tả sách</label>
            <textarea name="b-descr" class="form-control"></textarea>
          </div>
	    </div>
	    <div class="modal-footer">
	     	<button class="btn btn-success" data-dismiss="modal">Đóng</button>
	      <button type="submit" class="btn btn-primary" id="prodBtn" name="save-prod">Thêm</button>
      </form>
      </div>
    </div>
  </div>
</div>


<!-- Thêm người dùng -->
<div class="modal fade" id="regUser">
  <div class="modal-dialog" style="max-width: 550px">
    <div class="modal-content">
      <div class="modal-header p-4">
        <h5 class="modal-title">Đăng ký người dùng mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <form action="includes/auth.php" method="POST">
          <div class="form-group row">
            <div class="col-md-6">
              <label for="">Họ</label>
              <input type="text" class="form-control" name="fname" required>
            </div>
            <div class="col-md-6">
              <label for="">Tên</label>
              <input type="text" class="form-control" name="lname" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="">Tên tài khoản</label>
              <input type="text" class="form-control" name="user" required>
            </div>
            <div class="col-md-6">
              <label for="">Email</label>
              <input type="text" class="form-control" name="email" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="">Vai trò</label>
              <select class="custom-select" name="role" required>
                <option value="admin">Chủ</option>
                <option value="staff">Nhân viên</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Mật khẩu</label>
              <input type="password" class="form-control" name="pass" required>
            </div>
          </div>
      </div>
      <div class="modal-footer p-4">
        <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> Đóng</button>
        <button type="submit" class="btn btn-primary" name="regBtn"><i class="fa fa-check-circle"></i> Đăng ký</button>
      </form>
      </div>
    </div>
  </div>
</div>