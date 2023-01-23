


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
                            <img style="width: 90px; height: 90px;"
                                src="<?php echo e($user->profile_picture ? url('public/avater/' . $user->profile_picture) : url('public/avater/default.png')); ?>"
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
                    <div class="card">
                        <?php if(session()->has('success')): ?>
                            <div class="alert alert-success m-2">
                                <?php echo e(session()->get('success')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(session()->has('error')): ?>
                            <div class="alert alert-danger m-2">
                                <?php echo e(session()->get('error')); ?>

                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('user_settings.upload_profile_picture')); ?>">Upload
                                        Profile
                                        Picture</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active"
                                        href="<?php echo e(route('user_settings.change_blood_group')); ?>">Change
                                        Blood Group</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('user_settings.change_password')); ?>">Change
                                        Password</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active">

                                    <div class="row justify-content-center align-items-center h-100">
                                        <div>


                                            <div class="card shadow-2-strong card-registration"
                                                style="border-radius: 15px;">
                                                <div class="card-body p-4 p-md-5">
                                                    <form method="POST"
                                                        action="<?php echo e(route('user_settings.change_blood_group')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4 donorRules">
                                                                <label class="form-label select-label">Select Blood
                                                                    Group</label>
                                                                <br>
                                                                <select class="select form-control-lg" style="width: 100%"
                                                                    name="blood_group_id" required>
                                                                    <option value="">Select Blood Group</option>
                                                                    <?php $__currentLoopData = $bloodGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($group->id); ?>"
                                                                            <?php echo e($user->blood_group_id == $group->id ? 'selected' : ''); ?>>
                                                                            <?php echo e($group->name); ?>

                                                                        </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>

                                                            </div>
                                                            <?php $__errorArgs = ['blood_group_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>

                                                        <div class="mt-4 pt-2">
                                                            <input class="btn btn-primary btn-lg" type="submit"
                                                                value="Update">
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/frontend/user/settings/change_blood_group.blade.php ENDPATH**/ ?>