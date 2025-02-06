@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success">
                <h1 class="card-title">Form Customer</h1>
            </div>
            <div class="card-body">
                <form action="{{route('customer.update', $dataEditcustomer->customer_id)}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="form-group">
                        <label>Customer Name :</label>
                        <input type="text" class="form-control" name="customer_name" value="{{$dataEditcustomer->customer_name}}"></br>
                        @if ($errors->has('customer_name'))
                        <span class="label label-danger">{{ $errors->first('customer_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Email : </label>
                        <input type="email" class="form-control" name="email" value="{{$dataEditcustomer->email}}"></br>
                        @if ($errors->has('email'))
                        <span class="label label-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        Phone : <input type="number" class="form-control" name="phone" value="{{$dataEditcustomer->phone}}"></br>
                        @if ($errors->has('phone'))
                        <span class="label label-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        Member Status : <br><input type="radio" name="member_status" value=1 {{ ($dataEditcustomer->member_status == 1) ?
                        'checked' : ''}}>True
                        <input type="radio" name="member_status" value=0 {{ ($dataEditcustomer->member_status == 0) ? 'checked' :
                        ''}}>False</br>
                        @if ($errors->has('member_status'))
                        <span class="label label-danger">{{ $errors->first('member_status') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        Address: <textarea class="form-control" name="address">{{$dataEditcustomer->address}}</textarea></br>
                        @if ($errors->has('address'))
                        <span class="label label-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('customer.index')}}" class="btn btn-light">Back</a>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
