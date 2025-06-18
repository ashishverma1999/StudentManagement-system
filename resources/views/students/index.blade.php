<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>

<body>
    <x-app-layout>
        <div class="container mt-4">
            <h2 class="mb-4">Student Management</h2>

            @can('student.create')
                <button class="btn btn-primary mb-3" onclick="openAddModal()">Add Student</button>
            @endcan



            <table id="studentTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>

        {{-- Modal --}}

        <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="studentForm">
                    @csrf
                    <input type="hidden" name="id" id="student_id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="studentModalLabel">Add Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>class</label>
                                <input type="text" name="class" id="class" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Section</label>
                                <input type="text" name="section" id="section" class="form-control" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
    <!-- Include jQuery and DataTables scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    @php
        $canEdit = auth()->user()->can('student.edit');
        $canDelete = auth()->user()->can('student.delete');
    @endphp

    <script>
        let table;

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });


            table = $('#studentTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('students.list') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'class'
                    },
                    {
                        data: 'section'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            return data == 1 ?
                                '<span class="badge bg-success">Active</span>' :
                                '<span class="badge bg-danger">Inactive</span>';
                        }
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            let buttons = '';

                            @if ($canEdit)
                                buttons +=
                                    `<button class="btn btn-sm btn-info" onclick="editStudent(${data})">Edit</button> `;
                            @endif

                            @if ($canDelete)
                                buttons +=
                                    `<button class="btn btn-sm btn-danger" onclick="deleteStudent(${data})">Delete</button> `;
                            @endif

                            buttons +=
                                `<button class="btn btn-sm btn-warning" onclick="toggleStatus(${data})">Toggle</button>`;

                            return buttons;
                        }
                    }
                ]
            });

            $('#studentForm').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let id = $('#student_id').val();
                let url = id ? `/students/update/${id}` :
                    "{{ route('students.store') }}";

                $.post(url, formData, function(res) {
                    $('#studentModal').modal('hide');
                    $('#studentForm')[0].reset();
                    table.ajax.reload();
                });
            });
        });

        function openAddModal() {
            $('#studentForm')[0].reset();
            $('#student_id').val('');
            $('#studentModalLabel').text('Add Student');
            $('#studentModal').modal('show');
        }

        function editStudent(id) {
            $.get(`/students/edit/${id}`, function(data) {
                $('#student_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#class').val(data.class);
                $('#section').val(data.section);
                $('#studentModalLabel').text('Edit Student');
                $('#studentModal').modal('show');
            });
        }

        function deleteStudent(id) {
            if (confirm('Are you sure ?')) {
                $.ajax({
                    url: `/students/delete/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        table.ajax.reload();
                    }
                });
            }
        }

        function toggleStatus(id) {
            $.post(`/students/status/${id}`, {
                _token: '{{ csrf_token() }}'
            }, function() {
                table.ajax.reload();
            });
        }
    </script>
</body>

</html>
