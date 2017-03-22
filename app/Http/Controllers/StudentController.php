<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/22
 * Time: 21:22
 */

namespace App\Http\Controllers;


use App\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
  public function test1(){


      //新增
//      $bool=DB::insert('insert into student(name,age) values(?,?)',
//          ['zhured',20]);
//      var_dump($bool);

      //更新
//      $num = DB::update('update student set age =? where name=?',
//          [23,'zhured']);
//      var_dump($num);

      //查询
//     $students= DB::select('select * from student');
//     dd($students);


      //删除
      $num=DB::delete('delete from student where id>?',[1002]);
      var_dump($num);


  }

//插入
    public function query1(){
//        $bool=DB::table('student')->insert(
//            ['name'=>'zhured','age'=>22]
//        );
//        var_dump($bool);

        //插入返回id
//        $id=DB::table('student')->insertGetId(
//            ['name'=>'pig','age'=>8]
//        );
//        var_dump($id);

        //插入多条数据
        $id=DB::table('student')->insert(
            [
                ['name'=>'miao','age'=>8],
                 ['name'=>'dog','age'=>8],
            ]

        );
        var_dump($id);

    }

    //更新
    public  function query2(){
        $num =DB::table('student')
            ->where('id',1003)
            ->update(['age'=>10]);
        var_dump($num);


        $num = DB::table('student')->increment('age');
        $num = DB::table('student')->increment('age',3);

        $num = DB::table('student')
            ->where('id',3)->increment('age',3);

            $num = DB::table('student')->decrement('age',3);
    }

    public  function orm1(){
        //all
        $students=Student::all();
        //find()
//        findOrFail()
        dd($students);

        Student::get();

        echo '<pre>';
        Student::chunk(2,function($students){
            var_dump($students);
        });

        //聚合函数
        Studnet::count();
    }













}