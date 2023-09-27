<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Locations;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addCompany(Request $request)
    {
        $company = new Company;
        $company->company_name = $request['company_name'];
        $company->description = $request['description'];
        $company->status = 1;
        $company->save();

        $location = new Locations;
        $location->country = $request['country'];
        $location->city = $request['city'];
        $location->state = $request['state'];
        $location->company_id = $company->id;
        $location->save();

        $data = 'Company Has been Added';
        return response($data, 200)->header('Content-type', 'application/json');
    }

    public function getCompany(Request $request)
    {
        $data = Company::with('locations')->with('manager')->get();
        return response($data, 200)->header('Content-type', 'application/json');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
