<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/header-top.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/header-bottom.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/top-menu.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/menu.php');
?>
<!-- row -->
<div class="element-areaa">
    <div class="demo-view">
        <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">

            <!-- Column starts -->
            <div class="col-xl-12">
                <div class="card dz-card" id="accordion-four">
                    <div class="card-header flex-wrap d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">Payments</h4>
                        </div>
                        <!-- <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" onclick="add('/service/plains','md')" data-bs-target="#modalGrid">Add Partner</button> -->
                    </div>
                    <!-- /tab-content -->
                    <div class="tab-content" id="myTabContent-3">
                        <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table id="payments-table" class="display table" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Plan Name</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Number</th>
                                                <th>Status</th>
                                                <th>Transaction ID</th>
                                                <th>Updated At</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="withoutBorder-html" role="tabpanel" aria-labelledby="home-tab-3">
                            <div class="card-body pt-0 p-0 code-area">
                            </div>
                        </div>
                    </div>
                    <!-- /tab-content -->
                </div>
            </div>
            <!-- Column ends -->
        </div>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/footer-top.php'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#payments-table').DataTable({
            'processing': true,
            'ajax': {
                'url': '/admin/app/service/payments/server',
                'type': 'POST'
            },
            'columns': [{
                    data: 'no'
                },
                {
                    data: 'plan_name',
                    title: 'Plan Name'
                },
                {
                    data: 'name',
                    title: 'Name'
                },
                {
                    data: 'email',
                    title: 'Email'
                },
                {
                    data: 'number',
                    title: 'Number'
                },
                {
                    data: 'status',
                    title: 'Status',
                    render: function(data, type, row) {
                        var badgeClass = '';
                        if (data === 'paid' || data == 1) {
                            badgeClass = 'badge bg-success'; // Green badge for Paid
                        } else if (data === 'pending' || data == 0) {
                            badgeClass = 'badge bg-warning'; // Yellow badge for Pending
                        } else if (data === 'failed') {
                            badgeClass = 'badge bg-danger'; // Red badge for Failed
                        } else {
                            badgeClass = 'badge bg-secondary'; // Gray badge for unknown status
                        }
                        return `<span class="${badgeClass}">${data}</span>`;
                    }
                } ,{
                    data: 'txn_id',
                    title: 'Transaction ID'
                },
                {
                    data: 'updated_at',
                    title: 'Updated At'
                },
               
            ],
            'searching': true,
            'paging': true,
            'lengthChange': true,
        });

        $('input[aria-controls="payments-table"]').keyup(function() {
            var searchValue = $(this).val();
            table.search(searchValue).draw();
        });
    });
</script>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/footer-bottom.php'); ?>