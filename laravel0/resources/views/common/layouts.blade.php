<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>template继承@yied('title')</title>
    {{--<link rel="stylesheet" href="{{asset('static/..')}}"/>--}}
    <style>
        @section('style')
            .header{width: 1000px;
                height: 150px;margin:0 auto;border:1px solid grey
            }
            .main{width: 1000px;
                height: 300px;margin:0 auto;;  margin-top: 15px;
                clear: both;
            }
            .main .sidebar{width: 100px;float: left;
                height: 300px;margin:0 auto;border:1px solid grey;
            }
            .content{width: 800px;border:1px solid grey;float: right;
            }
            .footer{width: 1000px;border:1px solid grey;height:50px;margin:0 auto;margin-top: 45px;clear: both;
            }
        ul{list-style: none;width: 300px}
        ul li{float: left;margin:6px}
        ul a{padding: 5px;background-color: green;color: #ffffff}
        .active{color: blueviolet}
        @show
    </style>
</head>
<body>
@section('header')
    <div class="header">
        <h1>头部</h1>
        <h1>form表单小实验</h1>
    </div>
@show



<div class="main">
    <div class="sidebar">
        @section('sidebar')
            <div>
                <a href="{{ url('student/index') }}"
                   class="{{Request::getPathInfo() != '/student/create' ? 'active' : ''}}">
                    学生列表
                </a>
                <br>
                <a href="{{ url('student/create') }}"
                        class="{{ Request::getPathInfo() == '/student/create' ? 'active' : ''}}">新增学生</a>
            </div>
        @show
    </div>
    <div class="content">
        @yield('content')
    </div>
</div>
@section('footer')
    <div class="footer">
        <span>@2017 yanyan</span>
    </div>
@show

@section('javascript')
@show
</body>
</html>