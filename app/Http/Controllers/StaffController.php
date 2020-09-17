<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StaffRequest;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $companies = Company::all();
        $staff =Staff::latest()->paginate(10);
        return view('staff.index', compact('companies', 'staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('staff.create', compact('companies'));
    }

    public function store(StaffRequest $request)
    {


        Staff ::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'company_id'=>$request->company_id,
            'email'=>$request->email,
            'phone'=>$request->phone

        ]);
        return redirect()->route('staff.index')->with('success', 'Staff Added');
    }

    public function show(Staff $staff)
    {

        $companies = Company::all();

        return view('staff.show', compact('staff', 'companies'));
    }

    public function edit(Staff $staff)
    {
        $companies = Company::all();
        return view('staff.edit', compact('staff', 'companies'));
    }

    public function update(StaffRequest $request, Staff $staff)
    {



         $staff->update([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'company_id'=>$request->company_id,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);
        return redirect()->route('staff.index', 'Success update');
    }


    public function destroy(Staff $staff)
    {
        $staff->delete();
       return redirect()->route('staff.index');
    }
}
