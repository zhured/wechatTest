<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/22
 * Time: 21:13
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends  Model{

    public  static  function getMember(){
        return 'member name is zhured';
    }
}