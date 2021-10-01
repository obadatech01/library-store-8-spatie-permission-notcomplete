<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BorrowingRequest;
use App\Models\Book;

class BorrowingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $allData['borrowings'] = Borrowing::all();
        return view('borrowings.index', $allData);
    }

    public function create()
    {
        $allData['books'] = Book::all();
        return view('borrowings.create', $allData);
    }

    public function store(BorrowingRequest $request)
    {
        Borrowing::create([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'date_start' => $request->date_start,
            'borrowing_period' => $request->borrowing_period,
            'note' => $request->note,
            'book_id' => $request->book_id,
            'user_id' => Auth::id(),
        ]);

        Book::find($request->book_id)->update([
            'status' => 0
        ]);

        $notification = array(
            'message' => 'تم إضافة الإستعارات بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('borrowings.index')->with($notification);
    }

    public function edit($id)
    {
        $editData['borrowings'] = Borrowing::find($id);
        $editData['books'] = Book::all();

        if(!$editData['borrowings']){
            $notification = array(
                'message' => 'أعد المحاولة مرة أخرى',
                'alert-type' => 'error'
            );
            return redirect()->route('borrowings.index')->with($notification);
        }
        // $editData['borrowings'] = Borrowing::findOrFail($id);
        return view('borrowings.edit', $editData);
    }

    public function update(Request $request, $id)
    {
        Borrowing::findOrFail($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'date_start' => $request->date_start,
            'borrowing_period' => $request->borrowing_period,
            'note' => $request->note,
            'book_id' => $request->book_id,
            'user_id' => Auth::id(),
        ]);

        $notification = array(
            'message' => 'تم تعديل الإستعارات بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('borrowings.index')->with($notification);
    }

    public function delete($id)
    {
        $borrowings = Borrowing::findOrFail($id);

        if(!$borrowings){
            $notification = array(
                'message' => 'أعد المحاولة مرة أخرى',
                'alert-type' => 'error'
            );
            return redirect()->route('borrowings.index')->with($notification);
        }

        $borrowings->delete();

        $notification = array(
            'message' => 'تم حذف الإستعارات بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->route('borrowings.index')->with($notification);
    }
}
