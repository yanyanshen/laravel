<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model{
    //设置常量处理性别  好处是方便修改
    const SEX_BOY = 0;//男
    const SEX_GIRL = 1;//女
    //指定表名
    protected $table = 'student';
    //指定id
    protected $primaryKey = 'id';
    //指定允许批量复制的字段
    protected $fillable = ['name','age','sex'];
    //指定不允许批量复制的字段
    protected $guarded = ['name'];
    //自动维护时间戳
    public $timestamps = true;//关闭使用false即可
    //数据表里是时间戳
    protected function getDateFormat(){
        return time();
    }
//数据表里是 格式化后的时间
    protected function asDateTime1($val){
        return $val;
    }
    public static function student1(){
        $students = DB::select('select * from laravel_student');
        return $students;
    }
    public static function student2(){
        $last_id = DB::table('student')->insertGetId(
            ['name' => 'sean','age' => '18']
        );
        return $last_id;
    }

    //性别处理
    public function sex($ind = null){
        $arr = [
            self::SEX_BOY => '男1',
            self::SEX_GIRL => '女',
        ];
        if($ind !== null){
            return array_key_exists($ind,$arr) ? $arr[$ind] : $arr[self::SEX_BOY];
        }
        return $arr;
    }



}