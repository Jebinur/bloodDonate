

<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Blood Requests</h1>


    <?php if(\Session::get('error')): ?>
        <div class="alert alert-danger my-2" role="alert">
            <?php echo e(\Session::get('error')); ?>

        </div>
    <?php endif; ?>

    <?php if(\Session::get('success')): ?>
        <div class="alert alert-success my-2" role="alert">
            <?php echo e(\Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Request By</th>
                            <th>Blood Group</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Flag</th>
                            <th>Can See By</th>
                            <th>Managed</th>
                            <th>Interest Donors</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $bloodRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            vb <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e(@$item->user->name); ?></td>
                                <td><?php echo e(@$item->bloodGroup->name); ?></td>
                                <td style="display: block; width: 300px"><?php echo e(@$item->location); ?></td>
                                <td><?php echo e(@$item->date); ?></td>
                                <td><?php echo e(@$item->time); ?></td>
                                <td><span class="badge <?php echo e(@$item->flag === 'urgent' ? 'bg-danger' : 'bg-success'); ?>">
                                        <?php echo e(@$item->flag === 'urgent' ? 'Urgent' : 'Pre Collection'); ?>

                                    </span>
                                </td>
                                <td> <span
                                        class="badge <?php echo e(@$item->only_show_to_authorized ? 'bg-warning' : 'bg-success'); ?>">
                                        <?php echo e(@$item->only_show_to_authorized ? 'Authorized Donors' : 'All Donors'); ?>

                                    </span></td>
                                <td> <span class="badge <?php echo e($item->managed ? 'bg-success' : 'bg-warning'); ?>">
                                        <?php echo e($item->managed ? 'Managed' : 'Not Managed'); ?>

                                    </span></td>

                                <td>
                                    <button type="button" class="btn btn-primary text-light interestedDonors"
                                        request_id="<?php echo e($item->id); ?>" data-toggle="modal"
                                        data-target="#interestedDonorModal">Details</button>
                                </td>

                                <td style="display: block; width: 270px">
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" data-toggle="modal"
                                            data-target="#deletemodal<?php echo e(@$item->id); ?>"
                                            class="btn btn-danger btn-sm">Delete</button>
                                        
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="sendAvaiableDonor<?php echo e(@$item->id); ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="sendAvaiableDonorModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <form action="<?php echo e(route('admin.send_to_avaiable_donor')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="request_id" value="<?php echo e(@$item->id); ?>">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="sendAvaiableDonorModalTitle">
                                                            Send To avaiable Donor
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            This Blood Request will show to all the avaiable
                                                            <span
                                                                class="badge badge-danger rounded"><?php echo e(@$item->bloodGroup->name); ?>

                                                            </span>
                                                            donor
                                                        </p>

                                                        <h6>Do you want to send?</h6>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                    </div>

                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deletemodal<?php echo e(@$item->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="<?php echo e(route('admin.delete_blood_request')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="request_id" value="<?php echo e(@$item->id); ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalTitle">
                                                    Delete Blood Request
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Do You Want to <span class="text-danger fw-700">
                                                        delete Blood Request ID
                                                    </span>
                                                    <?php echo e(@$item->id); ?>?
                                                </p>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>

                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="interestedDonorModal" tabindex="-1" aria-labelledby="interestedDonorsModalLabel"
        aria-hidden="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="interestedDonorsModalLabel">Interested Donors</h5>
                    <button type="button" class="btn-close btn-danger border-0" data-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="loader mx-auto"></div>
                        <div class="interested-donors table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="not-found text-center py-3 d-none">
                            <h3>No Interested Donors Found!</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-target="#exampleModalToggle" data-toggle="modal"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('admin/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('admin/js/demo/datatables-demo.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            // get all interested donors by id 

            $('.interestedDonors').on('click', function() {
                let bloodRequestId = $(this).attr('request_id');
                $.ajax({
                    url: `blood-request/${bloodRequestId}/interested-donors`,
                    type: 'GET',
                    beforeSend: function() {
                        $('.loader').show();
                        $('.interested-donors').hide();
                        $('.not-found').hide();
                    },
                    success: function(result) {
                        $('.loader').hide();

                        console.log('====================================');
                        console.log(result?.data);
                        console.log('====================================');

                        if (result?.data?.length) {
                            let html = '';
                            result?.data?.forEach(function(element, index) {
                                console.log(element.accepted);
                                html += `
                                 <tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${element.donor_name}</td>
                                    <td>${element.donor_phone}</td>
                                    <td>${element.donor_email}</td>
                                    <td>
                                        <button interested-id="${element.id}" blood-request-id="${element.blood_request_id}" donor-id="${element.interested_donor_id}" class="btn btn-primary accept-interested-donors" ${element.accepted ? 'disabled' : ''}>
                                            ${element.accepted ? 'Approved' : 'Approve'}
                                            </button>
                                            </td>
                                            </tr>
                                            `;
                            });
                            $('.interested-donors').show();
                            $('.interested-donors table tbody').html(html);
                        } else {
                            $('.not-found').attr('style', 'display:block !important');
                        }

                    },
                    error: function() {
                        alert('Something went wrong');
                    }
                });
            });


            $('.interested-donors').on('click', '.accept-interested-donors', function() {

                let acceptBtn = $(this);
                let bloodRequestId = $(this).attr('blood-request-id');
                let donorId = $(this).attr('donor-id');
                let interestedId = $(this).attr('interested-id');

                $.ajax({
                    url: `blood-request/accept-donor`,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        bloodRequestId,
                        donorId
                    },
                    beforeSend: function() {
                        console.log(acceptBtn);
                        acceptBtn.text('Approving...');
                    },
                    success: function(result) {
                        if (result.success) {
                            acceptBtn.text('Approved');
                            acceptBtn.attr('disabled', 'disabled');
                        } else {
                            acceptBtn.text('Approve');
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        //  location.reload();
                        acceptBtn.text('Approve');
                    }
                });


            });



        })

        setTimeout(() => {
            $('.alert').addClass('d-none');
        }, 5000);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/admin/blood_requests.blade.php ENDPATH**/ ?>