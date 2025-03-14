<!-- resources/views/layouts/sidebar.blade.php -->

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/dashboard')); ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Manage Employees Link -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/employees')); ?>">
                <i class="bi bi-people"></i>
                <span>Manage Employees</span>
            </a>
        </li><!-- End Manage Employees Nav -->

        <!-- Manage Departments Link -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/departments')); ?>">
                <i class="bi bi-building"></i> <!-- Icon for departments -->
                <span>Manage Departments</span>
            </a>
        </li><!-- End Manage Departments Nav -->

        <!-- Manage Designations Link -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/designations')); ?>">
                <i class="bi bi-person-badge"></i> <!-- Icon for designations -->
                <span>Manage Designations</span>
            </a>
        </li><!-- End Manage Designations Nav -->

        <!-- Manage Shifts Link -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/shifts')); ?>">
                <i class="bi bi-clock"></i> <!-- Icon for shifts -->
                <span>Manage Shifts</span>
            </a>
        </li><!-- End Manage Shifts Nav -->

        <!-- Add more navigation items here as required -->
    </ul>
</aside><!-- End Sidebar-->
<?php /**PATH F:\AttendanceSystem-3616\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>