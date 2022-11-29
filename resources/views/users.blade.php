@extends('layouts.sidebar')

@section('content')

                <div class="col-md-6 mt-4 mb-3">
                    <a href="{{url('add-customer')}}" class="btn btn-primary btn-block" role="button"><i
                            class="fa fa-plus-circle"> </i> Open New Account</a>
                </div>

                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>S/N</th>
                                         <th>Email</th>
                                        <th>Phone Number</th>
                                         <th>Account Name</th>
                                        <th>Account Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->phone}}
                                            </td>
                                              <td>
                                                {{$user->accountName}}
                                            </td>
                                            <td>
                                                {{$user->accountNo}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


@endsection

@section('scripts')
@endsection
