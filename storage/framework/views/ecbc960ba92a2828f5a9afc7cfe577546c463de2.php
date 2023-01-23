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
                                <a href="/blood-group/<?php echo e($bloodGroup->id); ?>"
                                    class="btn btn-danger w-100 py-3 fw-bold fs-2"><?php echo e($bloodGroup->name); ?></a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>

            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h2>Search</h2>
                </div>

                <?php echo $__env->make('frontend.partials.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
    </section>

    <?php echo $__env->make('frontend.partials.avaiable_donors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo e($donors->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blood-donation-hub\resources\views/donors_page.blade.php ENDPATH**/ ?>