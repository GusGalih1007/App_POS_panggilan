@extends('admin.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success">
                    <h1 class="card-title">Form User</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $dataEdituser->user_id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT" />

                        <div class="form-group">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ $dataEdituser->name }}"></br>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">Email :</label>
                            <input type="email" class="form-control" name="email"
                                value="{{ $dataEdituser->email }}"></br>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">Password :</label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">Role :</label><br>
                            <input type="radio" name="role" value="Admin"
                                {{ $dataEdituser->role == 'Admin' ? 'checked' : '' }}>Admin
                            <input type="radio" name="role" value="Cashier"
                                {{ $dataEdituser->role == 'Cashier' ? 'checked' : '' }}>Cashier</br>
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
