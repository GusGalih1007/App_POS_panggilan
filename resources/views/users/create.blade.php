@extends('admin.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h1 class="card-title">Form User</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"></br>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"></br>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password :</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}"></br>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="role" class="form-label">Role :</label><br>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="role" class="form-check-input" value="Admin" checked>
                                <label for="role" class="form-check-label">Admin</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="role" class="form-check-input" value="Cashier">
                                <label for="role" class="form-check-label">Cashier</label>
                            </div>

                            <br>
                            @if ($errors->has('role'))
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                            @endif

                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('user.index') }}" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
