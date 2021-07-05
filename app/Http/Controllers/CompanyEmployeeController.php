<?php

namespace App\Http\Controllers;

use App\Models\Companys;
use Illuminate\Http\Request;
use App\Models\CompanyEmployee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\Employee\StoreEmployeeRequest;
use App\Http\Requests\Company\Employee\UpdateEmployeeRequest;

class CompanyEmployeeController extends Controller
{
    public function create(Companys $company)
    {
        return view('companys.employee.create', compact('company'));
    }

    public function store(StoreEmployeeRequest $request, Companys $company)
    {
        $employee = CompanyEmployee::updateOrCreate(['company_id' => $company->id], $request->validated());

        return redirect()->route('admin.companys.show', $company->id)->with('success', 'Successfully Create New company');
    }
    public function update(UpdateEmployeeRequest $request, Companys $company)
    {
        $company->employee->update($request->validated());

        return redirect()->route('admin.companys.edit', $company->id)->with('success', 'Successfully updated company contact details!');
    }
}
