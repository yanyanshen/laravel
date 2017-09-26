<?php
namespace App\Http\Controllers;
use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Student;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class StudentController extends Controller{
        //推送队列
    public function queue(){

        dispatch(new SendEmail('1932314889@qq'));//将人物放在了队列里
    }
    //错误与日志
    public function error(){
//        $student = null;
//        if($student == null){
//            abort('503');
//        }
//        $name = 'sean';
//        var_dump($name);//如何没有定义的话就会报错
//        return view('student.error');//如果没有这个模板就有会报错
        //日志

        //模式是single
//        Log::info('这是一个info级别的日志');
//        Log::warning('这是一个Warning级别的日志');
        Log::error('这是一个error级别的日志',['name' => 'sean','age' => 18]);//可带参数
            //模式是daily  的每天都会生成一个日志文件

    }
    //缓存实验
    public function cache1(){
        //第一种方法 put()保存对象到缓存中
        Cache::put('key1','val',10);

        //第二种方法 add()
//        $bool = Cache::add('key2','val2',10);
//        var_dump($bool);

        //第三种 forever()//永远保存
//        Cache::forever('key3','val3');

        //判断是否存在 使用has()
//        $val = Cache::get('key3');
//        dump($val);

        if(Cache::has('key3')){
            $val = Cache::get('key3');
            dump($val);
        }else{
            echo 'No';
        }


    }

    public function cache2(){
        //第二种方法 get() 获取缓存的值
        $val1 = Cache::get('key1');
        var_dump($val1);
//        $val2 = Cache::get('key2');
        //pull 将缓存取出来 然后删掉
//        $val2 = Cache::pull('key3');
//        var_dump($val2);
        //forget()删除缓存 返回bool值
//        $bool = Cache::forget('key1');
//        var_dump($bool);


    }
    public function student1(){

        //新增数据
//        $bool = DB::insert('insert into laravel_student(name,age,sex,create_time,update_time) values (?,?,?,?,?)',
//            ['mary','18','0','2017-09-12','2017-09-13']);
//        var_dump($bool);
        //更新修改
//        $row_num = DB::update('update laravel_student set age = ? where name = ?',
//            [20,'mary']);
//        var_dump($row_num);

        //查询
//        $students = DB::select('select * from laravel_student where id > ?',
//            [1]);
//        dd($students);
        //删除
//        $row_delete = DB::delete('delete from laravel_student where id = ?',
//            [1]);
//        var_dump($row_delete);
        $student = Student::student1();
        dd($student);
    }
//使用查询构造器
    public function student2(){
//        $bool = DB::table('student')->insert(['name'=>'jack','age'=>18]);
//        $last_id = Student::student2();
//        var_dump($last_id);
        //插入多条数据
        $bool = DB::table('student')->insert([
                ['name' => '卫华','age' => 18],
                ['name' => '廖南','age' => 19],
            ]
        );
        var_dump($bool);
    }


    public function student3(){
//        $num = DB::table('student')
//            ->where('id',3)
//            ->update(['age'=>30]);
//        var_dump($num);
        //自增和自减
//        $num = DB::table('student')->increment('age');
//        $num = DB::table('student')->increment('age',3);//自增3
//        $num = DB::table('student')->decrement('age');//自减
//        $num = DB::table('student')
//            ->where('id',3)
//            ->decrement('age');//有条件的
        //自增自减的同时修改字段
//        $num = DB::table('student')
//            ->where('id',3)
//            ->decrement('age',2,['name' => 'mary']);//有条件的
//        var_dump($num);
        //删除数据
//        $num = DB::table('student')
//            ->where('id',3)
//            ->delete();

//        $num = DB::table('student')
//            ->where('id','>=',3)
//            ->delete();
//        var_dump($num);
        //整个表格删除
        DB::table('student')->truncate();//不返回任何的东西
    }

    public function student4(){
//        $bool = DB::table('student')->insert(
//            [
//                ['name' => 'mary','age' => 19],
//                ['name' => 'jack','age' => 20],
//                ['name' => 'sean','age' => 21],
//                ['name' => 'lun','age' => 22],
//                ['name' => 'tom','age' => 21],
//                ['name' => 'cat','age' => 22],
//            ]
//        );
//        dump($bool);
        //get()得到所有的数据
//        $student = DB::table('student')->get();
        //select() 指定结果集中的字段
        $student = DB::table('student')->select('id,name,age');
        //first() 获得结果集第一条数据
        $student = DB::table('student')->orderBy('id','desc')->first();
        //where()
        $student = DB::table('student')->where('id','>=','2')->get();
        //多个条件
        $student = DB::table('student')->whereRaw('id >= ? and age > ?',[2,20])->get();
        //pluck()返回结果集中的字段
        $student = DB::table('student')->pluck('name');
        //lists()
        $student = DB::table('student')->lists('name','id');

        //chunk() 分段查询数据
        echo "<pre>";
        DB::table('student')->chunk(2,function($student){

            var_dump($student);
                return false;
        });
    }
    //聚合函数
    public function student5(){
        $count = DB::table('student')->count();

        $max = DB::table('student')->max('age');

        $min = DB::table('student')->min('age');

        $avg = DB::table('student')->avg('id');

        $sum = DB::table('student')->sum('age');
    }

    //数据操作-Eloquent ORM
    public function orm1(){
        //all()查询表的所有记录
        $students = Student::all();
        //find()按条件查询指定的数据
        $students = Student::find(3);
        //findOrFail()根据主键查找  如果没有则报错
        $students = Student::findOrFail(2);

        //get()
        $students = Student::get();
        $students = Student::where('id','>','4')
                    ->orderBy('age','desc')
                    ->first();
        echo "<pre>";
//        Student::chunk(2,function($students){
//            var_dump($students);
//        });

        //聚合函数
        Student::count();

        Student::sum('age');
        $min = Student::where('id','>',3)->min('age');
        Student::max('age');
        var_dump($min);
    }
    public function orm2(){
        //使用模型新增数据
//        $student = new Student();//实例化模型
//        $student->name = 'sean2';
//        $student->age = 20;
//        $bool = $student->save();
//        $student = Student::find(13);
//        dd($student->created_at);

        //使用create方法新增数据
//        $student = Student::create(
//            ['name' => 'mary','age' => 15]
//        );
//        dd($student);
        //firstOrCreate()  如果数据库里有这条数据则不添加 否则就添加
//        $student = Student::firstOrCreate(
//            ['name' => 'mary1']
//        );
//        dd($student);
        //firstOrNew() 以属性查找属性  如果没有则创建实例  如果想要保存到数据库 则调用 save自行保存
        $student = Student::firstOrNew(
            ['name' => 'mary1']
        );
        $bool = $student->save();
        dd($student);

    }

    //修改数据
    public function orm3(){
        //通过模型更新
//        $student = Student::find(15);// 通过主键查找数据  返回的是一个对象
//        $student->name = 'kitty';
//        $bool = $student->save();
//        echo $bool;

        //结合查询语句进行批量更新
        $num = Student::where('id','>=',13)->update(
            ['age' => 30]
        );
        var_dump($num);//返回更新的条数
    }

    //删除
    public function orm4(){
        //通过模型删除
//        $student = Student::find(14);
//        $bool = $student->delete();
//        echo $bool;
        //通过主键删除
//        $num = Student::destroy(7);//返回删除几条记录
//        $num = Student::destroy(6,7);//返回删除几条记录
//        $num = Student::destroy([12,13]);//返回删除几条记录
        $num = Student::where('id','>',11)->delete();
        var_dump($num);
    }
    //blade 模板引擎
    //1.blade是laravel提供的一个极简单又强大的模板引擎
    //2.blade和其他流行的php模板引擎不一样，blade并不限制你在视图中使用原生的php代码
    //3.blade视图页面都将被编译成原生的php代码并缓存起来，除非你的模板文件被修改了，否则不会进行重新编译，意味着blade不会给你的应用增加任何负担


    //模板继承 可以共用一个模板  方便维护 和 使用
    public function section1(){
//        $students = Student::get();
        $students = [];

        $name = 'sean';
        $arr = ['sean','mary'];
        return view('student.section1',[
            'name' =>$name,
            'arr' => $arr,
            'students' => $students,
        ]);
    }
    //生成url
    public function urlTest(){
        return 'urlTest';
    }
//request
    public function request1(Request $request){
        //1.取值
//        echo $request->input('name');
//        echo $request->input('name','未知');
//         if($request->has('name')){
//             echo $request->input('name');
//         }else{
//             echo '无';
//         }
//
//        $res = $request->all();
//        dd($res);

        //2.判断请求的类型
//        echo $request->method();
//        if($request->isMethod('GET')){
//            echo 'true';
//        }else{
//            echo 'false';
//        }

//        $res = $request->ajax();
//        var_dump($res);
//        $res = $request->is('request1');//判断是否是个方法
//        $res = $request->is('student/*');//判断是否是某个控制器下的某个个方法
//        var_dump($res);
        echo $request->url();//获取当前的url路径
    }

//session
    public function session1(Request $request){
        //1.http request session()
//        $request->session()->put('key1','value1');

        //2.session()
//        session()->put('key2','value2');

        //3.通过Session类
        //存储数据到session
//        Session::put('key3','value3');
            //获取session值
        //        echo Session::get('key3');
        //不存在则去默认值
//        echo Session::get('key4','default');
        //以数组的形式存储数据
//        Session::put(['key4' => 'value4']);
//        //把数据放入session的数组中
//        Session::push('student','sean');
//        Session::push('student','mary');
//        var_dump(Session::get('student','default'));
        //从session中取出数据 取完就将其删除
//        $res = Session::pull('student','default');
//        var_dump($res);
        //取出所有的session值
//        $res = Session::all();
        //暂存数据  只能得第一次访问的时候存在
//        Session::flash('flash-key','flash-key');
        //判断session中某个值是否存在
//        if(Session::has('key1')){
//            $res = Session::all();
//            dd($res);
//        }else{
//            echo '不告诉你';
//        }
    }
    public function session2(Request $request){
        var_dump(Session::get('message'))  ;
        //删除某个不想要的session值
//        Session::forget('key1');
//        $res = Session::all();
//        dd($res);

        //删除所有的session值
//        Session::flush();
//        echo Session::get('flash-key');


    }

    //response
    public function response(){
        //相应json
//        $data = [
//            'error' => 0,
//            'errMsg' => 'success',
//            'data' => 'dean'
//        ];
//        return response()->json($data);
//        var_dump($data);

        //重定向
//        return redirect('session2');
//        return redirect('session2')->with('me1','hahah');
//        return redirect()->action('StudentController@session2')->with('message','hahah');
//        return redirect()->route('ses')->with('message','hahah');

        return redirect()->back()->with('message','hahah');
    }

    //活动的宣传页面
    public function activity0(){
        return '活动要开始了，敬请期待';
    }
    //活动的结束页面
    public function activity1(){
        return '互动中，谢谢您的参与1';
    }

    //活动的结束页面
    public function activity2(){
        return '互动中，谢谢您的参与2';
    }

    //表单提交小实验
    public function index(){
//        $students = Student::paginate(2)->orderBy('id','desc');
        $students = Student::orderBy('id','desc')->paginate(5);
        return view('student.index',[
            'students' => $students,
        ]);
    }

    //新增数据
    public function create(Request $request){
        $student = new Student();

        if($request->isMethod('POST')){
            //控制器验证
//            $this->validate($request,[
//                'Student.name' => 'required|min:2|max:6', //多个规则用 | 分割即可
//                'Student.age' => 'required|integer',
//                'Student.sex' => 'required|integer',
//            ],
//            [
//                'required' => ':attribute 为必填项',
//                'min' => ':attribute 长度不符合要求',
//                'integer' => ':attribute 必须为整数',
//            ],
//                [
//                    'Student.name' => '姓名',
//                    'Student.age' => '年龄',
//                    'Student.sex' => '性别',
//                ]
//            );

            //2.validator验证
            $validator = \Validator::make($request->input(),[
                'Student.name' => 'required|min:2|max:6', //多个规则用 | 分割即可
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ],
            [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ],
                [
                    'Student.name' => '姓名',
                    'Student.age' => '年龄',
                    'Student.sex' => '性别',
                ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $data = $request->input('Student');
            if(Student::create($data)){
                return redirect('student/index')->with('success','添加成功');
            }else{
                return redirect()->back();
            }
        }
        return view('student.create',[
            'student' => $student
        ]);
    }

    //保存数据
    public function save(Request $request){
        $data = $request->input('Student');
        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];
        if($student->save()){
            return redirect('student/index');
        }else{
            return redirect()->back();
        }
    }

    //修改
    public function update(Request $request , $id){
        $student = Student::find($id);
        if($request->isMethod('POST')){
            $this->validate($request,[
                'Student.name' => 'required|min:2|max:6', //多个规则用 | 分割即可
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ],
            [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ],
                [
                    'Student.name' => '姓名',
                    'Student.age' => '年龄',
                    'Student.sex' => '性别',
                ]
            );


            $data = $request->input('Student');
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];
            if($student->save()){
                return redirect('student/index')->with('success','修改成功-'.$id);
            }else{
                return redirect()->back();
            }
        }
        return view('student.update',[
            'student' => $student,
        ]);
    }

    //详情
    public function detail($id){
        $student = Student::find($id);
        return view('student.detail',[
            'student' => $student,
        ]);
    }

    //删除
    public function delete($id){
        $student = Student::find($id);
        if($student->delete()){
            return redirect()->back()->with('success','删除成功');
        }else{
            return redirect()->back()->with('success','删除失败');
        }
    }

    //文件上传功能演示
    public function upload(Request $request){
        if($request->isMethod('POST')){
            $file = $request->file('source');
            //文件是否上传成功
            if($file->isValid()){
                //源文件名
                $originname = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //文件类型
                $type = $file->getClientMimeType();
                //临时文件绝对路径
                $readPath = $file->getRealPath();
                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($readPath));
                dd($bool);
            }
            exit;
        }
        return view('student.upload');
    }

    //发送邮件实验
    public function mail(){
        //第一种方式  发送纯文本格式
//        Mail::raw('邮件内容',function($message){
//            $message->from('18736199128@163.com','laravel');
//            //邮件主题
//            $message->subject('邮件主题 测试');
//            //发送给收件人
//            $message->to('1932314889@qq.com');
//        });

        //第二种方法 html方法
        Mail::send('student.mail',['name' => 'laravel'],function ($message){
            $message->to('1932314889@qq.com');
        });
    }

}