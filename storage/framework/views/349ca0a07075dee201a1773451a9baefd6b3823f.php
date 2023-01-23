

<?php $__env->startSection('content'); ?>
    <section class="blood-groups py-2">
        <div class="container">

            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h2>Blood Groups</h2>
                </div>

                <?php $__currentLoopData = @$bloodGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4 col-md-3 col-lg-3 col-xl-3 mb-2">
                        <div class="card">
                            <div class="card-body text-center p-0">
                                <a href="<?php echo e(route('requests_donors_by_id', $bloodGroup->id)); ?>"
                                    class="btn <?php echo e(request()->id == $bloodGroup->id ? 'bg-primary text-light disabled' : 'btn-danger'); ?> w-100 py-3 fw-bold fs-2"><?php echo e($bloodGroup->name); ?></a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </section>

    <?php echo $__env->make('frontend.partials.recent_blood_requests', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-12 py-4 text-center">
        <a href="/blood-requests" class="btn btn-primary">View All</a>
    </div>


    <?php echo $__env->make('frontend.partials.avaiable_donors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-12 py-4 text-center">
        <a href="/donors" class="btn btn-primary">View All</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.requestDetails').on('click', function() {
                let requestId = $(this).attr('request-id');
                console.log(requestId);
                $.ajax({
                    url: `blood-request/${requestId}`,
                    type: 'GET',
                    beforeSend: function() {
                        $('.blood-request-data-fetching').show();
                        $('.blood-request-data').hide();
                        $('#requestedBloodGroup').text('');
                        $('#requestedName').text('');
                        $('#requestedPhone').text('');
                        $('#requestedEmail').text('');
                        $('#requestedType').text('');
                        $('#requestedDate').text('');
                        $('#requestedTime').text('');
                        $('#requestedLocation').text('');
                        $('#donorReqeust').attr('request_id', '');
                    },
                    success: function(result) {
                        if (result.data) {
                            $('.blood-request-data-fetching').hide();
                            $('.blood-request-data').show();
                            const {
                                blood_group_name,
                                name,
                                phone,
                                email,
                                location,
                                flag,
                                latitude,
                                longitude,
                                description,
                                date,
                                time,
                                id
                            } = result.data;

                            $('#requestedBloodGroup').text(blood_group_name);
                            $('#requestedName').text(name);
                            $('#requestedPhone').text(phone);
                            $('#requestedEmail').text(email);
                            $('#requestedType').text(flag.toUpperCase());
                            $('#requestedDate').text(date);
                            $('#requestedTime').text(time);
                            $('#requestedLocation').text(location);
                            $('#requestedDescription').text(description);
                            $('#donorReqeust').attr('request_id', requestId);

                        }
                    },
                    error: function() {
                        alert('Something went wrong');
                    }
                });
            });


            // Auth donor want to donate blood

            $('#donorReqeust').on('click', function() {
                const request_id = $(this).attr('request_id');
                console.log('request_id', request_id);
                $.ajax({
                    url: `/blood-request/${request_id}/interested-donor-request`,
                    type: 'GET',
                    beforeSend: function() {
                        $('#donorReqeust').text('Sending...');
                    },
                    success: function(result) {
                        if (result.success) {
                            Swal.fire(
                                'Request Sent!',
                                result.message,
                                'success'
                            )
                            $('#donorReqeust').attr('disabled', true);
                            $('#donorReqeust').text('Already Sent');
                        } else if (result.status == 401) {
                            Swal.fire(
                                'Unauthorized!',
                                result.message,
                                'error'
                            )
                            window.location.href = 'login'
                        } else {
                            Swal.fire(
                                'Error!',
                                result.message,
                                'error'
                            )

                            $('#donorReqeust').text('Want to Donate');

                        }
                    },
                    error: function(err) {
                        console.log(err);
                        $('#donorReqeust').text('Want To Donate');
                        alert('Something went wrong');
                    }
                })
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/requests_donors_by_id.blade.php ENDPATH**/ ?>