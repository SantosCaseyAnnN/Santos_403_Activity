<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class Employees extends Component
{
    public $employee_number = '';
    public $position = '';
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $date_hired = '';

    public $search = '';
    public $editingId = null;

    protected $rules = [
        'employee_number' => 'required|string|max:50',
        'position'       => 'required|string|max:100',
        'first_name'     => 'required|string|max:100',
        'last_name'      => 'required|string|max:100',
        'email'          => 'required|email|max:255',
        'phone'          => 'required|string|max:30',
        'date_hired'     => 'required|date',
    ];

    public function saveEmployee()
    {
        $this->validate();

        if ($this->editingId) {

            $employee = Employee::findOrFail($this->editingId);

            $employee->update([
                'employee_number' => $this->employee_number,
                'position'        => $this->position,
                'first_name'      => $this->first_name,
                'last_name'       => $this->last_name,
                'email'           => $this->email,
                'phone'           => $this->phone,
                'date_hired'      => $this->date_hired,
            ]);

            session()->flash('message', 'Employee updated successfully.');

        } else {

            Employee::create([
                'employee_number' => $this->employee_number,
                'position'        => $this->position,
                'first_name'      => $this->first_name,
                'last_name'       => $this->last_name,
                'email'           => $this->email,
                'phone'           => $this->phone,
                'date_hired'      => $this->date_hired,
            ]);

            session()->flash('message', 'Employee added successfully.');
        }

        $this->resetForm();
    }

    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);

        $this->editingId = $employee->id;

        $this->employee_number = $employee->employee_number;
        $this->position = $employee->position;
        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->date_hired = $employee->date_hired;
    }

    public function deleteEmployee($id)
    {
        Employee::findOrFail($id)->delete();

        session()->flash('message', 'Employee deleted successfully.');
    }

    public function resetForm()
    {
        $this->reset([
            'employee_number',
            'position',
            'first_name',
            'last_name',
            'email',
            'phone',
            'date_hired',
            'editingId',
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        $employees = Employee::query()
            ->where(function ($query) {
                $query->where('employee_number', 'like', '%' . $this->search . '%')
                    ->orWhere('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('position', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->get();

        return view('employees', [
            'employees' => $employees,
        ]);
    }
}
