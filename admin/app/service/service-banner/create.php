<?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php'); ?>

<div class="modal-header">
  <h3 class="modal-title">Add Category Plains</h3>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" role="form" id="form-add-plains_category" action="/admin/app/service/service-banner/store" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="mb-3 col-md-12">
          <label class="form-label">Select Products <span class="text-danger">*</span></label>
          <select class="form-control select2" name="product_id" required>
            <option value="" disabled selected> Select Product</option>
            <?php
            $products = mysqli_query($conn, "SELECT id, name FROM products WHERE status = 1 ORDER BY name ASC");
            while ($row = mysqli_fetch_assoc($products)) {
              echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
          </select>
        </div>
        <div class="mb-3 col-md-12">
          <label class="form-label">Heading
            <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="heading" placeholder="Enter a plains_category Name.." required>
        </div>
         <div class="mb-3 col-md-12">
          <label class="form-label">Hightlight Heading
            <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="highlight_heading" placeholder="Enter a plains_category Name.." required>
        </div>
        <div class="mb-3 col-md-12">
          <label class="form-label">Sub-Heading
            <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="sub_heading" placeholder="Enter a plains_category Name.." required>
        </div>
        <div class="mb-3 col-md-12 d-flex flex-column">
          <label class="form-label">Banner Image</label>
          <label class="custom-image-upload w-100" for="image">
            <span class="placeholder">Click or Drag & Drop to upload image size (1273x580)</span>
            <img id="previewImage" alt="Preview">
            <input type="file" name="image" id="image"
              accept="image/png, image/jpg, image/jpeg, image/svg, image/avif"
              onchange="previewFile(this)">
          </label>
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
    $('.ckeditor').each(function() {
      CKEDITOR.replace(this);
    });
    $('#form-add-plains_category').validate({
      errorPlacement: function(error, element) {
        if (element.is("select")) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      }
    });

    $("#form-add-plains_category").on("submit", function(e) {
      if ($('#form-add-plains_category').valid()) {
        $(':input[type="submit"]').prop('disabled', true);
        for (var instance in CKEDITOR.instances) {
          // Sync editor content into textarea
          CKEDITOR.instances[instance].updateElement();
          // Get editor content as string (HTML)
          var editorContent = CKEDITOR.instances[instance].getData();
        }
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
              $('#service-banner-table').DataTable().ajax.reload(null, false);
            } else {
              $(':input[type="submit"]').prop('disabled', false);
              toastr.error(data.message, 'Error');
            }
          }
        });
        e.preventDefault();
      }
    });
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