@extends('layouts.sidebar')

@section('content')
     
                            <div class="card">
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

                                    <form action="{{route('createSubAgent')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Bank</label>
                                                    <select name="bank" class="form-select">
                                                        <option>GTBank</option>
                                                        <option>Wema</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Account Number</label>
                                                    <input name="account_number" type="text" class="form-control"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Account Name</label>
                                                    <input name="account_name" type="text" class="form-control" readonly
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="amount">Amount</label>
                                                    <input type="text" name="amount" id="amount" class="form-control"
                                                           placeholder="Enter amount" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="amount">Transfer Note</label>
                                                    <textarea name="note" class="form-control"
                                                              placeholder="Enter tranfer note">Transfer from Amali</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary">Withdraw</button>
                                        </div>
                                    </form>
                                </div>

                            </div> 
@endsection

@section('scripts') 
@endsection

