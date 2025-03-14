


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Manage Designations</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('designations.create')); ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add Designation
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Designation</th>
                <th>Number of Employees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($designation->id); ?></td>
                    <td><?php echo e($designation->designation); ?></td>
                    <td><?php echo e($designation->employees_count); ?></td> 
                    <td>
                        <a href="<?php echo e(route('designations.show', $designation->id)); ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?php echo e(route('designations.edit', $designation->id)); ?>" class="btn btn-warning btn-sm">Edit</a>

                        <form action="<?php echo e(route('designations.destroy', $designation->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <nav>
        <?php echo e($designations->links()); ?>

    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/designations/index.blade.php ENDPATH**/ ?>