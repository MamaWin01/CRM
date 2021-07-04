<?php

namespace App\Http\Controllers;

use App\Models\Prospects;
use Illuminate\Http\Request;
use App\Models\ProspectContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prospect\StoreProspectRequest;
use App\Http\Requests\Prospect\Contacts\StoreContactRequest;
use App\Http\Requests\Prospects\Contacts\UpdateContactRequest;

class ProspectContactController extends Controller
{
    public function create(prospects $prospect)
    {
        return view('prospects.contact.create', compact('prospect'));
    }

    public function store(StoreContactRequest $request, Prospects $prospect)
    {
        $contact = ProspectContact::updateOrCreate(['prospect_id' => $prospect->id], $request->validated());

        return redirect()->route('admin.prospects.show', $prospect->id)->with('success', 'Successfully Create New Prospect');
    }
    public function update(UpdateContactRequest $request, Prospects $prospect)
    {
        $prospect->contact->update($request->validated());

        return redirect()->route('admin.prospects.edit', $prospect->id)->with('success', 'Successfully updated prospect contact details!');
    }
}
