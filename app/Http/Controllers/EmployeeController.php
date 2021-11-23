<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::latest()->paginate(4); 
       return view('employee.index',compact('employee'))-> with('i',(request()->input('page',1)-1)*4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = ['Part Time','Full Time'];

        return view('employee.create',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required',
        'type' => 'required',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = '';
        if($request->photo) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'),$imageName);

        }
        $data = new Employee;
        $data->name = $request->name;
        $data->type = $request->type;
        $data->joining_year = $request->joining_year;
        $data->photo = $imageName;
        $data->save();
        return redirect()->route('employee.index')->with('success','Employee Name has been added successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $types = ['Part Time','Full Time'];
        return view('employee.edit',compact('employee','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $imageName = '';
        if ($request->photo) {
            $imageName = time() .'.'. $request->photo->extension();
            $request->photo->move(public_path('uploads'),$imageName);
            $employee->photo = $imageName;
        }

        $employee->name = $request->name;
        $employee->type = $request->type;
        $employee->joining_year = $request->joining_year;
        $employee->update();
        return redirect()->route('employee.index')->with('success','Employee has been successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Employee has been deleted successfully');
    }
}
