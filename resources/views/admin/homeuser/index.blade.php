@extends('layouts.admin')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>浏览<small>前台用户</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">
          展示前台用户的所有信息
        </p>

        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>用户名</th>
              <th>状态</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($homeUsers as $homeUser)
                <tr>
                    <td>{{ $homeUser->id }}</td>
                    <td>{{ $homeUser->name }}</td>
                    <td>
                    	<input type="checkbox" class="js-switch" checked />
                    </td>
                    <td style="width:30%;">

                        @if($homeUser->articles->count() > 0)
                    	<a href="{{ action('Admin\HomeUserController@article',$homeUser->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> 查看文章 </a>
                        @endif

                        @if($homeUser->posts->count() > 0)
                    	<a href="{{ action('Admin\HomeUserController@post',$homeUser->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>查看帖子 </a>
                        @endif

                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

@section('js')

<!-- Switchery -->
<script src="/admins/vendors/switchery/dist/switchery.min.js"></script>

@endsection
