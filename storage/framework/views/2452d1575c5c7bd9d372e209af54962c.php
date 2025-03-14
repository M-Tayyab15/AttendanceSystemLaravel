<!-- resources/views/departments/show.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Department Details</h1>
        <p><strong>Department Name:</strong> <?php echo e($department->department_name); ?></p>
        <p><strong>Created On:</strong> <?php echo e($department->created_at); ?></p>
        <p><strong>Updated On:</strong> <?php echo e($department->updated_at); ?></p>

        <h3>Employees in this Department:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee Code</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $department->employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($employee->emp_code); ?></td>
                        <td><?php echo e($employee->first_name); ?></td>
                        <td><?php echo e($employee->last_name); ?></td>
                        <td><?php echo e($employee->username); ?></td>
                        <td><?php echo e($employee->email); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">No employees in this department.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="<?php echo e(route('departments.index')); ?>" class="btn btn-secondary">Back to List</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/departments/view.blade.php ENDPATH**/ ?>