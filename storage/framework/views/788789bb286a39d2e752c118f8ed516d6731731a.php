


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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('user_profile')); ?>">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?php echo e($user->name); ?></h5>
                            <p class="text-muted mb-1"><small> (<?php echo e($user->role); ?>) </small></p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href=<?php echo e(route('user_settings.switch_role')); ?>

                                    class="btn btn-primary"><?php echo e($user->role === 'donor' ? 'Switch to Reciever' : 'Switch to Donor'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Blood Group</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    

    <script src="<?php echo e(asset('js/datatable.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#blood_request_table').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/frontend/user/settings.blade.php ENDPATH**/ ?>