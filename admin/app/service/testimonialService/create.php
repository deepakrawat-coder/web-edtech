<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');
?>

<div class="modal-header">
  <h3 class="modal-title">Add Testimonials</h3>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" role="form" id="form-add-testimonialService"
      action="/admin/app/service/testimonialService/store"
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
        <div class="mb-3 col-md-6">
          <label class="form-label">Select Products <span class="text-danger">*</span></label>
          <select class="form-control select2" name="products_id" required>
            <option value="" disabled selected> Select Product</option>
            <?php
            $products = mysqli_query($conn, "SELECT id, name FROM products WHERE status = 1 ORDER BY name ASC");
            while ($row = mysqli_fetch_assoc($products)) {
              echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
          </select>
        </div>
        <!-- Image Name -->
        <div class="mb-3 col-md-6">
          <label class="form-label">Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" placeholder="Enter a Image Name.." required>
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label">Tile <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="title" placeholder="Enter a Image Name.." required>
        </div>
        <div class="mb-3 col-md-6 syllabus_file">
          <label class="form-label">Photo</label>
          <input type="file" name="image" id="photo" class="form-control"
            accept="image/png, image/jpg, image/jpeg, image/svg,image/avif">
        </div>
        <div class="mb-3 col-md-12">
          <label class="form-label">Message <span class="text-danger">*</span></label>
          <!-- <input type="text" class="form-control" name="title" placeholder="Enter a Image Name.." required> -->
          <div class="">
            <textarea class="ckeditor" cols="80" id="editor" name="editor" rows="10" required></textarea>
          </div>
        </div>

        <!-- File Upload -->


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

    // Initialize CKEditor
    $('.ckeditor').each(function() {
      CKEDITOR.replace(this);
    });

    $('#form-add-testimonialService').validate({
      rules: {
        'name': {
          required: true
        },
        'title': {
          required: true
        },
        'products_id': {
          required: true
        }
      },
      messages: {
        'name': {
          required: "Please enter name"
        },
        'title': {
          required: "Please enter title"
        },
        'products_id': {
          required: "Please select product"
        }
      },
      submitHandler: function(form) {
        $(':input[type="submit"]').prop('disabled', true);

        // Update textarea with CKEditor content
        for (var instance in CKEDITOR.instances) {
          // Sync editor content into textarea
          CKEDITOR.instances[instance].updateElement();
          // Get editor content as string (HTML)
          var editorContent = CKEDITOR.instances[instance].getData();         
          var textOnly = $("<div>").html(editorContent).text();         
          if (textOnly.length > 273) {
            toastr.error("Message cannot be more than 273 characters");
            return false; // stop form submit
          }
        }
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
            $(':input[type="submit"]').prop('disabled', false);
            if (data.status == 200) {
              $('.modal').modal('hide');
              toastr.success(data.message, 'Success');
              $('#testimonialService-table').DataTable().ajax.reload(null, false);
            } else {
              toastr.error(data.message, 'Error');
            }
          },
          error: function(xhr, status, error) {
            $(':input[type="submit"]').prop('disabled', false);
            toastr.error("Something went wrong!", 'Error');
          }
        });

        return false; // prevent normal submit
      }
    });
  });
</script>