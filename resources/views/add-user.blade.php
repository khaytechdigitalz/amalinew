@extends('layouts.sidebar')

@section('content')
 
                        <div class="card">
                            <div class="card-body">
                                {{--                                <h4 class="card-title">Basic Info</h4>--}}
                                @include('error_success_message')

                                <form action="{{route('createCustomer')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>BVN</label>
                                                <input maxlength="11" name="bvn" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" maxlength="11" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="date" name="dob" id="dob" class="form-control"
                                                       placeholder="Date of Birth">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                       placeholder="Customer Email">
                                            </div>
                                        </div>

                                        <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary">Proceed</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div> 
@endsection


@section('scripts') 
@endsection
