<form action="{{ route('admin.companys.employee.update', $company_id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="" class="col-md-3">First Name</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-3">Last Name</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-3">Website</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="website" value="{{ $employee->website }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-3">Phone</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
        </div>
    </div>
    <button class="btn btn-primary float-right">Update Employee Details</button>
</form>
