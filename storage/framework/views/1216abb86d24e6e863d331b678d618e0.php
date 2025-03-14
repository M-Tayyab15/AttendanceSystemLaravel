<!-- resources/views/departments/index.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Manage Departments</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Add Department
        </a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Number of Employees</th> <!-- New column for employee count -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($department->id); ?></td>
                        <td><?php echo e($department->department_name); ?></td>
                        <td><?php echo e($department->employees_count > 0 ? $department->employees_count : 'No Employees'); ?></td>

                        <td>
                            <a href="<?php echo e(route('departments.show', $department->id)); ?>" class="btn btn-info btn-sm">View</a>
                            <a href="<?php echo e(route('departments.edit', $department->id)); ?>" class="btn btn-warning btn-sm">Edit</a>

                            <form action="<?php echo e(route('departments.destroy', $department->id)); ?>" method="POST" style="display:inline;">
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
            <?php echo e($departments->links()); ?>

        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // Dynamically set the page title based on the first <h1> content
        document.addEventListener("DOMContentLoaded", function() {
            var firstH1 = document.querySelector('h1');  // Select the first <h1> element
            if (firstH1) {
                document.title = firstH1.innerText;  // Set the title of the tab to the <h1> text
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/departments/index.blade.php ENDPATH**/ ?>