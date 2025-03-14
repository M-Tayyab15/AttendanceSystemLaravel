

<head>
<title>Manage Shifts</title>
</head>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Manage Shifts</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('shifts.create')); ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add Shift
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Shift Name</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Grace Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($shift->id); ?></td>
                    <td><?php echo e($shift->shift_name); ?></td>
                    <td><?php echo e($shift->in_time); ?></td>
                    <td><?php echo e($shift->out_time); ?></td>
                    <td><?php echo e($shift->grace_time); ?></td>
                    <td>
                        <a href="<?php echo e(route('shifts.show', $shift->id)); ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?php echo e(route('shifts.edit', $shift->id)); ?>" class="btn btn-warning btn-sm">Edit</a>

                        <form action="<?php echo e(route('shifts.destroy', $shift->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/shifts/index.blade.php ENDPATH**/ ?>