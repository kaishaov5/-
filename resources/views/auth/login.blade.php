@extends('layouts.home')

@section('css')
<style type="text/css">
    .panel{
        border-right:none;
        border:none;
        box-shadow:none;
    }
    .panel-heading{
        background-color:white !important;   
        border-bottom:none !important;
    }
    .container{
        /*border:1px solid red;*/
        margin-top:40px;
        margin-bottom:40px;
        position:relative;
    }
    .panel-body{

        margin-left:-220px;
        margin-right:120px;
    }
    #img{
        width:400px;
        position:absolute;
        right:0px;
        top:50px;
        z-index:1;
    }
    .inputre{
        width:400px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <img src="/home/images/logo1.jpg" id="img">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">传承注册</div> -->
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">手机号码</label>

                            <div class="col-md-6">
                                <input id="email" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">密码</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>记住密码
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登录
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    忘记密码？
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
