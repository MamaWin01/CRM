<form action="{{ route('admin.prospects.contacts.update', $prospect_id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="" class="col-md-3">First Name</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="first_name" value="{{ $contact->first_name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-3">Last Name</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="last_name" value="{{ $contact->last_name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-3">Website</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="website" value="{{ $contact->website }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-3">Phone</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}">
        </div>
    </div>
    <button class="btn btn-primary float-right">Update Contact Details</button>
</form>
