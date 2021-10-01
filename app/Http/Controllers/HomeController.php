<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Instruction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allData['categories'] = Category::all();
        $allData['books'] = Book::all();
        $allData['booksActive'] = Book::where('status',1)->get();
        $allData['booksInactive'] = Book::where('status',0)->get();
        $allData['instructions'] = Instruction::all();
        return view('home', $allData);
    }
}
