<?php

namespace App\Http\Controllers;

use view;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index', [
            'companies' => Company::leftJoin('industries', 'industries.id', '=', 'company.industries_id')
            ->select('industries.name as industry_name', 'company.*')
            ->get()
        ]);
    }

    public function info($id){
        return Company::find($id);
    }


    public function create()
    {
        $industries =DB::table('industries')->get();
        // dd($industries);
        return view('company.create', [
            'list' => $industries
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
