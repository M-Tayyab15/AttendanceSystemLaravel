

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Designation</h1>

    <!-- Go Back Button -->
    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Go Back
    </a>

    <form action="<?php echo e(route('designations.update', $designation->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" id="designation" name="designation" class="form-control" value="<?php echo e(old('designation', $designation->designation)); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/designations/edit.blade.php ENDPATH**/ ?>