<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>

    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-add {
            margin-bottom: 20px;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .sort {
            color: white;
        }

        .dropdown-menu {
            min-width: 120px;
        }

        .dropdown-item {
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    

    <?php $__env->startSection('content'); ?>
    <div class="main">
        <div class="pagetitle">
            <h1>Manage Employees</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Manage Employees</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between mb-3">
            <!-- Search Bar -->
            <input type="text" id="searchInput" class="form-control w-50" placeholder="Search employees...">

            <!-- Add Employee Button -->
            <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-primary btn-add">
                <i class="fas fa-plus"></i> Add Employee
            </a>
        </div>

        <!-- Employee Table -->
        <table id="employeesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><a href="#" class="sort" data-sort="id">ID <i class="fas fa-sort"></i></a></th>
                    <th><a href="#" class="sort" data-sort="emp_code">Emp Code <i class="fas fa-sort"></i></a></th>
                    <th><a href="#" class="sort" data-sort="first_name">First Name <i class="fas fa-sort"></i></a></th>
                    <th><a href="#" class="sort" data-sort="last_name">Last Name <i class="fas fa-sort"></i></a></th>
                    <th><a href="#" class="sort" data-sort="email">Email <br> <i class="fas fa-sort"></i></a></th>
                    <th><a href="#" class="sort" data-sort="joining_date">Joining Date <i class="fas fa-sort"></i></a></th>
                    <th><a href="#" class="sort" data-sort="department_id">Department <i class="fas fa-sort"></i></a></th>
                    <th><a href="#" class="sort" data-sort="designation_id">Designation <i class="fas fa-sort"></i></a></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($employee->id); ?></td>
                    <td><?php echo e($employee->emp_code); ?></td>
                    <td><?php echo e($employee->first_name); ?></td>
                    <td><?php echo e($employee->last_name); ?></td>
                    <td><?php echo e($employee->email); ?></td>
                    <td><?php echo e($employee->joining_date); ?></td>
                    <td><?php echo e($employee->department ? $employee->department->department_name : 'N/A'); ?></td>
                    <td><?php echo e($employee->designation ? $employee->designation->designation : 'N/A'); ?></td>

                    <td>
                        <!-- Dropdown Menu -->
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton<?php echo e($employee->id); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i> Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo e($employee->id); ?>">
                                <li><a class="dropdown-item" href="<?php echo e(route('employees.view', $employee->id)); ?>"><i class="fas fa-eye"></i> View</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('employees.edit', $employee->id)); ?>"><i class="fas fa-edit"></i> Edit</a></li>
                                <li>
                                    <button type="button" class="dropdown-item text-danger" data-employee-id="<?php echo e($employee->id); ?>">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php echo e($employees->links('pagination::bootstrap-4')); ?>

            </ul>
        </nav>
    </div>

    <!-- Delete Confirmation Modal for this employee -->
    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="deleteConfirmationModal<?php echo e($employee->id); ?>" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel<?php echo e($employee->id); ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($employee->id); ?>">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to deactivate this employee? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="<?php echo e(route('employees.destroy', $employee->id)); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Yes, Deactivate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopSection(); ?>

</body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle click events for the delete buttons
        $(document).on('click', '[data-employee-id]', function(e) {
            var employeeId = $(this).data('employee-id');
            var modalId = '#deleteConfirmationModal' + employeeId;
            var modalElement = document.querySelector(modalId);

            if (modalElement) {
                var modalInstance = new bootstrap.Modal(modalElement);
                modalInstance.show();
            }
        });
    });
</script>

</html>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/employees/index.blade.php ENDPATH**/ ?>