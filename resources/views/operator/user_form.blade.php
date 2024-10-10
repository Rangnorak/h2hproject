@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ __('Form USER') }}</h5>
                <div class="card-body">
                    <form action="{{ route($route) }}" method="POST">
                        @csrf
                        @method($method) <!-- This will handle PUT, PATCH, or DELETE requests -->
                        
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $model->name ?? '') }}" autofocus>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $model->email ?? '') }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="nohp">No HP</label>
                            <input type="text" name="nohp" id="nohp" class="form-control" value="{{ old('nohp', $model->nohp ?? '') }}">
                            <span class="text-danger">{{ $errors->first('nohp') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="akses">Hak Akses</label>
                            <select name="akses" id="akses" class="form-control">
                                <option value="operator" {{ old('akses', $model->akses ?? '') == 'operator' ? 'selected' : '' }}>Operator Kampus</option>
                                <option value="admin" {{ old('akses', $model->akses ?? '') == 'admin' ? 'selected' : '' }}>Admin Keuangan</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('akses') }}</span>
                        </div>                        
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>                        
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
