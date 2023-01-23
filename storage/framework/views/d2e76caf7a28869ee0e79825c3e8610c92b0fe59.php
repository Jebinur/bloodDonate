<?php $__env->startSection('content'); ?>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form method="POST" id="registrationForm" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-md-12 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="name">Name</label>

                                            <input type="text" id="name" name="name"
                                                class="form-control form-control-lg" value="<?php echo e(old('name')); ?>" required />
                                        </div>

                                        <?php $__errorArgs = ['name'];
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
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="email" id="emailAddress" name="email"
                                                class="form-control form-control-lg" value="<?php echo e(old('email')); ?>" required />

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
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="phone">Phone Number</label>
                                            <input type="tel" id="phone" name="phone"
                                                class="form-control form-control-lg" value="<?php echo e(old('phone')); ?>" required />

                                        </div>
                                        <?php $__errorArgs = ['phone'];
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
                                    <div class="col-12 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Address</label>
                                            <input type="text" id="emailAddress" name="address"
                                                class="form-control form-control-lg" value="<?php echo e(old('address')); ?>"
                                                required />

                                        </div>
                                        <?php $__errorArgs = ['address'];
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
                                    <div class="col-md-6 mb-4 d-flex flex-column align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="birthdayDate" class="form-label">Birthday</label>
                                            <input type="date" class="form-control form-control-lg" id="birthdayDate"
                                                name="birthday" value="<?php echo e(old('birthday')); ?>" />
                                        </div>


                                        <?php $__errorArgs = ['birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <br>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <label class="form-label" for="phone">Gender</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                                name="gender" value="female" checked />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                                name="gender" value="male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="otherGender"
                                                name="gender" value="other" />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-4">

                                        <label class="form-label" for="phone">Register As</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role"
                                                value="reciever" checked />
                                            <label class="form-check-label" for="Reciever">Reciever</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role"
                                                value="donor" />
                                            <label class="form-check-label" for="Donor">Donor</label>
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4 donorRules">
                                        <label class="form-label select-label">Select Blood Group</label>
                                        <br>
                                        <select class="select form-control-lg" name="blood_group_id" id="blood_group_id">
                                            <option value="">Select Blood Group</option>
                                            <?php $__currentLoopData = $bloodGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

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

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-lg" value="<?php echo e(old('password')); ?>" />

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
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="confirm_password">Confirm Password</label>
                                            <input type="password" id="password_confirmation"
                                                name="password_confirmation" class="form-control form-control-lg" />

                                        </div>
                                        <?php $__errorArgs = ['password_confirmation'];
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


                                <div>
                                    <input class="btn btn-primary btn-lg" type="submit" value="Register" />
                                </div>

                                <h6 class="mt-3"><strong>Have an account?</strong> <a
                                        href="<?php echo e(route('login')); ?>">Login</a></h6>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('input[name="role"]').on('change', function() {
                if ($(this).val() == 'donor') {
                    $('#blood_group_id').prop('required', true);
                    $('#agreedAged').prop('required', true);
                } else {
                    $('#blood_group_id').prop('required', false);
                    $('#agreedAged').prop('required', false);
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blood-donation-hub\resources\views/auth/register.blade.php ENDPATH**/ ?>