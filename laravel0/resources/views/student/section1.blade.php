@extends('template')

@section('header'){{--重写头部--}}
    @parent {{--将父模板的头部文字输出--}}
    子模板头部
@stop

@section('sidebar'){{--重写头部--}}
@parent {{--将父模板的头部文字输出，不让输出则不写--}}
sidebar
@stop

@section('content')
    content
    {{--1.模板变量输出--}}
   {{-- <p>{{$name}}</p>--}}
    <!--2.模板中调用php代码 -->
    {{--<p>{{time()}}</p>
    <p>{{date('Y-m-d H:i:s')}}</p>

    <p>{{in_array($name,$arr)?'存在':'不存在'}}</p>
    <p{{var_dump($arr)}}></p>
    <p>{{isset($name) ? $name : 'default'}}</p>
    <p>{{$name1 or 'default'}}</p>--}}
    <!--3原样输出 是直接在变量前面加@ -->
    {{--<p>@{{$name}}</p>--}}
    {{--4模板中的注释  在模板中是看不到的--}}

    {{--5.引入子视图 include--}}
    {{--@include('student.common1',['message' => '我是错误信息'])--}}

    {{--流程控制--}}
    <br>
    @if ($name == 'sean')
        I'm is sean
    @elseif($name == 'mary')
        I'm is mary
    @else default
    @endif

   <br>
    @if(in_array($name,$arr))
        true
    @endif

    <br>
    @unless($name != 'sean')
        I'm id sean
    @endunless

    <br>
    @for($i=0;$i<5;$i++)
        <span>{{$i}}</span>
    @endfor

    <br>
    @foreach($students as $v)
        <span>{{$v->name}}</span>
    @endforeach
    <br>
    {{--@forelse($students as $v1)--}}
        {{--<span>{{$v1->age}}</span>--}}{{--有数据就遍历出来--}}
    {{--@empty--}}
        {{--<span>暂无数据</span>--}}
    {{--@endforelse--}}

    <a href="{{url('urlTest')}}">url</a>{{--通过路由名称生成--}}
    <br>
    <a href="{{action('StudentController@urlTest')}}">action（）</a>{{--通过控制器方法名称名称生成--}}
    <br>
    <a href="{{ route('url') }}">route()</a>{{--通过路由生成 链接  参数是路由的别名--}}
@stop