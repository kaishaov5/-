<?php

namespace App\Http\Controllers\Admin;

use App\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function index(){
    	$config = Config::first();
    	return view('admin.config.config',compact('config'));
    }

    public function store(Request $request){
    	$config = Config::first();

    	$file = $request->file('logo');

        $filePath = 0;

        if(!empty($file)){//此处防止没有文件上传的情况
            $destinationPath = '/admins/images';
            $extension = $file->getClientOriginalExtension();
            $fileName = date('YmdHis').mt_rand(100,999).'.'.$extension;
            $file->move(public_path().$destinationPath, $fileName);
            $filePath = $destinationPath.'/'.$fileName;
        }

    	//判断数据库有没有配置信息，如果没有添加
    	if(!$config){

	        Config::create([
	        	'siteName' => $request->siteName ? $request->siteName : ' ',
    			'website' => $request->website ? $request->website : ' ',
    			'logo' => $filePath ? $filePath : ' ',
    			'contacts' => $request->contacts ? $request->contacts : ' ',
    			'qq' => $request->qq ? $request->qq : ' ',
    			'email' => $request->email ? $request->email : ' ',
    			'phone' => $request->phone ? $request->phone : ' ',
    			'telephone' => $request->telephone ? $request->telephone : ' ',
    			'address' => $request->address ? $request->address : ' ',
    			'title' => $request->title ? $request->title : ' ',
    			'keywords' => $request->keywords ? $request->keywords : ' ',
    			'description' => $request->description ? $request->description : ' '
	        ]);

	        return redirect()->action('Admin\ConfigController@index');

    	}else{
    		
    		$config->update([
    			'siteName' => $request->siteName ? $request->siteName : ' ',
    			'website' => $request->website ? $request->website : ' ',
    			'logo' => $filePath ? $filePath : $config->logo,
    			'contacts' => $request->contacts ? $request->contacts : ' ',
    			'qq' => $request->qq ? $request->qq : ' ',
    			'email' => $request->email ? $request->email : ' ',
    			'phone' => $request->phone ? $request->phone : ' ',
    			'telephone' => $request->telephone ? $request->telephone : ' ',
    			'address' => $request->address ? $request->address : ' ',
    			'title' => $request->title ? $request->title : ' ',
    			'keywords' => $request->keywords ? $request->keywords : ' ',
    			'description' => $request->description ? $request->description : ' '
    		]);

    		return redirect()->action('Admin\ConfigController@index');

    	}
    }
}
