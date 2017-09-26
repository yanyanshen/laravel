@if (count($errors))
    {{--取出一条错误信息--}}
    <div class="alert alert-danger">
        <ul>
            <li>{{ $errors->first()}}</li>
        </ul>
    </div>
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif