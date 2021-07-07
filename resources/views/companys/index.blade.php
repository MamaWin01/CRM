@extends('layout.app')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success')}}
            </div>
        @endif

        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex">
                    <h1 style="font-size:33px ">{{__('Company')}} <small style="font-size:28px" class="text-muted">{{__('Showing All Company')}}</small></h1>
                        <div class="ml-auto d-inline">
                            <div class="dropdown">
                                    <a id="navbarDropdown" class="dropdown-toggle btn btn-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{__('Action')}}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                                      <li><a class="dropdown-item" href="{{ route('admin.companys.create') }}">{{__('Create Company')}}</a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
{{-- Card Style For Logo --}}
        @if ($companys->count())
            {{ $companys->links()}}
            @foreach ($companys as $cmp)
                @include('companys.partials.company-card', ['company' => $cmp])
            @endforeach

        @endif











{{-- Table Style Cant show Logo --}}
                {{-- @if ($companys->count())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                {{-- <th>No</th> --}}
                                {{-- <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companys as $cmp)
                                <tr> --}}
                                    {{-- <th scope="row">{{ $loop ->iteration}}</th> --}}
                                    {{-- <td>{{ $cmp-> name }}</td>
                                    <td>{{ $cmp-> email }}</td>
                                    <td>{{ $cmp-> logo }}</td>
                                    <td>{{ $cmp-> website }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif --}}

@endsection



