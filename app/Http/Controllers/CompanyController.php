<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $company =Company::latest()->paginate(10);
        return view('company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $image = $request->file('image');
        $my_image = rand().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('image'), $my_image);



        Company ::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website,
            'image'=>$my_image,

        ]);
        return redirect()->route('company.index')->with('success', 'Company Added');
    }

    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $my_image=$request->my_image;

        $image=$request->file('image');
        if($image!=""){

            $my_image = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image'), $my_image);
        }else{
        }

         $company->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "website"=>$request->website,
            "image"=>$my_image,
        ]);
        return redirect()->route('company.index', 'Success update');
    }


    public function destroy(Company $company)
    {
        $company->delete();
       return redirect()->route('company.index');
    }
}
