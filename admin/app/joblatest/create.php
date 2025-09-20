<?php require '../../includes/db-config.php';
require '../../includes/helper.php'; ?>

<div class="modal-header">
  <h3 class="modal-title">Add Jobs</h3>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" role="form" id="form-add-jobs" action="/admin/app/joblatest/store" method="POST" enctype="multipart/form-data">
      <div class="row">

        <div class="mb-3 col-md-6">
          <label class="form-label">Category<span class="text-danger">*</span></label>
          <?php $categoryArr = getjobcategoryFunc($conn); ?>
          <select name="category_id" id="category_id" class="form-control sumoselect" required>
            <option value="">Select Category</option>
            <?php foreach ($categoryArr as $category) {  ?>
              <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="mb-3 col-md-6">
          <label class="form-label">Job title </label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Enter a title .." required>
        </div>

        <div class="mb-3 col-md-12">
          <label class="form-label">Description <span class="text-danger">*</span></label>
          <textarea class="ckeditor form-control" cols="80" id="editor" name="description" rows="10" required></textarea>
          <span id="content-error" style="color:#b91e1e;font-weight: 500;font-size: 12px;"></span>
        </div>

        <div class="mb-3 col-md-12">
          <label class="form-label">Responsibilities</label>
          <textarea class="ckeditor form-control" cols="80" id="editor_responsibilities" name="responsibilities" rows="10"></textarea>
          <span id="responsibilities-error" style="color:#b91e1e;font-weight: 500;font-size: 12px;"></span>
        </div>

        <div class="mb-3 col-md-12">
          <label class="form-label">Qualifications</label>
          <textarea class="ckeditor form-control" cols="80" id="editor_qualifications" name="qualifications" rows="10"></textarea>
          <span id="qualifications-error" style="color:#b91e1e;font-weight: 500;font-size: 12px;"></span>
        </div>

        <div class="mb-3 col-md-12">
          <label class="form-label">Experience</label>
          <input type="text" name="experience" class="form-control" placeholder="0-1 Year/months">
        </div>

        <div class="mb-3 col-md-12">
          <label class="form-label">Job Type</label>
          <input type="text" name="employment_type" class="form-control" placeholder="Enter Job type">
        </div>
        

        <div class="mb-3 col-md-6">
          <label class="form-label">Location</label>
          <input type="text" name="location" class="form-control" placeholder="Enter location">
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label">Short_Location</label>
          <input type="text" name="short_location" class="form-control" placeholder="Enter short_location">
        </div>

        <div class="mb-3 col-md-6">
          <label class="form-label">Salary</label>
          <input type="text" name="salary" class="form-control" placeholder="Enter salary">
        </div>

        <div class="mb-3 col-md-6">
          <label class="form-label">Schedule</label>
          <input type="text" name="schedule" class="form-control" placeholder="Enter schedule">
        </div>

      </div>
      <div class="modal-footer clearfix text-end">
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
    $('#form-add-jobs').validate({
      errorPlacement: function(error, element) {
        if (element.is("select")) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      }
    });
  });

  $("#form-add-jobs").on("submit", function(e) {
    if ($('#form-add-jobs').valid()) {
      var editorContent = CKEDITOR.instances.editor.getData();
      var responsibilitiesContent = CKEDITOR.instances.editor_responsibilities.getData();
      var qualificationsContent = CKEDITOR.instances.editor_qualifications.getData();

      if (editorContent == '') {
        $("#content-error").text("Description field is required.");
        return false;
      }

      // if (responsibilitiesContent == '') {
      //   $("#responsibilities-error").text("Responsibilities field is required.");
      //   return false;
      // }
      
      // if (qualificationsContent == '') {
      //   $("#qualifications-error").text("Qualifications field is required.");
      //   return false;
      // }

      var formData = new FormData(this);
      formData.append('description', editorContent);
      formData.append('responsibilities', responsibilitiesContent);
      formData.append('qualifications', qualificationsContent);

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
            $('#blogs-table').DataTable().ajax.reload(null, false);
          } else {
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
          toastr.error("File too Big, each file should be less than or equal to 500KB");
        }
      }
    }
  }
</script>

<!-- <script>
  CKEDITOR.replace('editor');
</script> -->

<script>
  // Initialize CKEditor for all textareas with the class 'ckeditor'
  $(document).ready(function() {
    $('.ckeditor').each(function() {
      CKEDITOR.replace(this);
    });
  });
</script>
