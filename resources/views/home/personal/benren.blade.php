@extends('layouts.home')

@section('title')
<title>{{ $user->name}}的个人中心_传承网</title>
@endsection

@section('css')
<!-- 个人中心样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/personal/personal.css">
@endsection

@section('content')

<div class="container-fluid">
    <div id="personal_con">
        <!-- 左栏 -->
        <div id="personal_left">

            <!-- 头像框 -->
            <div class="personal_left_photo">
                <div>
                    <img src="/home/images/login.jpg" alt="">
                    <br>
                    <span>{{ $user->name }}</span>
                </div>

                <div>
                    <div class="left_xk">
                        <span>我的信息</span>
                        <a href="#">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="margin-right:5px;"></span>
                            基本信息
                        </a>
                        @if(Auth::id() == $user->id)
                        <a href="{{ action('PersonalController@password',Auth::id()) }}">
                            <span class="glyphicon glyphicon-wrench" aria-hidden="true" style="margin-right:5px;"></span>
                            修改密码
                        </a>
                        @endif
                    </div>
                    <div class="left_xk">
                        <span>我的动态</span>
                        <a href="#">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true" style="margin-right:5px;"></span>
                            我的文章
                        </a>
                        <a href="#">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right:5px;"></span>
                            我的帖子
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 右栏 -->
        <div id="personal_right">
            @section('personal')

            @show
        </div>
    </div>
</div>
@endsection
