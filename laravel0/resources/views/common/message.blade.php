@if(Session::has('success'))
<div>{{ Session::get('success') }}</div>
@endif

@if(Session::has('error'))
<div>{{Session::get('error')}}</div>
@endif