<div class="container">
    <div class="card mt-3 company-card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    @if ($company->logo)
                        <img src="{{ Storage::url($company->logo) }}" alt="">
                    @else
                        <img src="/image/user.png" style="max-width: 100%; max-height: 100px;" alt="">
                    @endif
                </div>
                <div class="col-sm-6 col-md-8">
                    <h5>{{ $company->name }}</h5>
                    <ul class="list-style-none">
                        <li><string>{{__('Email :')}}</string> {{ $company->email}}</li>
                        <li><strong>{{__('Website: ')}}</strong>{{ $company->website}}</li>
                    </ul>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="dropdown d-block">
                        <button class="btn btn-outline-secondary btn-block btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('Actions')}}
                        </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('admin.companys.edit', ['company' => $company->id]) }}">{{__('Edit Company')}}</a>
                                {{-- <a class="dropdown-item" href="{{ route('admin.companys.employee', ['company' => $company->id]) }}">View Employee</a> --}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
