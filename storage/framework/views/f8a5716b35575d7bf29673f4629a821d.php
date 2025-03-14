

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Shift Details</h1>

    <div>
        <strong>Shift Name:</strong> <?php echo e($shift->shift_name); ?><br>
        <strong>In Time:</strong> <?php echo e($shift->in_time); ?><br>
        <strong>Out Time:</strong> <?php echo e($shift->out_time); ?><br>
        <strong>Grace Time:</strong> <?php echo e($shift->grace_time); ?><br>
    </div>

    <a href="<?php echo e(route('shifts.index')); ?>" class="btn btn-secondary mt-3">Back to List</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/shifts/show.blade.php ENDPATH**/ ?>