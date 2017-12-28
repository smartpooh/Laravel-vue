<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{
    public function index()
    {
        //$login_user = (\Auth::user());
        //if ($login_user) {
            //TODO  获取用户的信息，从而获取不同菜单权限
        //}
        $raw_menus = config('authorization.menus');
        $menus = $this->getRouteTree($raw_menus, 0);

        return $menus;
    }

    public function getRouteTree($data, $children)
    {
        $tree = [];
        foreach($data as $k => $v)
        {
            if($v['children'] == $children)
            {
                $v['children'] = $this->getRouteTree($data, $v['id']);
                $tree[] = $v;
                //unset($data[$k]);
            }
        }
        return $tree;
    }

}
