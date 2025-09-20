<?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php'); ?>
<?php
if (isset($_GET['id'])) {

  $id = intval($_GET['id']);
  $getdataQuery = $conn->query("SELECT * FROM faq_service WHERE ID = $id");
  $getdata = $getdataQuery->fetch_assoc();
  // echo('<pre>');print_r($getdata['products_id']);die;
}
?>

<div class="modal-header">
  <h5 class="modal-title">Edit Blogfaq</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal">
  </button>
</div>

<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" role="form" id="form-add-faq" action="/admin/app/service/faq/update" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $getdata['id'] ?>">
      <div class="mb-3 col-6">
        <label class="form-label">Select Products <span class="text-danger">*</span></label>
        <select class="form-control " name="products_id" >
          <?php
          $products = mysqli_query($conn, "SELECT id, name FROM products WHERE status = 1 ORDER BY name ASC");
          while ($row = mysqli_fetch_assoc($products)) {
            $selected = ($row['id'] == $getdata['products_id']) ? "selected" : "";
            echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="mb-3 col-md-12">
        <label class="form-label">Question
          <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="questions" value="<?= $getdata['questions'] ?>" placeholder="Enter a Question.." >
      </div>

      <div class="mb-3 col-md-12 ">
        <label class="form-label">Answers <span class="text-danger">*</span></label>
        <textarea class="ckeditor" cols="80" id="editor" name="answers" rows="10" ><?= $getdata['answers'] ?></textarea>
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
  $("#form-add-faq").on("submit", function(e) {
    e.preventDefault(); // Stop normal form submission

    if ($('#form-add-faq').valid()) {
      // Get CKEditor data
      var editorContent = CKEDITOR.instances.editor.getData();
      if (editorContent.trim() === '') {
        $("#content-error").text("This field is required.");
        return false;
      } else {
        $("#content-error").text("");
      }

      // Collect form data
      var formData = new FormData(this);
      formData.set('answers', editorContent); // ✅ match DB field

      $.ajax({
        url: this.action,
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
            $('#faq_service-table').DataTable().ajax.reload(null, false);
          } else {
            $(':input[type="submit"]').prop('disabled', false);
            toastr.error(data.message, 'Error');
          }
        },
        error: function() {
          toastr.error("Something went wrong. Please try again.", "Error");
        }
      });
    }
  });

  // ✅ Initialize CKEditor
  CKEDITOR.replace('editor');
</script>

<script>
  CKEDITOR.replace('editor');
</script>