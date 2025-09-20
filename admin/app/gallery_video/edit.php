<?php
if (isset($_GET['id'])) {
  require '../../includes/db-config.php';
  require '../../includes/helper.php';
  $id = intval($_GET['id']);
  $galleryVideoQuery = $conn->query("SELECT * FROM gallery_video WHERE id = $id");
  $galleryVideoArr = $galleryVideoQuery->fetch_assoc();
}
?>

<div class="modal-header">
  <h3 class="modal-title">Edit Gallery</h3>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" role="form" id="form-edit-gallery" action="/admin/app/gallery_video/update" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= htmlspecialchars($galleryVideoArr['id']) ?>">

      <div class="row">
        <div class="col-md-12">
          <div class="form-group mb-3">
            <label class="form-label">Video Link</label>
            <div id="add_new_video_link">
              <div class="input-group mb-3">
                <input class="form-control video-link" placeholder="Video Link" value="<?= htmlspecialchars($galleryVideoArr['video_link']) ?>" name="video_links" required>
              </div>
            </div>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Position</label>
            <select class="form-control" name="position" required>
              <option value="">Select Position</option>
              <option value="left" <?= $galleryVideoArr['position'] == 'left' ? 'selected' : '' ?>>Left</option>
              <option value="right" <?= $galleryVideoArr['position'] == 'right' ? 'selected' : '' ?>>Right</option>
            </select>
          </div>
        </div>
        <div class="modal-footer clearfix text-end">
          <div class="col-md-4 m-t-10 sm-m-t-10">
            <button aria-label="" type="submit" class="btn btn-primary btn-cons btn-animated from-left">
              <span>Save</span>
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#form-edit-gallery').validate({
      errorPlacement: function(error, element) {
        if (element.is("select")) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      }
    });

    $("#form-edit-gallery").on("submit", function(e) {
      if ($('#form-edit-gallery').valid()) {
        $(':input[type="submit"]').prop('disabled', true);
        var formData = new FormData(this);
        $.ajax({
          url: this.action,
          type: 'post',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(data) {
            if (data.status == 200) {
              $('.modal').modal('hide');
              toastr.success(data.message, 'Success');
              $('#gallery_video-table').DataTable().ajax.reload(null, false);
            } else {
              $(':input[type="submit"]').prop('disabled', false);
              toastr.error(data.message, 'Error');
            }
          },
          error: function(xhr, status, error) {
            $(':input[type="submit"]').prop('disabled', false);
            toastr.error("An error occurred: " + error, 'Error');
          }
        });
        e.preventDefault();
      }
    });
  });
</script>
