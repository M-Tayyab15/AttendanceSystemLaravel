

<?php $__env->startSection('content'); ?>
<div class="container">
<h2>Employees in the Designation: <?php echo e($designation->designation); ?></h2>

    <!-- Go Back Button -->
    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Go Back
    </a>

<table class="table">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $designation->employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($employee->id); ?></td>
                <td><?php echo e($employee->first_name); ?></td>
                <td><?php echo e($employee->last_name); ?></td>
                <td><?php echo e($employee->email); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/designations/show.blade.php ENDPATH**/ ?>