@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success">
                <h1 class="card-title">FORM PRODUCTS</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update',$dataEditproduct) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="PUT" />

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="product_name" value="{{$dataEditproduct->product_name}}"></br>
                        @if ($errors->has('product_name'))
                        <span class="text-danger">{{ $errors->first('product_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto Produk:</label>
                        <input type="file" class="form-control" name="photo"><br>

                        @if($dataEditproduct->photo)
                        <p>Foto Saat Ini: <img src="{{ asset('storage/' . $dataEditproduct->photo) }}"
                                alt="{{ $dataEditproduct->product_name }}" width="100"></p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Product Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $v)
                            <option value="{{ $v->category_id }}" {{ $v->category_id ==
                                $dataEditproduct->category_id ? 'selected' : '' }}>{{ $v->category_name }}</option>
                            @endforeach
                        </select></br>
                        @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" value="{{$dataEditproduct->price}}"></br>
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="text" class="form-control" name="stock" value="{{$dataEditproduct->stock}}"></br>
                        @if ($errors->has('stock'))
                        <span class="text-danger">{{ $errors->first('stock') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea type="text" class="form-control" name="product_description">{{$dataEditproduct->product_description}}</textarea></br>
                        @if ($errors->has('product_description'))
                        <span class="text-danger">{{ $errors->first('product_description') }}</span>
                        @endif
                    </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{route('user.index')}}" class="btn btn-light">Back</a>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
