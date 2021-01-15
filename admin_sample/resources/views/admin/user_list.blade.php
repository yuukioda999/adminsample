@extends('layouts.admin')

@section('content')
<!-- //ここから検索機能  -->

<!-- ここから一覧表示 -->
<div class="row">
<div class="col-4 mx-auto" 
><div class="form-group">
<form class="form-inline" method="get" action="{{url('admin/user_list')}}">
  
  <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="">
  
  <input type="submit" value="検索" class="btn btn-info">
</form>
</div>
</div>
<div class="container col-md-10 col-md-offset-2">
	<div class="card">
		<div class="card-header">ユーザーリスト</div>
		<div class="card-body table-responsive-sm">


<table class="table table-striped table-hover">
      <tr>
					
          <th>ユーザー</th>
          <th>メールアドレス</th>
          <th></th>
     
          
          
      </tr>
      @foreach($user_list as $user)
      <tr>
					
          <td><a href="{{ url('admin/user/' . $user->id) }}">{{$user -> name}}</td>
          <td>{{$user ->email}}</a></td>
          
          <td class="d-flex"><input class="btn btn-primary h-25" type="button" onclick="location.href='{{ url('admin/edit/' . $user->id) }}'" value="更新"><form method="post" action="{{route('delete',$user->id)}}"onSubmit="return checkDelete()"
					>
           @csrf
          <input class="btn btn-danger" type="submit" onclick="" value="削除">
          </form></td>
          
          
      </tr>
      @endforeach
  </table>
	
			<div class="mt-3">
				<!-- {{ $user_list->links() }} -->
			
 <!-- {!! $user_list->render() !!} -->
 <!-- page control -->
 {!! $user_list->appends(['keyword'=>$keyword])->render() !!}
			</div>
			
		</div>
	</div>
</div>
</div>

<script>
function checkDelete(){
if(window.confirm('削除してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection​
@if(Session::has('flashmessage'))
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script>
  $(window).load(function() {
  $('#modal_box').modal('show');
  });
</script>
 
<!-- モーダルウィンドウの中身 -->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <!-- <h4 class="modal-title"></h4> -->
  </div>
  <div class="modal-body">
  {{ session('flashmessage') }}
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
  </div>
  </div>
  </div>
</div>
@endif

<!-- <ul class="list-group ">
				@foreach ($user_list as $user)
				<div class=><li class="list-group-item ">
				{{ $user->name }}
					
				
					<input class="btn btn-primary h-25" type="button" onclick="location.href='{{ url('admin/user/' . $user->id) }}'" value="詳細">
					<input class="btn btn-primary h-25" type="button" onclick="location.href='{{ url('admin/edit/' . $user->id) }}'" value="更新">
					<form method="post" action="{{route('delete',$user->id)}}"onSubmit="return checkDelete()"
					>
					@csrf
					<input class="btn btn-primary" type="submit" onclick="" value="削除">
					</form>
					</div>
					
					<!-- </div> -->
				<!-- </li> -->
				<!-- @endforeach -->
			<!-- </ul> --> 