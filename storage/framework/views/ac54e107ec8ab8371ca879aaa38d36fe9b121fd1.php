    <section class="donors-list py-2" id="avaiableDonors">
        <div class="container">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h2>Blood Requests Near You</h2>
                </div>
                <?php if(count($bloodRequests) > 0): ?>
                    <?php $__currentLoopData = @$bloodRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-4">
                            <div class="donor-card request-card">
                                <div class="card">
                                    <?php if($bloodRequest->flag == 'urgent'): ?>
                                        <div class="donor-status avaialble" style="font-size: 18px">Urgent</div>
                                    <?php else: ?>
                                        <div class="donor-status unavaialble" style="font-size: 18px">Pre Collection
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                            <div class="request-blood-group">
                                                <h1><?php echo e($bloodRequest->blood_group); ?></h1>
                                            </div>
                                        </div>

                                        <p class="card-text">
                                            <strong>Location: </strong> <?php echo e($bloodRequest->location); ?>

                                        </p>
                                        <p class="card-text">
                                            <strong>Name: </strong> <?php echo e($bloodRequest->name); ?>

                                        </p>
                                        <p class="card-text">
                                            <strong>Phone: </strong> <?php echo e($bloodRequest->phone); ?>

                                        </p>
                                        <button type="button" class="btn btn-primary requestDetails"
                                            request-id="<?php echo e($bloodRequest->id); ?>" data-bs-toggle="modal"
                                            data-bs-target=".requestDetailsModal">Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-12 py-4 text-center">
                        <h2>No Requests Found</h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade requestDetailsModal" tabindex="-1" aria-labelledby="requestDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestDetailsModalLabel">Blood Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <?php if(auth()->guard()->check()): ?>
                    <div class="modal-body">
                        <div class="blood-request-data-fetching">
                            <div class="loader"></div>
                        </div>
                        <div class="row blood-request-data">
                            <div class="col-12">
                                <p>
                                    <strong>Blood Group: </strong> <span id="requestedBloodGroup"></span>
                                </p>
                            </div>
                            <div class="col-12">
                                <p>
                                    <strong>Name: </strong> <span id="requestedName"></span>
                                </p>
                            </div>
                            <div class="col-12">
                                <p>
                                    <strong>Phone: </strong> <span id="requestedPhone"></span>
                                </p>
                            </div>
                            <div class="col-12">
                                <p>
                                    <strong>Email: </strong> <span id="requestedEmail"></span>
                                </p>
                            </div>
                            <div class="col-12">
                                <p>
                                    <strong>Request Type: </strong> <span id="requestedType"></span>
                                </p>
                            </div>
                            <div class="col-12">
                                <p>
                                    <strong>Date: </strong> <span id="requestedDate"></span>
                                </p>
                            </div>
                            <div class="col-12">
                                <p>
                                    <strong>Time: </strong> <span id="requestedTime"></span>
                                </p>
                            </div>
                            <div class="col-12">
                                <p>
                                    <strong>Address: </strong> <span id="requestedLocation"></span>
                                </p>
                            </div>
                            <div class="col-12">
                                <p>
                                    <strong>Description: </strong> <span id="requestedDescription"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <div class="p-2 text-center">
                        <h4 class="text-danger">You have to be logged in to see the details</h4>
                        <h6><strong>Have an account?</strong> <a href="<?php echo e(route('login')); ?>">Login</a></h6>
                        <h6><strong>Don't have any account?</strong> <a href="<?php echo e(route('register')); ?>">Register</a></h6>
                    </div>
                <?php endif; ?>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Close</button>
                    <?php if(auth()->guard()->check()): ?>
                        <button type="button" class="btn btn-primary" id="donorReqeust">Want To Donate</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/frontend/partials/recent_blood_requests.blade.php ENDPATH**/ ?>