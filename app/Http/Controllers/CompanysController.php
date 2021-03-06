<?php

namespace App\Http\Controllers;

use App\Models\Companys;
use Illuminate\Pagination;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Requests\Company\UpdateProfileImageRequest;

class CompanysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companys.index', ['companys' => Companys::latest()->simplePaginate(10)]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companys.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Companys::create($request->only('name','email','website'));

        if ($request->hasFile('logo')) {
            $path = $request->logo->store('public/Company/logo');
            $company->update(['logo'=> $path]);
        }

        $company_data = [];
        if ($request->input('en_title')) {
            $company_data['en'] = [
                'title' => $request->input('en_title'),
                'full_text' => $request->input('en_full_text'),
            ];
        }
        if ($request->input('id_title')) {
            $company_data['id'] = [
                'title' => $request->input('id_title'),
                'full_text' => $request->input('id_full_text'),
            ];
        }

        return redirect()->route('admin.companys.dashboard', $company->id)->with('success', __('Succesfully Create New Companies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Companys $company)
    {
        return $company->load('employee');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Companys $company)
    {
        return view('companys.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Companys $company)
    {
        $company->update($request->validated());

        return back()->with('success', __('Successfully updated company details!'));
    }

    public function updateProfileImage(UpdateProfileImageRequest $request, Companys $company)
    {
        if ($company->logo) {
            Storage::delete($company->logo);
        }
        $path = $request->image->store('public/Company/logo');

        $company->update(['logo' => $path]);

        return back()->with('success', __('Successfully updated profile image'));
    }

    public function destroyProfileImage(Companys $company)
    {
        if ($company->logo) {
            Storage::delete($company->logo);

            $company->update(['logo' => null]);
        }

        return back()->with('success', __('Successfully deleted profile image!'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Companys $company)
    {
        if ($company->logo) {
            Storage::delete($company->logo);
        }

        $company->delete();

        return redirect()->route('admin.companys.dashboard')->with('succees', __('Successfully Delete Company'));
    }

}
