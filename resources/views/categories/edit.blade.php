@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success">
                <h1 class="card-title">Form Category</h1>
            </div>
            <div class="card-body">
                <form action="{{route('category.update',$dataEditcategory->category_id)}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        Category Name : <input type="text" class="form-control" name="category_name" value="{{$dataEditcategory->category_name}}" /></br>
                        @if ($errors->has('category_name'))
                        <span class="text-danger">{{ $errors->first('category_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        Description : <textarea class="form-control" name="description">{{$dataEditcategory->description}}</textarea></br>
                        @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('category.index')}}" class="btn btn-light">Back</a>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
