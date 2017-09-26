<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>template继承--@yied('title')</title>
    <style>
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
            height: 300px;}
        .footer{width: 1000px;border:1px solid grey;height:50px;margin:0 auto;margin-top: 15px}
    </style>
</head>
<body>
<div class="header">
    @section('header')
    头部
    @show
</div>

<div class="main">
    <div class="sidebar">
        @section('sidebar')
        侧边栏
        @show
    </div>
    {{--右侧内容--}}
    <div class="content">
        {{--内容--}}
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
                <tr>
                    <th>1</th>
                    <td>Mark</td>
                    <td>18</td>
                    <td>男</td>
                    <td>2017-09-15</td>
                    <td>
                        <a href="">详情</a>
                        <a href="">修改</a>
                        <a href="">删除</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        {{--分页--}}
        <div>

        </div>
    </div>
</div>
<div class="footer">
    <span>@2017 yanyan</span>
</div>
</body>
</html>