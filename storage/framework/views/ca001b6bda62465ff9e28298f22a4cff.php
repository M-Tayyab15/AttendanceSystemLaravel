
<head>
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Shift</h1>

    <!-- Check if there are any error messages -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('shifts.update', $shift->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="shift_name" class="form-label">Shift Name</label>
            <input type="text" class="form-control" id="shift_name" name="shift_name" value="<?php echo e($shift->shift_name); ?>" required>
        </div>
        <div class="mb-3">
            <label for="in_time" class="form-label">In Time</label>
            <input type="time" class="form-control" id="in_time" name="in_time" value="<?php echo e($shift->in_time); ?>">
        </div>
        <div class="mb-3">
            <label for="out_time" class="form-label">Out Time</label>
            <input type="time" class="form-control" id="out_time" name="out_time" value="<?php echo e($shift->out_time); ?>">
        </div>
        <div class="mb-3">
            <label for="grace_time" class="form-label">Grace Time</label>
            <input type="text" class="form-control <?php $__errorArgs = ['grace_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="grace_time" name="grace_time" placeholder="Select Time" value="<?php echo e(old('grace_time')); ?>" required>
            <?php $__errorArgs = ['grace_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>

<script>
    flatpickr("#grace_time", {
        enableTime: true,
        noCalendar: true,    // Disable the calendar view
        dateFormat: "H:i:S", // Force 24-hour format with seconds (HH:mm:ss)
        time_24hr: true,     // Ensure it uses 24-hour format (e.g., 00:15:00)
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/shifts/edit.blade.php ENDPATH**/ ?>