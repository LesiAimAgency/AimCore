<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of employees.
     */
    public function index()
    {
        $user = auth()->user();

        // If the manager has subordinates explicitly defined by manager_id, we can show them.
        // For broader access, we could just show all users with the 'employee' role.
        // Let's show all employees for now to ensure data visibility.
        $employees = User::where('role', 'employee')
            ->orWhereHas('roles', function($q) {
                $q->where('name', 'employee');
            })
            ->with(['tasks' => function($q) {
                // Eager load recent tasks for a quick summary
                $q->latest()->limit(5);
            }])
            ->get();

        return view('manager.employees.index', compact('employees'));
    }

    /**
     * Display the specified employee.
     */
    public function show($id)
    {
        $employee = User::with(['tasks' => function($q) {
            $q->latest();
        }])->findOrFail($id);

        return view('manager.employees.show', compact('employee'));
    }
}
