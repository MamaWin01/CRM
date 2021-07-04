<div class="container">
    <div class="card mt-3 prospect-card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    @if ($prospect->logo)
                        <img src="{{ Storage::url($prospect->logo) }}" alt="">
                    @else
                        <img src="/image/user.png" style="max-width: 100%; max-height: 100px;" alt="">
                    @endif
                </div>
                <div class="col-sm-6 col-md-8">
                    <h5>{{ $prospect->name }}</h5>
                    <ul class="list-style-none">
                        <li><string>Email:</string> {{ $prospect->email}}</li>
                        <li><strong>Website:</strong>{{ $prospect->website}}</li>
                    </ul>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="dropdown d-block">
                        <button class="btn btn-outline-secondary btn-block btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Actions
                        </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('admin.prospects.edit', ['prospect' => $prospect->id]) }}">Edit Company</a>
                                {{-- <a class="dropdown-item" href="{{ route('admin.prospects.employee', ['prospect' => $prospect->id]) }}">View Employee</a> --}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
