

<head>
    <style>
        .clock-container {
    margin-top: 20px;
}

#clock {
    color: #007bff;
    font-size: 2rem;
    font-weight: bold;
}
</style>
</head>

<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    
    <!-- Add your dashboard content here -->

    <!-- Clock Section -->
    <div class="clock-container text-center">
        <div id="clock" style="font-size: 2rem; font-weight: bold;"></div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function updateClock() {
            // Create a new Date object
            const now = new Date();
            
            // Get the current time in HH:MM:SS format
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            const currentTime = `${hours}:${minutes}:${seconds}`;
            
            // Update the clock div with the current time
            document.getElementById('clock').textContent = currentTime;
        }
        
        // Call updateClock every 1000 milliseconds (1 second)
        setInterval(updateClock, 1000);

        // Initialize the clock immediately when the page loads
        updateClock();
    </script>
<?php $__env->stopPush(); ?>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\AttendanceSystem-3616\resources\views/dashboard.blade.php ENDPATH**/ ?>