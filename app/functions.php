<?php 
	
/**
 * @return array
 * 获取控制器和方法名
 */
function getCurrentAction()
{
    $action = \Route::current()->getActionName();
    list($class, $method) = explode('@', $action);

    return ['controller' => $class, 'method' => $method];
}

/**
 * [getCateByPid 通过pid查询所有cate]
 * @param  [array]  $allcates [数据库数据]
 * @param  int $pid      [父类id]
 * @return [array]            [分层返回数组]
 */
function getCateByPid($allcates,$pid=0){
    $data = [];
    foreach($allcates as $k=>$v){
        if($v['pid'] == $pid){
            $v['sub'] = getCateByPid($allcates,$v['id']);//根据自己的ID查询该类的子类
            $data[] = $v;
        }
    }
    return $data;
}

/**
 * @param [int] $id [分类的id]
 * @return [string] [分类名称]
 */
function getCateName($id){
    return \App\Cate::findOrFail($id);
}

//查询帖子分类
function getBbsCate($id){
    return \App\BbsCate::findOrFail($id);
}

//判断回帖楼层
function getLou($num){

    switch($num){
        case 1:
            return '沙发';
        break;
        case 2:
            return '板凳';
        break;
        case 3:
            return '地板';
        break;
        default:
            return '第'.$num.'楼';
        break;

    }

}

?>