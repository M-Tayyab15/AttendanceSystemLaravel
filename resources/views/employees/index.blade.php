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
    @extends('layouts.app')

    @section('content')
    <div class="main">
        <div class="pagetitle">
            <h1>Manage Employees</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Employees</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <!-- Search Bar -->
            <input type="text" id="searchInput" class="form-control w-50" placeholder="Search employees...">

            <!-- Add Employee Button -->
            <a href="{{ route('employees.create') }}" class="btn btn-primary btn-add">
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
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->emp_code }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->joining_date }}</td>
                    <td>{{ $employee->department ? $employee->department->department_name : 'N/A' }}</td>
                    <td>{{ $employee->designation ? $employee->designation->designation : 'N/A' }}</td>

                    <td>
                        <!-- Dropdown Menu -->
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $employee->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i> Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $employee->id }}">
                                <li><a class="dropdown-item" href="{{ route('employees.view', $employee->id) }}"><i class="fas fa-eye"></i> View</a></li>
                                <li><a class="dropdown-item" href="{{ route('employees.edit', $employee->id) }}"><i class="fas fa-edit"></i> Edit</a></li>
                                <li>
                                    <button type="button" class="dropdown-item text-danger" data-employee-id="{{ $employee->id }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                {{ $employees->links('pagination::bootstrap-4') }}
            </ul>
        </nav>
    </div>

    <!-- Delete Confirmation Modal for this employee -->
    @foreach ($employees as $employee)
    <div class="modal fade" id="deleteConfirmationModal{{ $employee->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel{{ $employee->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $employee->id }}">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to deactivate this employee? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Deactivate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endsection

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