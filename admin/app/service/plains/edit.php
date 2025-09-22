<?php
if (isset($_GET['id'])) {
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

  $id = intval($_GET['id']);
  $plain = $conn->query("SELECT plains_category_id, actual_price, discout_price, key_features, plain_type FROM plains WHERE id = $id");
  $plains = $plain->fetch_assoc();

  // Decode features JSON
  $features = [];
  if (!empty($plains['key_features'])) {
    $features = json_decode($plains['key_features'], true);
  }
}
?>

<div class="modal-header">
  <h3 class="modal-title">Edit Service Plain</h3>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" role="form" id="form-edit-plains"
      action="/admin/app/service/plains/update"
      method="POST" enctype="multipart/form-data">

      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

      <div class="row">
        <!-- Product Select -->
        <div class="mb-3 col-md-6">
          <label class="form-label">Select Products <span class="text-danger">*</span></label>
          <select class="form-control select2" name="category_plain_id" required>
            <option value="" disabled> Select Product</option>
            <?php
            $catgory_plain = mysqli_query(
              $conn,
              "SELECT plains_category.id, CONCAT(plains_category.name,' (', products.name, ')') AS Category_name
               FROM plains_category 
               LEFT JOIN products ON products.id = plains_category.products_id
               WHERE plains_category.status = 1               
               ORDER BY plains_category.name ASC"
            );
            while ($row = mysqli_fetch_assoc($catgory_plain)) {
              $selected = ($row['id'] == $plains['plains_category_id']) ? "selected" : "";
              echo "<option value='" . htmlspecialchars($row['id']) . "' $selected>" . htmlspecialchars($row['Category_name']) . "</option>";
            }
            ?>
          </select>
        </div>

        <!-- Actual Price -->
        <div class="mb-3 col-md-6">
          <label class="form-label">Actual Price <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="actual_price"
            value="<?= htmlspecialchars($plains['actual_price']) ?>"
            placeholder="Enter Actual Price.." required>
        </div>

        <!-- Discount Price -->
        <div class="mb-3 col-md-6">
          <label class="form-label">Discount Price <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="discout_price"
            value="<?= htmlspecialchars($plains['discout_price']) ?>"
            placeholder="Enter Discount Price.." required>
        </div>

        <!-- Plan Type -->
        <div class="mb-3 col-md-6">
          <label class="form-label">Plains Type <span class="text-danger">*</span></label>
          <select name="plain_type" class="form-control" required>
            <option value="">Select Plain Type</option>
            <option value="yearly" <?= ($plains['plain_type'] == 'yearly' ? 'selected' : '') ?>>Yearly</option>
            <option value="months" <?= ($plains['plain_type'] == 'months' ? 'selected' : '') ?>>Months</option>
          </select>
        </div>

        <!-- Key Features -->
        <div class="mb-3 col-md-12">
          <label class="form-label">Key Features</label>
          <div id="features-wrapper">
            <?php if (!empty($features)): ?>
              <?php foreach ($features as $f): ?>
                <div class="input-group mb-2 feature-item">
                  <input type="text" class="form-control" name="features[]" value="<?= htmlspecialchars($f['feature']) ?>" required>
                  <select name="feature_status[]" class="form-select" style="max-width:120px">
                    <option value="1" <?= ($f['status'] == 1 ? 'selected' : '') ?>>✔ Yes</option>
                    <option value="0" <?= ($f['status'] == 0 ? 'selected' : '') ?>>❌ No</option>
                  </select>
                  <button type="button" class="btn btn-danger remove-feature">×</button>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="input-group mb-2 feature-item">
                <input type="text" class="form-control" name="features[]" placeholder="Enter feature" required>
                <select name="feature_status[]" class="form-select" style="max-width:120px">
                  <option value="1">✔ Yes</option>
                  <option value="0">❌ No</option>
                </select>
                <button type="button" class="btn btn-danger remove-feature">×</button>
              </div>
            <?php endif; ?>
          </div>
          <button type="button" class="btn btn-success btn-sm" id="add-feature">+ Add Feature</button>
        </div>

        <!-- Submit -->
        <div class="modal-footer clearfix text-end">
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-cons btn-animated from-left">
              <span>Update</span>
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Add feature
    $('#add-feature').click(function() {
      $('#features-wrapper').append(`
        <div class="input-group mb-2 feature-item">
          <input type="text" class="form-control" name="features[]" placeholder="Enter feature" required>
          <select name="feature_status[]" class="form-select" style="max-width:120px">
            <option value="1">✔ Yes</option>
            <option value="0">❌ No</option>
          </select>
          <button type="button" class="btn btn-danger remove-feature">×</button>
        </div>
      `);
    });

    // Remove feature
    $(document).on("click", ".remove-feature", function() {
      $(this).closest('.feature-item').remove();
    });

    // jQuery validate
    $('#form-edit-plains').validate({
      errorPlacement: function(error, element) {
        if (element.is("select")) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      }
    });

    // Submit form with Ajax
    $("#form-edit-plains").on("submit", function(e) {
      e.preventDefault();

      if ($('#form-edit-plains').valid()) {
        var formData = new FormData(this);

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
              $('#plainsService-table').DataTable().ajax.reload(null, false);
            } else {
              $(':input[type="submit"]').prop('disabled', false);
              toastr.error(data.message, 'Error');
            }
          }
        });
      }
    });
  });
</script>
