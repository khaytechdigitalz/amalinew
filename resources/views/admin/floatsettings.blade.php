@extends("admin.layout.sidebar")
@section('content')
<div class="row">
<div class="card">
            <div class="col-lg-12">
 
                    <form action="" method="POST">
                        @csrf

                         <hr>
                        <b>FLOAT SETTINGS</b>
                            <hr>
                            <div class="row">


                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Minimum Amount') ({{$general->cur_sym}})</label>
                                    <input class="form-control form-control-lg" type="text" name="float_min" value="{{$general->float_min_amount}}">
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Maximum Amount') ({{$general->cur_sym}})</label>
                                    <input class="form-control form-control-lg" type="text" name="float_max" value="{{$general->float_max_amount}}">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Minimum Daily Transaction')  {{$general->cur_sym}}</label>
                                    <input class="form-control form-control-lg" type="text" name="float_min_trx" value="{{$general->float_min_trx}}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Minimum Daily Transaction Count') </label>
                                    <input class="form-control form-control-lg" type="text" name="float_min_count" value="{{$general->float_min_count}}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Minimum Agent Months') </label>
                                    <input class="form-control form-control-lg" type="text" name="float_min_month" value="{{$general->float_min_month}}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Minimum Tenure') (Days)</label>
                                    <input class="form-control form-control-lg" type="text" name="float_min_tenure" value="{{$general->float_min_tenure}}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Minimum Tenure') (Days) </label>
                                    <input class="form-control form-control-lg" type="text" name="float_max_tenure" value="{{$general->float_max_tenure}}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Interest') (Flat)</label>
                                    <input class="form-control form-control-lg" type="text" name="float_int_flat" value="{{$general->float_int_flat}}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Interest') (%)</label>
                                    <input class="form-control form-control-lg" type="text" name="float_int_percent" value="{{$general->float_int_percent}}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Float Processing Fee') ({{$general->cur_sym}})</label>
                                    <input class="form-control form-control-lg" type="text" name="float_fee" value="{{$general->float_fee}}">
                                </div>
                            </div>


                            
                        </div>
                        <br>
                         

                        <div class="form-group">
                        <br>
                            <button type="submit" class="btn text-white btn-primary btn-block btn-sm">@lang('Update Settings')</button>
                        </div>
                    </form>
                    </div> 
</div>
@endsection

@section('scripts') 
 
@endsection
