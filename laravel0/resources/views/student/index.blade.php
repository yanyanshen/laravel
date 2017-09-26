@extends('common.layouts')
@section('title')
    注册
@stop
@section('content')
    @include('common.message')
    <div>
        <div>学生列表</div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $v)
                <tr>
                    <th>{{$v->id}}</th>
                    <td>{{$v->name}}</td>
                    <td>{{$v->age}}</td>
                    <td>{{$v->sex($v->sex)}}</td>
                    <td>{{$v->created_at}}</td>
                    <td>
                        <a href="{{ url('student/detail',['id' => $v->id]) }}">详情</a>
                        <a href="{{ url('student/update',['id' => $v->id]) }}">修改</a>
                        <a href="{{ url('student/delete',['id' => $v->id]) }}"
                                onclick="if(confirm('确定删除吗？')==false) return false;">删除</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <div >
        <div class="pull-right">
            {{$students->render()}}
        </div>
    </div>
@stop
