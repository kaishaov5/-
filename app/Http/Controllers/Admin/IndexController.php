<?php
 
namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
 
class IndexController extends Controller
{
    /**
     * 显示后台管理模板首页
     */
    public function index()
    {
        return view('admin.index');
    }

    //清除redis缓存
    public function clearCache(){
    	Redis::del('catehs','catess');
    	return back();
    }
}