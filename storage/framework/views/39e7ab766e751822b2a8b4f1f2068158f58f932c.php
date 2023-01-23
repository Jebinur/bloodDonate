<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/ico">

    <title>Blood Donation HUB</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/vendor/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/timepicker.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/datatable.min.css')); ?>" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="app">
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
                        <li><a href="/donors" class="nav-link px-2 text-white">Donors</a></li>
                        <li><a href="/blood-requests" class="nav-link px-2 text-white">Blood Requests</a></li>
                        
                    </ul>

                    <div class="text-end">
                        <?php if(Auth::user()): ?>
                            <div class="dropdown">
                                <button style="background: none; border: none; outline: none" type="button"
                                    id="profileBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img style="width: 45px; height: 45px; border-radius: 50%"
                                        src="<?php echo e(Auth::user()->profile_picture ? url('public/avater/' . Auth::user()->profile_picture) : url('public/avater/default.png')); ?>"
                                        alt="">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="profileBtn">
                                    <?php if(auth()->user()->role != 'admin'): ?>
                                        <li><a class="dropdown-item" href=<?php echo e(route('user_profile')); ?>>Profile</a></li>
                                        <li><a class="dropdown-item"
                                                href=<?php echo e(route('user_settings.change_blood_group')); ?>>Settings</a></li>
                                    <?php endif; ?>

                                    <?php if(auth()->user()->role == 'admin'): ?>
                                        <li><a class="dropdown-item" href=<?php echo e(route('admin.dashboard')); ?>>Dashboard</a>
                                        </li>
                                    <?php endif; ?>

                                    <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                            class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-light me-2">Login</a>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-warning">Register</a>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </header>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>


    <script src="<?php echo e(asset('js/packages/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/packages/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/registerValidation.js')); ?>"></script>
    <script src="<?php echo e(asset('js/timepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('js/packages/timepicker.min.js')); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUPClCAvO-EIlmJajX4Sc3bpGgi57-LnE&callback=initMap&libraries=places&v=weekly&channel=2"
        async></script>

    <script src="<?php echo e(asset('js/map.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/layouts/app.blade.php ENDPATH**/ ?>