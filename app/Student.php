<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/22
 * Time: 21:57
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table='student';

    protected  $primaryKey='id';
}