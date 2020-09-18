<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function merhaba() {
		//$users = DB::table('users')->get(); //veritabanından kullanıcı çeker
		//$users = User::all(); //Model kullanarak veri çekme
		//dd($users);
		
		//$products = Product::with(['user'])->get();
		//dd($products);
		///$products = DB::table('products')
			///->join('users', 'users.id, '=', 'products.created_by')
			///->get();

			
		return view('merhaba', compact('products')); //->with(['users'=>$users]); //merhaba isimli view dosyasına kullanucuları gönderir
	}
	
	public function createView()
	{
		return view('users.create');
	}
	
	public function create(Request $request)
	{
			$data = $request->all();
			$password = $request->get('password');
			
			DB::table('users')->insert([
				'name' =>$request->get('name'),
				'email' =>$request->get('email'),
				'password' =>Hash::make($password),//Kriptolanmış halde şifreleme
			]);
			
			return 'Kayıt başarıyla tamamlandı';
	}
	
	
	public function updateView(Request $request)
	{
		return view('users.update');
	}
	
	
	public function indexView()
	{
			$users = User::where('deleted_at','=',null)->get();
			return view('users.index', compact('users'));
	}

	
	public function delete($id)
	{
			//DB::table('users')->where('id', '=',$id)->delete();//Hard delete ile veriyi siler tavsiye edilmez.
			DB::table('users')->where('id', '=',$id)->update([
				'deleted_at' => Carbon::now()
			]);
			
			return 'Başarrıyla Silindi';
	}
	
	
	
	
}




