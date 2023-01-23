

<?php $__env->startSection('content'); ?>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('success')); ?>

                        </div>
                    <?php endif; ?>

                    
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Create Blood Request</h3>
                            <form method="POST" action="<?php echo e(route('reciever.blood_request')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="name">Name</label>

                                            <input type="text" id="name" name="name"
                                                class="form-control form-control-lg" default value="<?php echo e($user->name); ?>"
                                                required />
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
                                            <label class="form-label" for="phone">Contact Number</label>
                                            <input type="tel" id="phone" name="phone"
                                                class="form-control form-control-lg" value="<?php echo e($user->phone); ?>" required />

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
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Contact Email</label>
                                            <input type="email" id="emailAddress" name="email"
                                                class="form-control form-control-lg" value="<?php echo e($user->email); ?>" required />

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
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control form-control-lg" id="date"
                                                name="date" value="<?php echo e(old('date')); ?>" required />
                                        </div>

                                        <?php $__errorArgs = ['date'];
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
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="time" class="form-label">Approx. Time</label>
                                            <input type="text" class="form-control form-control-lg timepicker"
                                                id="time" name="time" value="<?php echo e(old('time')); ?>"
                                                autocomplete="off" />
                                        </div>

                                        <?php $__errorArgs = ['time'];
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

                                    <div class="col-md-6 mb-4">

                                        <label class="form-label" for="phone">Flag</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag" value="urgent"
                                                checked />
                                            <label class="form-check-label" for="urgent">Urgent</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag"
                                                value="pre_collection" />
                                            <label class="form-check-label" for="Pre Collection">Pre Collection</label>
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4 donorRules">
                                        <label class="form-label select-label">Select Blood Group</label>
                                        <br>
                                        <select class="select form-control-lg" name="blood_group_id" required>
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
                                    <div class="col-md-12 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="name">Description</label>

                                            <textarea class="form-control form-control-lg" name="description" id="description" rows="6"><?php echo e(old('description')); ?></textarea>
                                        </div>

                                        <?php $__errorArgs = ['description'];
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

                                        <div class="form-outline">
                                            <label class="form-label" for="name">Location</label>

                                            <input type="text" id="location" name="location"
                                                class="form-control form-control-lg" value="<?php echo e(old('location')); ?>"
                                                required />

                                            <input type="text" hidden name="latitude" id="locationLat"
                                                value="<?php echo e(old('latitude')); ?>">
                                            <input type="text" hidden name="longitude" id="locationLng"
                                                value="<?php echo e(old('longitude')); ?>">
                                        </div>


                                        <?php $__errorArgs = ['location'];
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

                                        <div class="pac-card" id="pac-card">
                                            <div>

                                                <div id="type-selector" class="pac-controls">
                                                    <input type="radio" hidden name="type" id="changetype-all"
                                                        checked="checked" />


                                                    <input type="radio" hidden name="type"
                                                        id="changetype-geocode" />





                                                </div>
                                                <br />
                                                <div id="strict-bounds-selector" class="pac-controls">
                                                    <input type="checkbox" id="use-location-bias" hidden value=""
                                                        checked />


                                                    <input type="checkbox" id="use-strict-bounds" hidden
                                                        value="" />

                                                </div>
                                            </div>
                                            <div id="pac-container">
                                                <input id="autoCompleteSearch" type="text"
                                                    placeholder="Enter a location" />
                                            </div>
                                        </div>
                                        <div id="map" style="height: 400px"></div>
                                        <div id="infowindow-content">
                                            <span id="place-name" class="title"></span><br />
                                            <span id="place-address"></span>
                                        </div>

                                        <?php $__errorArgs = ['location'];
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
                                            <input type="checkbox" name="only_show_to_authorized"
                                                id="only_show_to_authorized"
                                                <?php echo e(old('only_show_to_authorized') ? 'checked' : ''); ?>

                                                class="form-check-input" />
                                            <label class="form-check-label" for="remember">Only Show Request To authorized
                                                Donors</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Create" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/frontend/user/reciever/blood_request.blade.php ENDPATH**/ ?>