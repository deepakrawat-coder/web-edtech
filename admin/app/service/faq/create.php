<?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php'); ?>

<div class="modal-header">
  <h5 class="modal-title">Add Service faq</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal">
  </button>
</div>


<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" role="form" id="form-add-faq" action="/admin/app/service/faq/store" method="POST" enctype="multipart/form-data">

      <div class="mb-3 col-md-12">
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


      <div class="mb-3 col-md-12">
        <label class="form-label">Question
          <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="questions" placeholder="Enter a Question.." required>
      </div>

      <div class="mb-3 col-md-12 ">
        <label class="form-label">Answers <span class="text-danger">*</span></label>
        <textarea class="ckeditor" cols="80" id="editor" name="answers" rows="10" required></textarea>
        <span id="content-error" style="color:#b91e1e;font-weight: 500;font-size: 12px;"></span>
      </div>
      <div class=" modal-footer clearfix text-end">
        <div class="col-md-4 m-t-10 sm-m-t-10">
          <button aria-label="" type="submit" class="btn btn-primary btn-cons btn-animated from-left">
            <span>Save</span>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $(function() {
    $('#form-add-faq').validate({
      rules: {
        questions: {
          required: true
        },
        answers: {
          required: true
        },
        products_id: {
          required: true
        }
      },
      highlight: function(element) {
        $(element).addClass('error');
        $(element).closest('.form-control').addClass('has-error');
      },
      unhighlight: function(element) {
        $(element).removeClass('error');
        $(element).closest('.form-control').removeClass('has-error');
      }
    });
  })

  $("#form-add-faq").on("submit", function(e) {
    if ($('#form-add-faq').valid()) {
      // $(':input[type="submit"]').prop('disabled', true);
      var editorContent = CKEDITOR.instances.editor.getData();
      if (editorContent == '') {
        $("#content-error").text("This field is required.");
        return false;
      }
      var formData = new FormData(this);
      formData.append('answers', editorContent);
      // var formData = new FormData(this);
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

            $('#faq_service-table').DataTable().ajax.reload(null, false);
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
  $('.sumoselect').SumoSelect({
    search: true,
    searchText: 'Enter here.'
  });
</script>
<script>
  CKEDITOR.replace('editor');
</script>