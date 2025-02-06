@extends('admin.admin')
@section('content')

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="card-title">Form Category</h1>
            </div>

            <div class="card-body">

                <form action="{{route('category.store')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="category_name" class="form-label">Category Name :</label>
                        <input type="text" name="category_name" value="{{ old('category_name') }}" class="form-control"/></br>
                        @if ($errors->has('category_name'))
                        <span class="text-danger">{{ $errors->first('category_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description :</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea></br>
                        @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

            </div>

            <div class="card-footer">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    <a href="{{ route('category.index')}}" class="btn btn-light btn-sm">Back</a>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
