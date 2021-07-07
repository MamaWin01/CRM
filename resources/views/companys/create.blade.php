@extends('layout.app')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex">
                    <h1>{{__('Create Company')}}</h1>

                    <div class="ml-auto">
                        <div class="dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle btn btn-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__('Action')}}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="{{ route('admin.companys.dashboard')}}">{{__('Home')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr style="color:white">
                @if ($errors->count())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $message)
                            {{ $message }}
                        @endforeach
                    </div>
                @endif


                    <form action="{{ route('admin.companys.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name" style="font-family:Arial; opacity:85%; color:rgba(170, 170, 170, 0.925);">{{__('Name')}}</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Insert Name" style="font-family:Arial; opacity:85%;" value="{{ old('name')}}">
                            @error('name')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback" style="font-size:15px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" style="font-family:Arial; opacity:90%; color:rgba(170, 170, 170, 0.925);">{{__('Email')}}</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Insert Email" style="font-family:Arial; opacity:85%;" value="{{ old('Email')}}">
                            @error('email')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback" style="font-size:15px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Image')}}</label>
                            <input type="file" class="form-control-file btn-light" id="logo "alt="Image Failed to Load">
                            @error('logo')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback" style="font-size:15px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="website" style="font-family:Arial; opacity:90%; color:rgba(170, 170, 170, 0.925);">{{__('Company Website')}}</label>
                            <input class="form-control @error('website') is-invalid @enderror" id="website" name="website" placeholder="Company Website" type="text" style="font-family:Arial; opacity:90%; color:rgba(170, 170, 170, 0.925);"value="{{ old('website')}}">
                            @error('website')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback" style="font-size:15px">{{ $message }}</div>
                            @enderror
                        </div>
                            <button class="btn btn-primary " name="submit" type="submit" style="font-family:Arial; opacity:90%;">{{__('Submit')}}</button>
                    </form>

            </div>
        </div>
    </div>
@endsection
