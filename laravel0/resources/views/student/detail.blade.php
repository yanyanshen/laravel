@extends('common.layouts')
@section('content')
<table>
    <thead>
    <th>详情</th>
    </thead>
    <tbody>
    <tr>
        <td>ID</td><td>{{ $student->id }}</td>
    </tr>

    <tr>
        <td>姓名</td><td>{{ $student->name }}</td>
    </tr>

    <tr>
        <td>年龄</td><td>{{ $student->age }}</td>
    </tr>

    <tr>
        <td>性别</td><td>{{ $student->sex($student->sex) }}</td>
    </tr>

    <tr>
        <td>添加时间</td><td>{{ $student->created_at }}</td>
    </tr>

    <tr>
        <td>修改时间</td><td>{{ $student->updated_at }}</td>
    </tr>
    </tbody>
</table>
@stop