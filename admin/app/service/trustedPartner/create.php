<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');
?>

<div class="modal-header">
  <h3 class="modal-title">Add Service Trusted Client </h3>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" role="form" id="form-add-trustedPartner"
      action="/admin/app/service/trustedPartner/store"
      method="POST" enctype="multipart/form-data">
      <div class="row">

        <!-- Products Multi-select -->
        <!-- <div class="mb-3 col-md-12">
          <label class="form-label">Select Products <span class="text-danger">*</span></label>
          <select class="form-control select2" name="products_id[]" multiple required>
            <?php
            $products = mysqli_query($conn, "SELECT id, name FROM products WHERE status = 1 ORDER BY name ASC");
            while ($row = mysqli_fetch_assoc($products)) {
              echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
          </select>
        </div> -->
        <div class="mb-3 col-md-12">
          <label class="form-label">Select Products <span class="text-danger">*</span></label>
          <select class="form-control select2" name="products_id" required>
            <?php
            $products = mysqli_query($conn, "SELECT id, name FROM products WHERE status = 1 ORDER BY name ASC");
            while ($row = mysqli_fetch_assoc($products)) {
              echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
          </select>
        </div>
        <!-- Image Name -->
        <div class="mb-3 col-md-12">
          <label class="form-label"> Trusted Client Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" placeholder="Enter a Trusted Client Name.." required>
        </div>
 <div class="mb-3 col-md-12 d-flex flex-column">
          <label class="form-label">Trusted Client Image</label>
          <label class="custom-image-upload w-100" for="image">
            <span class="placeholder">Click or Drag & Drop to upload image size (210x75)</span>
            <img id="previewImage" alt="Preview">
            <input type="file" name="image" id="image"
              accept="image/png, image/jpg, image/jpeg, image/svg, image/avif"
              onchange="previewFile(this)">
          </label>
        </div>
        <!-- File Upload -->
        <!-- <div class="mb-3 col-md-12 syllabus_file">
          <label class="form-label">Photo</label>
          <input type="file" name="images" id="photo" class="form-control"
            onchange="fileValidation('photo')"
            accept="image/png, image/jpg, image/jpeg, image/svg,image/avif">
        </div> -->

        <!-- Submit -->
        <div class="modal-footer clearfix text-end">
          <div class="col-md-4 m-t-10 sm-m-t-10">
            <button type="submit" class="btn btn-primary btn-cons btn-animated from-left">
              <span>Save</span>
            </button>
          </div>
        </div>

      </div>
    </form>
  </div>
</div>

<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- Select2 -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<script>
  $(document).ready(function() {

    // $('.select2').select2({
    //   placeholder: "Select products",
    //   allowClear: true,
    //   width: '100%',
    //   dropdownParent: $('#form-add-trustedPartner').closest('.modal') 
    // });

    // Form validation + AJAX submit
    $('#form-add-trustedPartner').validate({
      rules: {
        // 'products_id[]': { required: true },
        'image_names': {
          required: true
        }
      },
      messages: {
        // 'products_id[]': { required: "Please select at least one product" },
        'image_names': {
          required: "Please enter image name"
        }
      },
      // errorPlacement: function (error, element) {
      //   if (element.hasClass("select2-hidden-accessible")) {
      //     error.insertAfter(element.next('.select2')); // show error below Select2
      //   } else {
      //     error.insertAfter(element);
      //   }
      // },
      submitHandler: function(form) {
        $(':input[type="submit"]').prop('disabled', true);
        var formData = new FormData(form);
        $.ajax({
          url: form.action,
          type: 'POST',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(data) {
            if (data.status == 200) {
              $('.modal').modal('hide');
              toastr.success(data.message, 'Success');
              $('#trustedPartner-table').DataTable().ajax.reload(null, false);
            } else {
              $(':input[type="submit"]').prop('disabled', false);
              toastr.error(data.message, 'Error');
            }
          }
        });
        return false; // prevent normal submit
      }
    });
  });

  // File Validation
  function fileValidation(id) {
    var fi = document.getElementById(id);
    if (fi.files.length > 0) {
      for (var i = 0; i <= fi.files.length - 1; i++) {
        var fsize = fi.files.item(i).size;
        var file = Math.round((fsize / 1024));
        if (file >= 500) {
          $('#' + id).val('');
          toastr.error("File too Big, each file should be less than or equal to 500KB");
        }
      }
    }
  }
</script>