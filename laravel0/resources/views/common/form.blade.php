{{--<form action="{{ url('student/save') }}" method="post">--}}
<form action="" method="post">
    {{ csrf_field() }}
    <div class="register">
        <label for="cd-name">姓名</label>
        {{--<input type="text" name="Student[name]" value="{{ old('Student.name') }}" placeholder="请输入真实姓名">--}}
        <input type="text" name="Student[name]" value="{{ old('Student')['name'] ? old('Student')['name'] : $student->name }}" placeholder="请输入真实姓名">
        <span>{{ $errors->first('Student.name') }}</span>
    </div>
    <div class="register">
        <label class="call_text" for="cd-tel">年龄</label>
        <input  type="text" name="Student[age]" value="{{ old('Student.age') ? old('Student.age') : $student->age}}" placeholder="请输入年龄">
        <span>{{ $errors->first('Student.age') }}</span>
    </div>
    <div class="register">
        <label>性别</label>
        @foreach($student->sex() as $ind => $sex)
            <input type="radio" name="Student[sex]" value="{{ $ind }}"
                    {{ isset($student->sex) && $student->sex == $ind ? 'checked' : '' }}/>{{ $sex }}
        @endforeach
        <input type="submit" value="提交"/>
    </div>
</form>