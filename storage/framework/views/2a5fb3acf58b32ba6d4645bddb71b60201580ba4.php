


<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="py-10">
                <?php if(session()->has('change-success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('change-success')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->has('change-error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session()->get('change-error')); ?>

                    </div>
                <?php endif; ?>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img style="width: 90px; height: 90px;"
                                src="<?php echo e($user->profile_picture ? url('public/avater/' . $user->profile_picture) : url('public/avater/default.png')); ?>"
                                alt="avatar" class="rounded-circle img-fluid">
                            <h5 class="my-3"><?php echo e($user->name); ?></h5>
                            <p class="text-muted mb-1">(<?php echo e(@$user->role); ?>)</p>


                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo e(@$user->name); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo e(@$user->email); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo e(@$user->phone); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Blood Group</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo e(@$user->bloodGroup); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Status</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <?php if($user->donation_status == 1): ?>
                                            <p class="badge bg-success mb-0">Avaiable</p>
                                        <?php endif; ?>
                                        <?php if($user->donation_status == 0): ?>
                                            <p class="badge bg-danger mb-0">Unavaiable</p>
                                        <?php endif; ?>
                                        <button data-bs-toggle="modal" data-bs-target=".change_status"
                                            class="btn btn-primary btn-sm">Change</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Last Donated</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="mb-0"><?php echo e(@$user->last_donation_date); ?>

                                        <strong>(<?php echo e(@$user->last_donation_days); ?>)</strong>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo e(@$user->address); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container pb-5">
            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body bg-light p-3">
                            <h3 class="py-3">You're interested</h3>
                            <?php echo $__env->make('frontend.user.donor.blood_requets_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade change_status" tabindex="-1" aria-labelledby="interestedDonorsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="<?php echo e(route('user_settings.change_status')); ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="interestedDonorsModalLabel">Change Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="form-label select-label">Status</label>
                                <br>
                                <select class="select form-control-lg" style="width: 100%" name="donation_status" required>
                                    <option value="0" <?php echo e($user->donation_status == 0 ? 'selected' : ''); ?>>
                                        Unavaiable
                                    </option>
                                    <option value="1" <?php echo e($user->donation_status == 1 ? 'selected' : ''); ?>>
                                        Avaiable
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Last Donated</label>
                                <br>
                                <input class="form-control form-control-lg" type="date" name="last_donated"
                                    value="<?php echo e(@$user->lastDonated); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>

            </form>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/datatable.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#interested_in_table').DataTable();
        });

        setTimeout(() => {
            console.log('should close');
            $('.alert').addClass('d-none');
        }, 5000);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/frontend/user/donor/profile.blade.php ENDPATH**/ ?>