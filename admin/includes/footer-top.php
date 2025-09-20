<!-- Modals -->
<div class="modal fade" tabindex="-1" role="dialog" data-bs-focus="false" data-keyboard="false" data-backdrop="static" id="modalGrid">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="md-modal-content">
    </div>
  </div>
</div>
<!-- <div class="modal fade" tabindex="-1" role="dialog" data-bs-focus="false"  data-keyboard="false" data-backdrop="static" id="lgmodalGrid">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content" id="lg-modal-content">
     </div>
   </div>
 </div> -->
<div class="modal fade" tabindex="-1" role="dialog" data-bs-focus="false" data-keyboard="false" data-backdrop="static" id="lgmodalGrid">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="lg-modal-content">
    </div>
  </div>
</div>


<!-- <div class="footer">
   <div class="copyright">
     <p>Copyright © Developed by <a href="https://dexignzone.com/" target="_blank">DexignZone</a> 2023</p>
   </div>
 </div>
 </div> -->

<div class="footer">
  <div class="copyright">
    <!-- <p>Copyright © Developed by <a href="https://dexignzone.com/" target="_blank">DexignZone</a> 2023</p> -->
    <p class="mb-0 text-dark">© Copyright <?php echo date("Y"); ?> All Rights reserved by <span class='edtech-text'>E</span><span class='edtech-text'>d</span><span class='edtech-text1'>t</span><span class='edtech-text2'>e</span><span class='edtech-text3'>c</span><span class='edtech-text4'>h</span> Innovate Pvt Ltd </a></p>
  </div>
</div>
</div>



<!-- Required vendors -->
<script src="/admin/admin-assets/vendor/global/global.min.js"></script>
<script src="/admin/admin-assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="/admin/admin-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<!-- <script src="/admin/admin-assets/vendor/apexchart/apexchart.js"></script> -->

<!-- Dashboard 1 -->
<script src="/admin/admin-assets/js/dashboard/dashboard-1.js"></script>
<script src="/admin/admin-assets/vendor/draggable/draggable.js"></script>
<script src="/admin/admin-assets/vendor/swiper/js/swiper-bundle.min.js"></script>
<script src="/admin/admin-assets/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>

<!-- tagify -->
<script src="/admin/admin-assets/vendor/tagify/dist/tagify.js"></script>
<script src="/admin/admin-assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/admin/admin-assets/vendor/datatables/js/dataTables.buttons.min.js"></script>
<script src="/admin/admin-assets/vendor/datatables/js/buttons.html5.min.js"></script>
<script src="/admin/admin-assets/vendor/datatables/js/jszip.min.js"></script>
<script src="/admin/admin-assets/js/plugins-init/datatables.init.js"></script>

<!-- Apex Chart -->
<script src="/admin/admin-assets/vendor/toastr/js/toastr.min.js"></script>
<script src="/admin/admin-assets/js/plugins-init/toastr-init.js"></script>

<!-- Vectormap -->
<script src="/admin/admin-assets/vendor/jqvmap/js/jquery.vmap.min.js"></script>
<script src="/admin/admin-assets/vendor/jqvmap/js/jquery.vmap.world.js"></script>
<script src="/admin/admin-assets/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
<script src="/admin/admin-assets/js/custom.js"></script>
<script src="/admin/admin-assets/js/deznav-init.js"></script>
<script src="/admin/admin-assets/js/demo.js"></script>
<script src="/admin/admin-assets/js/styleSwitcher.js"></script>
<!-- code-highlight -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script> -->


<!-- sumoselect  -->
<script src="/admin/admin-assets/plugins/sumo-select/js/jquery.sumoselect.min.js"></script>
<script src="/admin/admin-assets/plugins/sumo-select/js/jquery.sumoselect.js"></script>
<script>
  function previewFile(input) {
    const file = input.files[0];
    const preview = document.getElementById("previewImage");
    const placeholder = document.querySelector(".custom-image-upload .placeholder");

    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = "block";
        placeholder.style.display = "none";
      }
      reader.readAsDataURL(file);
    } else {
      preview.style.display = "none";
      placeholder.style.display = "block";
    }
  }
</script>
<script>
  // hljs.highlightAll();
  // hljs.configure({
  // 	ignoreUnescapedHTML: true
  // })
</script>

<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('pre code').forEach((el) => {
      hljs.highlightElement(el);
    });
  });
</script>
<script type="text/javascript">
  function add(url, modal) {
    // alert(model);
    $.ajax({
      url: '/admin/app/' + url + '/create',
      type: 'GET',
      success: function(data) {
        $('#' + modal + '-modal-content').html(data);
        //  alert('#' + modal + 'modal');
        $('#' + modal + 'modal').modal('show');
      }
    })
  }
</script>


<script type="text/javascript">
  function edit(url, id, modal) {

    $.ajax({
      url: '/admin/app/' + url + '/edit?id=' + id,
      type: 'GET',
      success: function(data) {
        $('#' + modal + '-modal-content').html(data);
        $('#' + modal + 'modal').modal('show');
        $('#modalGrid').modal('show');
      }
    })
  }
</script>
<script type="text/javascript">
  function destroy(url, id) {
    $(".modal").modal('hide');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "/admin/app/" + url + "/destroy?id=" + id,
          type: 'DELETE',
          dataType: 'json',
          success: function(data) {
            if (data.status == 200) {
              toastr.success(data.message, 'Success');
              $('.table').DataTable().ajax.reload(null, false);;
            } else {
              toastr.error(data.message, 'Error');
            }
          }
        });
      }
    })
  }
</script>
<script type="text/javascript">
  function changeStatus(table, id, column = null) {
    $.ajax({
      url: '/admin/app/status/update',
      type: 'post',
      data: {
        table,
        id,
        column
      },
      dataType: 'json',
      success: function(data) {
        if (data.status == 200) {
          toastr.success(data.message, 'Success');
          var datatable = table == 'Students' ? 'application' : table.toLowerCase();
          //  alert('#' + datatable + '-table');
          $('#' + datatable + '-table').DataTable().ajax.reload(null, false);;
        } else {
          toastr.error(data.message, 'Error');
          $('#' + table + '-table').DataTable().ajax.reload(null, false);;
        }
      }
    });
  }
</script>