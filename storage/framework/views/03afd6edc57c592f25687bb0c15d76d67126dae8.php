<?php $__env->startSection('content'); ?>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <nav class="mb-2">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a href="<?php echo e(route('login')); ?>" class="nav-link active" id="nav-profile-tab">User
                                        Login</a>
                                    <a href="<?php echo e(route('admin.login')); ?>" class="nav-link" id="nav-profile-tab">Admin
                                        Login</a>
                                </div>
                            </nav>


                            <?php if(\Session::get('error')): ?>
                                <div class="alert alert-danger mb-2" role="alert">
                                    <?php echo e(\Session::get('error')); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(\Session::get('success')): ?>
                                <div class="alert alert-success mb-2" role="alert">
                                    <?php echo e(\Session::get('success')); ?>

                                </div>
                            <?php endif; ?>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab" tabindex="0">
                                    <form method="POST" action="<?php echo e(route('login')); ?>">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-md-12 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="emailAddress">Email</label>
                                                    <input type="email" id="emailAddress" name="email"
                                                        class="form-control form-control-lg" value="<?php echo e(old('email')); ?>"
                                                        required />

                                                </div>
                                                <?php $__errorArgs = ['email'];
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
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control form-control-lg"
                                                        value="<?php echo e(old('password')); ?>" />

                                                </div>
                                                <?php $__errorArgs = ['password'];
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
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-4">

                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="remember" id="remember"
                                                        <?php echo e(old('remember') ? 'checked' : ''); ?> class="form-check-input" />
                                                    <label class="form-check-label" for="remember">Remember Me</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="">
                                            <input class="btn btn-primary btn-lg" type="submit" value="Login" />
                                        </div>

                                        <h6 class="mt-3"><strong>Don't have any account?</strong> <a
                                                href="<?php echo e(route('register')); ?>">Register</a></h6>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/auth/login.blade.php ENDPATH**/ ?>