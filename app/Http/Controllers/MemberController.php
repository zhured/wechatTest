<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/22
 * Time: 21:02
 */

namespace App\Http\Controllers;


use App\Member;

class MemberController extends  Controller{

    public  function info(){
        return Member::getMember();
//        return view('member/info',['name'=>'zhured','age'=>20]);

    }
}