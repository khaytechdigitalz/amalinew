@extends("admin.layout.sidebar")
@section('content')
<div class="row">

                               
                                    <div class="card card-table">
                                        <div class="card-body">

                    <form action="" method="POST">
                        @csrf

                        <hr>
                        <b>SYSTEM SETTINGS</b>
                            <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold"> @lang('Site Title') </label>
                                    <input class="form-control form-control-lg" type="text" name="sitename" value="{{$general->sitename}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Currency')</label>
                                    <input class="form-control form-control-lg" type="text" name="cur_text" value="{{$general->cur_text}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group  mb-1">
                                    <label class="form-control-label font-weight-bold">@lang('Currency Symbol') </label>
                                    <input class="form-control form-control-lg" type="text" name="cur_sym" value="{{$general->cur_sym}}">
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
