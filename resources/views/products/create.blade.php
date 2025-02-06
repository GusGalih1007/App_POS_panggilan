@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark">
                <h1 class="card-title">FORM PRODUCTS</h1>
            </div>
            <div class="card-body">

                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}"></br>
                    @if ($errors->has('product_name'))
                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="mb-3">
                    <label>Foto Produk:</label>
                    <input type="file" class="form-control" name="photo">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="category_id">Product Category</label><br>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($dataCategory as $v)
                        <option value="{{ $v->category_id }}" @if (old('category_id')==$v->category_id) selected @endif>{{ $v->category_name }}</option>
                        @endforeach
                    </select></br>

                    @if ($errors->has('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}"></br>
                    @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" class="form-control" name="stock" value="{{ old('stock') }}"></br>
                    @if ($errors->has('stock'))
                    <span class="text-danger">{{ $errors->first('stock') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Product Description</label>
                    <textarea type="text" class="form-control" name="product_description">{{ old('product_description') }}</textarea></br>
                    @if ($errors->has('product_description'))
                    <span class="text-danger">{{ $errors->first('product_description') }}</span>
                    @endif
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('product.index')}}" class="btn btn-light">Back</a>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
