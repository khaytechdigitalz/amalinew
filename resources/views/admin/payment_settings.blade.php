@extends("admin.layout.sidebar")
@section('content')
<div class="row">

                               
                                    <div class="card card-table">
                                        <div class="card-body">

                    <form action="" method="POST">
                        @csrf

                        <hr>
                        <b>PAYMENT SETTINGS</b>
                            <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold"> @lang('Deposit Fee') </label>
                                    <input class="form-control form-control-lg" type="text" name="deposit_charge" value="{{$general->deposit_charge}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Withdrawal Fee')</label>
                                    <input class="form-control form-control-lg" type="text" name="withdrawal_charge" value="{{$general->withdrawal_charge}}">
                                </div>
                            </div>

            <div class="col-md-6">
                <div class="form-group  mb-1">
                    <label class="form-control-label font-weight-bold">@lang('Transfer Fee') </label>
                    <input class="form-control form-control-lg" type="text" name="transfer_charge" value="{{$general->transfer_charge}}">
                </div>
            </div>
            </div>
            <br>
            <div class="row">


<div class="col-md-6">
    <div class="form-group  mb-1">
        <label class="form-control-label font-weight-bold">@lang('Cable TV Subscription Charge') </label>
        <input class="form-control form-control-lg" type="text" name="cabletv_charge" value="{{$general->cabletv_charge}}">
    </div>
</div>

<div class="col-md-6">
    <div class="form-group  mb-1">
        <label class="form-control-label font-weight-bold">@lang('Electricity Bill Payment Charge') </label>
        <input class="form-control form-control-lg" type="text" name="utility_charge" value="{{$general->utility_charge}}">
    </div>
</div>
                        </div>
                        

                        <div class="form-group">
                        <br>
                            <button type="submit" class="btn text-white btn-primary btn-block btn-sm">@lang('Update Settings')</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div> 
@endsection

@section('scripts') 
 
@endsection
