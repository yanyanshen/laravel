<?php
namespace App\HTTP\Controllers;
use App\Member;
class MemberController extends Controller{
    public function info($id){
//        return 'member-info-id-'.$id;
//        return route('member');
        //调用模型
        return Member::info1();
    }

    //视图输出
    public function member_info(){
        return view('member/member-info');
    }

    //默认模板输出
    public function defaultTemplate(){
        return view('member/defaultTemplate',[
            'name' => 'yanyanshen',
            'age' => 18
        ]);
    }

}