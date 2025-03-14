

<?php $__env->startSection('content'); ?>
<div class="main">
    <h2 class="my-4 text-center">View Employee</h2>

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <!-- Employee Image -->
            <div class="text-center mb-4">
                <?php if($employee->image): ?>
                    <img src="<?php echo e(asset('images/employee/' . $employee->image)); ?>" alt="Employee Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <?php else: ?>
                    <img src="https://via.placeholder.com/150" alt="Default Employee Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <?php endif; ?>
            </div>

            <!-- Personal Details -->
            <h4 class="mb-3 text-primary">Personal Details</h4>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Employee Code:</th>
                        <td><?php echo e($employee->emp_code); ?></td>
                    </tr>
                    <tr>
                        <th>First Name:</th>
                        <td><?php echo e($employee->first_name); ?></td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td><?php echo e($employee->last_name); ?></td>
                    </tr>
                    <tr>
                        <th>Username:</th>
                        <td><?php echo e($employee->username); ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo e($employee->email); ?></td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td><?php echo e($employee->phone); ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?php echo e(ucfirst($employee->gender)); ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?php echo e(\Carbon\Carbon::parse($employee->DOB)->format('d-m-Y')); ?></td>
                    </tr>
                    <tr>
                        <th>Age:</th>
                        <td><?php echo e($employee->age); ?></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td><?php echo e($employee->address); ?></td>
                    </tr>
                    <tr>
                        <th>Country:</th>
                        <td><?php echo e($employee->country); ?></td>
                    </tr>
                    <tr>
                        <th>CNIC:</th>
                        <td><?php echo e($employee->cnic); ?></td>
                    </tr>
                    <tr>
                        <th>CNIC Expiry:</th>
                        <td><?php echo e(\Carbon\Carbon::parse($employee->cnic_expiry)->format('d-m-Y')); ?></td>
                    </tr>
                </tbody>
            </table>

            <!-- Academic Details -->
            <h4 class="mb-3 text-primary">Academic Details</h4>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Qualification:</th>
                        <td><?php echo e($employee->qualification); ?></td>
                    </tr>
                    <tr>
                        <th>Experience:</th>
                        <td><?php echo e($employee->experience); ?></td>
                    </tr>
                </tbody>
            </table>

            <!-- Career Details -->
            <h4 class="mb-3 text-primary">Career Details</h4>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Salary:</th>
                        <td><?php echo e($employee->salary); ?></td>
                    </tr>
                    <tr>
                        <th>Employment Status:</th>
                        <td><?php echo e(ucfirst($employee->emp_status)); ?></td>
                    </tr>
                    <tr>
                        <th>Employee Type:</th>
                        <td><?php echo e(ucfirst($employee->emp_type)); ?></td>
                    </tr>
                    <tr>
                        <th>Joining Date:</th>
                        <td><?php echo e(\Carbon\Carbon::parse($employee->joining_date)->format('d-m-Y')); ?></td>
                    </tr>
                    <tr>
                        <th>Resignation Date:</th>
                        <td><?php echo e($employee->resignation_date ? \Carbon\Carbon::parse($employee->resignation_date)->format('d-m-Y') : 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <th>Shift:</th>
                        <td>
                            <?php if($employee->shift): ?>
                                <?php echo e($employee->shift->shift_name); ?> 
                                <?php if($employee->shift->in_time && $employee->shift->out_time): ?>
                                    <br>Shift-in: <?php echo e(\Carbon\Carbon::parse($employee->shift->in_time)->format('H:i')); ?> 
                                    <br>Shift-out: <?php echo e(\Carbon\Carbon::parse($employee->shift->out_time)->format('H:i')); ?>

                                    <br>Total Hours: <?php echo e(\Carbon\Carbon::parse($employee->shift->in_time)->diffInHours($employee->shift->out_time)); ?> hours
                                <?php else: ?>
                                    <br>No shift-in/out times set
                                <?php endif; ?>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Department:</th>
                        <td><?php echo e($employee->department ? $employee->department->department_name : 'No Department'); ?></td>
                    </tr>
                    <tr>
                        <th>Designation:</th>
                        <td><?php echo e($employee->designation ? $employee->designation->designation : 'No Designation'); ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-3">
                <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/employees/view.blade.php ENDPATH**/ ?>