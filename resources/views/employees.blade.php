<div>

    <style>
        .employee-page {
            background: #f5f6f8;
            min-height: 100vh;
            padding: 15px 18px;
            font-family: Arial, Helvetica, sans-serif;
            color: #222;
        }

        .page-title {
            margin-bottom: 15px;
        }

        .page-title h1 {
            font-size: 20px;
            margin: 0;
            font-weight: 600;
        }

        .page-title p {
            margin: 3px 0 0;
            font-size: 11px;
            color: #777;
        }

        /* ADD EMPLOYEE */

        .employee-form {
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,.12);
            overflow: hidden;
            margin-bottom: 18px;
        }

        .form-header {
            background: #004edf;
            color: white;
            padding: 12px 17px;
            font-size: 13px;
            font-weight: bold;
        }

        .form-header span {
            margin-right: 8px;
        }

        .form-body {
            padding: 18px 16px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 16px;
            row-gap: 12px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 10px;
            margin-bottom: 5px;
            color: #444;
        }

        .form-group input {
            height: 27px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px 8px;
            font-size: 11px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #e52424;
        }

        .full-width {
            width: 50%;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 16px;
        }

        .save-btn {
            background: #00a2ff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 7px 14px;
            font-size: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        .save-btn:hover {
            background: #0400ff75;
        }

        .cancel-btn {
            background: #777;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 7px 14px;
            font-size: 10px;
            font-weight: bold;
            cursor: pointer;
            margin-right: 7px;
        }

        /* EMPLOYEE LIST */

        .employee-list {
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,.12);
            overflow: hidden;
        }

        .list-header {
            padding: 12px 16px 5px;
        }

        .list-header h2 {
            font-size: 12px;
            margin: 0;
        }

        .list-header p {
            color: #777;
            font-size: 9px;
            margin: 3px 0 7px;
        }

        .search-box {
            padding: 0 16px 10px;
        }

        .search-box input {
            width: 100%;
            height: 26px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px 8px;
            font-size: 10px;
            outline: none;
        }

        .search-box input:focus {
            border-color: #0554ff;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }

        th {
            background: #f8f9fa;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding: 9px 10px;
            text-align: left;
            font-weight: bold;
            color: #444;
        }

        td {
            border-bottom: 1px solid #eee;
            padding: 9px 10px;
            color: #444;
        }

        tr:hover td {
            background: #fafafa;
        }

        .employee-number {
            background: #f2f2f2;
            border: 1px solid #ddd;
            padding: 2px 5px;
            border-radius: 2px;
            font-size: 9px;
        }

        .actions {
            white-space: nowrap;
        }

        .edit-btn {
            background: #fffbea;
            color: #7d6200;
            border: 1px solid #eadb91;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 9px;
            cursor: pointer;
        }

        .delete-btn {
            background: #fff0f0;
            color: #a51c1c;
            border: 1px solid #e6aaaa;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 9px;
            cursor: pointer;
            margin-left: 4px;
        }

        .edit-btn:hover {
            background: #fff3c4;
        }

        .delete-btn:hover {
            background: #ffdcdc;
        }

        .error {
            color: #dc2626;
            font-size: 9px;
            margin-top: 3px;
        }

        .message {
            background: #e8f7e8;
            color: #237523;
            border: 1px solid #b8dfb8;
            padding: 8px 12px;
            border-radius: 4px;
            margin-bottom: 12px;
            font-size: 11px;
        }

        .empty {
            text-align: center;
            color: #888;
            padding: 20px;
        }

        @media (max-width: 700px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                width: 100%;
            }
        }
    </style>


    <div class="employee-page">

        {{-- TITLE --}}
        <div class="page-title">
            <h1>Employee Management</h1>
            <p>Add and manage employee records.</p>
        </div>


        {{-- SUCCESS MESSAGE --}}
        @if (session()->has('message'))
            <div class="message">
                {{ session('message') }}
            </div>
        @endif


        {{-- ADD / EDIT EMPLOYEE --}}
        <div class="employee-form">

            <div class="form-header">
                <span>♙</span>

                @if($editingId)
                    Edit Employee
                @else
                    Add Employee
                @endif
            </div>


            <div class="form-body">

                <form wire:submit="saveEmployee">

                    <div class="form-grid">

                        {{-- EMPLOYEE NUMBER --}}
                        <div class="form-group">
                            <label>Employee Number</label>

                            <input
                                type="text"
                                wire:model="employee_number"
                                placeholder="001"
                            >

                            @error('employee_number')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- POSITION --}}
                        <div class="form-group">
                            <label>Position</label>

                            <input
                                type="text"
                                wire:model="position"
                                placeholder="CEO"
                            >

                            @error('position')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- FIRST NAME --}}
                        <div class="form-group">
                            <label>First Name</label>

                            <input
                                type="text"
                                wire:model="first_name"
                                placeholder="First Name"
                            >

                            @error('first_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- LAST NAME --}}
                        <div class="form-group">
                            <label>Last Name</label>

                            <input
                                type="text"
                                wire:model="last_name"
                                placeholder="Last Name"
                            >

                            @error('last_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- EMAIL --}}
                        <div class="form-group">
                            <label>Email Address</label>

                            <input
                                type="email"
                                wire:model="email"
                                placeholder="email@example.com"
                            >

                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- PHONE --}}
                        <div class="form-group">
                            <label>Phone Number</label>

                            <input
                                type="text"
                                wire:model="phone"
                                placeholder="09XXXXXXXXX"
                            >

                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- DATE --}}
                        <div class="form-group full-width">
                            <label>Date Hired</label>

                            <input
                                type="date"
                                wire:model="date_hired"
                            >

                            @error('date_hired')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>


                    {{-- BUTTONS --}}
                    <div class="form-actions">

                        @if($editingId)
                            <button
                                type="button"
                                class="cancel-btn"
                                wire:click="resetForm"
                            >
                                CANCEL
                            </button>
                        @endif

                        <button type="submit" class="save-btn">
                            @if($editingId)
                                UPDATE EMPLOYEE
                            @else
                                SAVE EMPLOYEE
                            @endif
                        </button>

                    </div>

                </form>

            </div>
        </div>


        {{-- EMPLOYEE LIST --}}
        <div class="employee-list">

            <div class="list-header">

                <h2>Employee List</h2>

                <p>
                    {{ $employees->count() }} registered employee{{ $employees->count() != 1 ? 's' : '' }}
                </p>

            </div>


            {{-- SEARCH --}}
            <div class="search-box">

                <input
                    type="text"
                    wire:model.live="search"
                    placeholder="Search employees..."
                >

            </div>


            {{-- TABLE --}}
            <div class="table-container">

                <table>

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Position</th>
                            <th>Date Hired</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>

                        @forelse($employees as $index => $employee)

                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    <span class="employee-number">
                                        {{ $employee->employee_number }}
                                    </span>
                                </td>

                                <td>
                                    {{ $employee->first_name }}
                                    {{ $employee->last_name }}
                                </td>

                                <td>
                                    {{ $employee->email }}
                                </td>

                                <td>
                                    {{ $employee->phone }}
                                </td>

                                <td>
                                    {{ $employee->position }}
                                </td>

                                <td>
                                    {{ $employee->date_hired?->format('M d, Y') }}
                                </td>

                                <td class="actions">

                                    <button
                                        class="edit-btn"
                                        wire:click="editEmployee({{ $employee->id }})"
                                    >
                                        ✎ Edit
                                    </button>

                                    <button
                                        class="delete-btn"
                                        wire:click="deleteEmployee({{ $employee->id }})"
                                        wire:confirm="Are you sure you want to delete this employee?"
                                    >
                                        🗑 Delete
                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="empty">
                                    No employees found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
