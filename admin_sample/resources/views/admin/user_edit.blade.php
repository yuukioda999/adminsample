@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<a href="{{ url('admin/user_list') }}">ユーザーリスト</a> &gt; ユーザー更新
		</div>
		<div class="card-body">

			<ul class="list-group">
			<form method="post" action="{{route('update')}}"onSubmit="return checkSubmit()"
>
			@csrf
				<input type="hidden"name="id" value="{{$user->id}}" >
				<li class="list-group-item">名&emsp;前 <input class="w-25" type="text" name="name" value="{{ $user->name }}" ></li> 
				<div class="text-danger">{{ $errors->first('name') }}</div>
				<li class="list-group-item">メール <input class="w-25" type="text" name="email" value="{{ $user->email }}" ></li>
				<div class="text-danger">{{ $errors->first('email') }}</div>
			</ul>
			<input class="btn btn-primary" type="submit" value="更新">
			</form>
		</div>
	</div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection