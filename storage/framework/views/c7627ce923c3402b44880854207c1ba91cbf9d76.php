    <section class="donors-list py-2" id="avaiableDonors">
        <div class="container">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h2>Available Donors Near You</h2>
                </div>

                <?php if(count($donors) > 0): ?>
                    <?php $__currentLoopData = @$donors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $last_donation_days = getMonthsDaysBetween($donor->lastDonated);
                        ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-4">
                            <div class="donor-card">
                                <div class="card">
                                    <?php if($donor->donor_avaiable === 1): ?>
                                        <div class="donor-status avaialble">Avaiable</div>
                                    <?php else: ?>
                                        <div class="donor-status unavaialble">Unavaiable</div>
                                    <?php endif; ?>


                                    <div class="card-body text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="image-area"><img class="img-fluid"
                                                    src="<?php echo e($donor->profile_picture ? url('public/avater/' . $donor->profile_picture) : url('public/avater/default.png')); ?>"
                                                    alt="card image">
                                                <div class="blood-group-label-with-radius">
                                                    <p class="m-0"><?php echo e($donor->blood_group); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title"><?php echo e($donor->name); ?></h4>
                                        <p class="badge bg-primary">
                                            <?php echo e($donor->is_active ? 'Verified' : 'Not Verified'); ?></p>
                                        <?php if($last_donation_days): ?>
                                            <p class="mb-0"><strong>Last Donated</strong></p>
                                            <p><small>(<?php echo e($last_donation_days); ?>)</small></p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-12 py-4 text-center">
                        <h2>No Donors Found</h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/frontend/partials/avaiable_donors.blade.php ENDPATH**/ ?>