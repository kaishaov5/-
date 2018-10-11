@extends('layouts.home')

@section('title')
<title>{{ Auth::user()->name}}的个人中心_传承网</title>
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
                    <span>{{ Auth::user()->name }}</span>
                </div>

                <div>
                    
                </div>
            </div>
        </div>

        <!-- 右栏 -->
        <div id="personal_right">

        </div>
    </div>
</div>
@endsection
