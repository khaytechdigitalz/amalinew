@extends('admin/layout.sidebar')

@section('content')
    
                    <div class="row">
 
                                
                             <div class="card">
                             <div class="col-12">

                            
                                <div class="card-body">
                                    {{--                                <h4 class="card-title">Basic Info</h4>--}}
                                    <x-jet-validation-errors class="mb-4 alert-danger alert-dismissible alert"/>


                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600 alert-dismissible alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="mb-4 font-medium text-sm alert-danger alert-dismissible alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="mb-4 font-medium text-sm alert-success alert-dismissible alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form action="" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input name="firstName" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input name="lastName" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input name="email" type="email" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Transaction Limit</label>
                                                    <input name="limit" type="text" class="form-control"
                                                           placeholder="0 means unlimited" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phoneNumber">Date of Birth</label>
                                                    <input type="date" name="dob" id="dob" class="form-control"
                                                           placeholder="Date of Birth" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input name="phone" type="text" maxlength="11" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option selected>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary">Create Agent</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> 
@endsection

@section('scripts')
   
@endsection

