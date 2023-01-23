

<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Users</h1>


    <?php if(\Session::get('error')): ?>
        <div class="alert alert-danger my-2" role="alert">
            <?php echo e(\Session::get('error')); ?>

        </div>
    <?php endif; ?>

    <?php if(\Session::get('success')): ?>
        <div class="alert alert-success my-2" role="alert">
            <?php echo e(\Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Blood Group</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Registered At.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $do = @$user->is_active ? 'Deactivate' : 'Activate';
                            ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e(@$user->name); ?></td>
                                <td><?php echo e(@$user->blood_group); ?></td>
                                <td><?php echo e(@$user->role); ?></td>
                                <td><?php echo e(@$user->email); ?></td>
                                <td><?php echo e(@$user->phone); ?></td>
                                <td><?php echo e(@$user->address); ?></td>
                                <td><span
                                        class="badge <?php echo e(@$user->is_active ? 'badge-success' : 'badge-danger'); ?>"><?php echo e(@$user->is_active ? 'Active' : 'Inactive'); ?></span>
                                </td>
                                <td><?php echo e(@$user->created_at); ?></td>
                                <td>
                                    <div class="d-flex flex-row align-items-center">
                                        <button type="button" data-toggle="modal"
                                            data-target="#deletemodal<?php echo e(@$user->id); ?>"
                                            class="btn btn-danger btn-sm">Delete</button>
                                        <button type="button" data-toggle="modal"
                                            data-target="#activemodal<?php echo e(@$user->id); ?>"
                                            class="btn <?php echo e(@$user->is_active ? 'btn-warning' : 'btn-success'); ?> btn-sm ml-2"><?php echo e($do); ?></button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="activemodal<?php echo e(@$user->id); ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="activeModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <form action="<?php echo e(route('admin.activate_user')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="user_id" value="<?php echo e(@$user->id); ?>">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="activeModalTitle">
                                                            <?php echo e($do); ?> User
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Do You Want to <span class="text-danger fw-700">
                                                                <?php echo e($do); ?>

                                                            </span>
                                                            <?php echo e(@$user->name); ?>?
                                                        </p>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-<?php echo e(@$user->is_active ? 'danger' : 'primary'); ?>"><?php echo e($do); ?></button>
                                                    </div>

                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deletemodal<?php echo e(@$user->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="<?php echo e(route('admin.delete_user')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="user_id" value="<?php echo e(@$user->id); ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalTitle">
                                                    Delete User
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Do You Want to <span class="text-danger fw-700">
                                                        delete
                                                    </span>
                                                    <?php echo e(@$user->name); ?>?
                                                </p>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>

                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('admin/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('admin/js/demo/datatables-demo.js')); ?>"></script>

    <script>
        setTimeout(() => {
            $('.alert').addClass('d-none');
        }, 5000);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/admin/users.blade.php ENDPATH**/ ?>