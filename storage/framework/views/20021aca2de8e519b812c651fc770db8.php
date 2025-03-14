<!-- resources/views/departments/create.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Add Department</h1>
        <form action="<?php echo e(route('departments.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="department_name">Department Name</label>
                <input type="text" name="department_name" id="department_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save Department</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/departments/create.blade.php ENDPATH**/ ?>