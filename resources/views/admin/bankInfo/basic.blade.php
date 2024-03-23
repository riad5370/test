@extends('admin.include.master')
@section('body')
    @if ($errors->any())
        <div class="alert alert-danger" id="error-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
    @endif

    <div class="col-12 col-md-12 col-xs-6">
        <div class="widget-box">
            <div class="widget-header">
                <div class="row">
                    <div class="col-md-6 col-6 col-xs-6">
                        <h4 class="widget-title">Edit Banking Info</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: 15px; margin-left: 10px;">
                    <form action="{{route('bank.update')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ optional($bank)->id }}">

                     {{-- account name  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title">Account Name :</label>

                        <div class="col-sm-9">
                            <input type="text" name="accountName" value="{{$bank->accountName??''}}" id="title" placeholder="accountName"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                     </div>
                     {{-- Bank name  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="bankName">bank Name :</label>

                        <div class="col-sm-9">
                            <input type="text" name="bankName" value="{{$bank->bankName??''}}" id="bankName" placeholder="bankName"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                     </div>

                     {{-- Account Number  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="accountNumber">account Number :</label>

                        <div class="col-sm-9">
                            <input type="text" name="accountNumber" value="{{$bank->accountNumber??''}}" id="accountNumber" placeholder="accountNumber"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                     </div>

                     {{-- Swift Code  --}}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="swiftCode">swift Code :</label>

                        <div class="col-sm-9">
                            <input type="text" name="swiftCode" value="{{$bank->swiftCode??''}}" id="swiftCode" placeholder="swiftCode"
                                class="col-xs-12 col-md-11 col-sm-12" />
                            <br> <br>
                        </div>
                     </div>
                     {{-- address  --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="desp">Address :</label>

                        <div class="col-sm-9">
                            <textarea id="address" name="address" 
                            class="col-xs-12 col-md-11 col-sm-12"
                            style="height: 80px; width: 92%;">{{$bank->address??''}}</textarea>
                            <br> <br>
                            <span>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-info">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
