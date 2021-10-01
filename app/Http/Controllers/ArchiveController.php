<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // users
        $this->middleware('permission:archives', ['only' => ['indexBook','indexCategory','indexUser']]);
        $this->middleware('permission:archives-users', ['only' => ['indexUser']]);
        $this->middleware('permission:archives-users-restore', ['only' => ['restoreUser']]);
        $this->middleware('permission:users-force-delete', ['only' => ['forceDeleteUser']]);

        // categories
        $this->middleware('permission:archives-categories', ['only' => ['indexCategory']]);
        $this->middleware('permission:archives-categories-restore', ['only' => ['restoreCategory']]);
        $this->middleware('permission:categories-force-delete', ['only' => ['forceDeleteCategory']]);

        // books
        $this->middleware('permission:archives-books', ['only' => ['indexBook']]);
        $this->middleware('permission:archives-books-restore', ['only' => ['restoreBook']]);
        $this->middleware('permission:books-force-delete', ['only' => ['forceDeleteBook']]);
    }

    ##########Start Book Archive##########
    public function indexBook()
    {
        $allData['books'] = Book::onlyTrashed()->get();
        return view('books.archive.index', $allData);
    }

    public function restoreBook($id)
    {
        Book::onlyTrashed()->where('id', $id)->restore();

        $notification = array(
            'message' => 'تم استعادة الكتاب بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('books.index')->with($notification);
    }

    public function forceDeleteBook($id)
    {
        Book::onlyTrashed()->where('id', $id)->forceDelete();

        $notification = array(
            'message' => 'تم حذف الكتاب بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->route('archive.books.index')->with($notification);
    }
    ##########End Book Archive##########

    ##########Start Category Archive##########
    public function indexCategory()
    {
        $allData['categories'] = Category::onlyTrashed()->get();
        return view('categories.archive.index', $allData);
    }

    public function restoreCategory($id)
    {
        Category::onlyTrashed()->where('id', $id)->restore();

        $notification = array(
            'message' => 'تم استعادة القسم بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    public function forceDeleteCategory($id)
    {
        Category::onlyTrashed()->where('id', $id)->forceDelete();

        $notification = array(
            'message' => 'تم حذف القسم بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->route('archive.categories.index')->with($notification);
    }
    ##########End Category Archive##########

    ##########Start User Archive##########
    public function indexUser()
    {
        $allData['users'] = User::onlyTrashed()->get();
        return view('users.archive.index', $allData);
    }

    public function restoreUser($id)
    {
        User::onlyTrashed()->where('id', $id)->restore();

        $notification = array(
            'message' => 'تم استعادة المستخدم بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')->with($notification);
    }

    public function forceDeleteUser(Request $request, $id)
    {
        User::onlyTrashed()->where('id', $id)->forceDelete();

        $notification = array(
            'message' => 'تم حذف المستخدم بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->route('archive.users.index')->with($notification);
    }
    ##########End User Archive##########
}
