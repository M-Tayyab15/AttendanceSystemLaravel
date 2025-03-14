<!-- resources/views/departments/edit.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit Department</h1>
        <form action="<?php echo e(route('departments.update', $department->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="department_name">Department Name</label>
                <input type="text" name="department_name" id="department_name" class="form-control" value="<?php echo e($department->department_name); ?>" required>
            </div>
            <button type="submit" class="btn btn-warning mt-3">Update Department</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/departments/edit.blade.php ENDPATH**/ ?>