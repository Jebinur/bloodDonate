<div class="card w-50 mx-auto">
    <div class="card-body">
        <form method="GET" action="<?php echo e(route('search')); ?>"
            class="d-flex flex-column align-items-center justify-content-center">
            <input name="search_text" class="form-control form-control-lg w-100" type="text"
                placeholder="Search by location" value="<?php echo e(@$search_string); ?>" required>
            <div class="mt-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="donors"
                        <?php echo e(@$search_donors ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Donors</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="requests"
                        <?php echo e(@$search_requests ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Blood Requests</label>
                </div>
                <?php if(session('error')): ?>
                    <div class="text-danger my-2"><?php echo e(session('error')); ?></div>
                <?php endif; ?>
            </div>
            <button class="btn btn-primary btn-lg mt-3" type="submit">Search</button>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\blood-donation-hub\resources\views/frontend/partials/search.blade.php ENDPATH**/ ?>