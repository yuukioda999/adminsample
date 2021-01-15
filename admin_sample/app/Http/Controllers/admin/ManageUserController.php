<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


use App\Http\Requests\AdminRequest;
class ManageUserController extends Controller
{
	// function showUserList(){
	// 	$user_list = User::orderBy("id", "desc")->paginate(10);
	// 	return view("admin.user_list", [ "user_list" => $user_list
	// 	]);
	// }
	function showUserList(Request $request){

		$keyword = $request->input('keyword');

		$query = User::query();

		if(!empty($keyword))
{
$query->where('email','like','%'.$keyword.'%')->orWhere('name','like','%'.$keyword.'%');
}



		$user_list = $query->orderBy("id", "desc")->paginate(10);
		return view("admin.user_list")->with('user_list',$user_list)->with('keyword',$keyword);
	}

	function showUserDetail($id){
		$user = User::find($id);
		return view("admin.user_detail", [
			"user" => $user
		]);

	}
	function showUserEdit($id){
		$user = User::find($id);
		return view("admin.user_edit", [
			"user" => $user
		]);
		
	}
	function exeUpdate(AdminRequest $request){

		$inputs = $request->all();
		
		\DB::beginTransaction();
		try{
		 $user = User::find($inputs['id']);
		 $user->fill([
			 'name' => $inputs['name'],
			 'email' => $inputs['email']	
		 ]);
		 $user->save();
		 \DB::commit();
		}catch(\throwable $e){
			\DB::rollback();
			abort(500);
		}	
	
		return redirect(route('list'))->with('flashmessage', '更新が完了いたしました。');
	}
	function exeDelete($id){

		try{
			User::destroy($id);
		}catch(\Throwable $e){

		}

		return redirect(route('list'))->with('flashmessage', '削除が完了いたしました。');
	}

	
}


