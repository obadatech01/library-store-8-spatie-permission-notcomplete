<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $allData['user'] = User::find($id);
        $allData['books'] = Book::where('user_id', $id)->get();
        $allData['booksArchive'] = Book::onlyTrashed()->where('user_id', $id)->get();
        $allData['categories'] = Category::where('user_id', $id)->get();
        $allData['categoriesArchive'] = Category::onlyTrashed()->where('user_id', $id)->get();

        if(!$allData['user']){
            $notification = array(
                'message' => 'أعد المحاولة مرة أخرى',
                'alert-type' => 'error'
            );
            return redirect()->route('users.index')->with($notification);
        }

        return view('users.profiles.index', $allData);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function passwordEdit()
    {
        return view('users.password.edit');
    }

    public function passwordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ],[
            'current_password.required' => 'أدخل كلمة السر',
            'password.required' => 'أدخل كلمة السر الجديدة',
            'password.confirmed' => 'أعد كتابة كلمة السر الجديدة بشكل صحيح',
            'password.min' => 'الحد الأدنى 8 رموز',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }
}
