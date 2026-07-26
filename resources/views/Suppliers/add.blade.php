@extends('layouts.app')

@section('title','Add Supplier')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">
        Add Supplier
    </div>

    <div class="card-body">

        <form action="/suppliers/add" method="post">
            @csrf
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Supplier Name</label>
                    <input type="text" name="supp_name" class="form-control {{$errors->first()?'input-error':''}}">
                    <span class="text-danger error-message">@error('supp_name'){{$message}}@enderror</span>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Contact Person</label>
                    <input type="text" name="contact_person" class="form-control{{$errors->first()?'input-error':''}}">
                    <span class="text-danger error-message">@error('contact_person'){{$message}}@enderror</span>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control {{$errors->first()?'input-error':''}}">
                    <span class="text-danger error-message">@error('phone'){{$message}}@enderror</span>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control{{$errors->first()?'input-error':''}}">
                    <span class="text-danger error-message">@error('email'){{$message}}@enderror</span>
                </div>
                
                <div class="col-12 mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control{{$errors->first()?'input-error':''}}"></textarea>
                    <span class="text-danger error-message">@error('address'){{$message}}@enderror</span>
                </div>

            </div>

            <button class="btn btn-primary">
                Save Supplier
            </button>

        </form>

    </div>

</div>

@endsection