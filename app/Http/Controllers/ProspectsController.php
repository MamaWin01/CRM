<?php

namespace App\Http\Controllers;

use App\Models\Prospects;
use Illuminate\Pagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Prospect\StoreProspectRequest;
use App\Http\Requests\Prospect\UpdateProspectRequest;
use App\Http\Requests\Prospect\UpdateProfileImageRequest;

class ProspectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prospects.index', ['prospects' => Prospects::latest()->paginate(20)]);
    }

    // public function employee()
    // {
    //     return view('employee.index', ['prospects' => Prospects::latest()->paginate(20)]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prospects.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProspectRequest $request)
    {
        // return $request->validate(); validation already on StoreProspectRequest
        $prospect = Prospects::create($request->only('name','email','website'));

        if ($request->hasFile('logo')) {
            $path = $request->logo->store('public/Company/logo');
            $prospect->update(['logo'=> $path]);
        }

        return redirect()->route('admin.prospects.dashboard', $prospect->id)->with('success', 'Succesfully Create New Companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prospects $prospect)
    {
        return $prospect->load('contact');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospects $prospect)
    {
        return view('prospects.edit', compact('prospect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProspectRequest $request, Prospects $prospect)
    {
        $prospect->update($request->validated());

        return back()->with('success', 'Successfully updated prospect details!');
    }

    public function updateProfileImage(UpdateProfileImageRequest $request, Prospects $prospect)
    {
        if ($prospect->logo) {
            Storage::delete($prospect->logo);
        }
        $path = $request->image->store('public/Company/logo');

        $prospect->update(['logo' => $path]);

        return back()->with('success', 'Successfully updated profile image');
    }

    public function destroyProfileImage(Prospects $prospect)
    {
        if ($prospect->logo) {
            Storage::delete($prospect->logo);

            $prospect->update(['logo' => null]);
        }

        return back()->with('success', 'Successfully deleted profile image!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Prospects $prospect)
    {
        if ($prospect->logo) {
            Storage::delete($prospect->logo);
        }

        $prospect->delete();

        return redirect()->route('admin.prospects.dashboard')->with('succees', 'Successfully Delete Prospect');
    }

}
