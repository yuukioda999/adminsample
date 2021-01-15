@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">管理側TOP</div>
		<div class="card-body d-inline-flex">
			<div>
				<a href="{{ url('admin/user_list') }}" class="btn btn-primary">ユーザーリスト</a>
			</div>

			<form method="post" action="{{ url('admin/logout') }}">
				@csrf
				<input type="submit" class="btn btn-danger" value="ログアウト" />
			</form>
		</div>
	</div>
</div>
@endsection