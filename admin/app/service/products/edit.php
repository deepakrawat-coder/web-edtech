<?php
if (isset($_GET['id'])) {
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');
  $id = intval($_GET['id']);
  $galleryArr = $conn->query("SELECT * FROM products WHERE ID = $id");
  $galleryArr = $galleryArr->fetch_assoc();
}
?>

<div class="modal-header">
  <h3 class="modal-title">Edit Service Products</h3>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" role="form" id="form-add-blogs" action="/admin/app/service/products/update" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $galleryArr['id'] ?>">
      <div class="row">
        <div class="mb-3 col-md-12">
          <label class="form-label">Name
            <span class="text-danger">*</span></label>
          <input type="text" class="form-control" value="<?= $galleryArr['name'] ?>" name="name" placeholder="Enter a Image Name.." required>
        </div>     
        <div class="modal-footer clearfix text-end">
          <div class="col-md-4 m-t-10 sm-m-t-10">
            <button aria-label="" type="submit" class="btn btn-primary btn-cons btn-animated from-left">
              <span>Update</span>
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>



<script>
  $(function() {
    $('#form-add-blogs').validate({
      errorPlacement: function(error, element) {
        if (element.is("select")) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      }
    });
  })

  $("#form-add-blogs").on("submit", function(e) {
    if ($('#form-add-blogs').valid()) {
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
            $('#products-table').DataTable().ajax.reload(null, false);
          } else {
            $(':input[type="submit"]').prop('disabled', false);
            toastr.error(data.message, 'Error');
          }
        }
      });
      e.preventDefault();
    }
  });
</script>

<script>
  function fileValidation(id) {
    var fi = document.getElementById(id);
    if (fi.files.length > 0) {
      for (var i = 0; i <= fi.files.length - 1; i++) {
        var fsize = fi.files.item(i).size;
        var file = Math.round((fsize / 1024));
        // The size of the file.
        if (file >= 500) {
          $('#' + id).val('');
          // alert("File too Big, each file should be less than or equal to 500KB");
          toastr.error("File too Big, each file should be less than or equal to 500KB");
        }
      }
    }
  }
</script>