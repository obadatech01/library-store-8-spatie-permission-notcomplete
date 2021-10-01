<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Book;
use App\Models\Category;
use App\Models\Borrowing;
use App\Exports\BooksExport;
use App\Imports\BooksImport;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\BorrowingRequest;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('has.category')->only('create');

        $this->middleware('permission:books|books-create|books-edit|books-soft-delete', ['only' => ['index','store']]);
        $this->middleware('permission:books-create', ['only' => ['create','store']]);
        $this->middleware('permission:books-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:books-soft-delete', ['only' => ['delete']]);

        $this->middleware('permission:books-export-excel', ['only' => ['exportExcel']]);
        $this->middleware('permission:books-export-pdf', ['only' => ['exportPdf']]);
        $this->middleware('permission:books-import-excel', ['only' => ['importExcel']]);
        $this->middleware('permission:books-active', ['only' => ['activeBooks']]);
        $this->middleware('permission:books-inactive', ['only' => ['inactiveBooks']]);
    }

    public function index()
    {
        $allData['books'] = Book::all();
        return view('books.index', $allData);
    }

    public function create()
    {
        $allData['categories'] = Category::all();
        return view('books.create', $allData);
    }

    public function store(BookRequest $request)
    {
        Book::create([
            'name' => $request->name,
            'code' => $request->code,
            'author' => $request->author,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'publish_date' => $request->publish_date,
            'book_edition' => $request->book_edition,
            'status' => 1,
            'user_id' => Auth::user()->id,
        ]);


        $notification = array(
            'message' => 'تم إضافة الكتاب بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('books.index')->with($notification);
    }

    public function edit($id)
    {
        $editData['books'] = Book::find($id);
        $editData['categories'] = Category::all();

        if(!$editData['books']){
            $notification = array(
                'message' => 'أعد المحاولة مرة أخرى',
                'alert-type' => 'error'
            );
            return redirect()->route('books.index')->with($notification);
        }

        return view('books.edit', $editData);
    }

    public function update(Request $request, $id)
    {
        Book::findOrFail($id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'author' => $request->author,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'publish_date' => $request->publish_date,
            'book_edition' => $request->book_edition,
            'created_at' => $request->created_at,
            'status' => $request->status,
        ]);

        $notification = array(
            'message' => 'تم تعديل الكتاب بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('books.index')->with($notification);
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->status = 0;
        $book->save();
        $book->delete();

        $notification = array(
            'message' => 'تم حذف الكتاب بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->route('books.index')->with($notification);
    }

    public function exportExcel()
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }

    public function importExcel(Request $request)
    {
        Excel::import(new BooksImport, $request->file);

        $notification = array(
            'message' => 'تم إضافة الكتب بنجاح بواسطة الإكسل',
            'alert-type' => 'success'
        );

        return redirect()->route('books.index')->with($notification);
    }

    public function exportPdf()
    {
        $allData['books'] = Book::all();
        // return view('books.export_pdf', $allData);
        $pdf = PDF::loadView('books.export_pdf', $allData);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('books.pdf');
    }

    public function activeBooks()
    {
        $allData['books'] = Book::where('status',1)->get();
        return view('books.active', $allData);
    }

    public function inactiveBooks()
    {
        $allData['books'] = Book::where('status',0)->get();
        return view('books.inactive', $allData);
    }

    public function addBorrowing($id)
    {
        $allData['books'] = Book::find($id);
        $allData['id'] = $id;

        if(!$allData['books']){
            $notification = array(
                'message' => 'أعد المحاولة مرة أخرى',
                'alert-type' => 'error'
            );
            return redirect()->route('books.index')->with($notification);
        }

        return view('books.add_borrowing', $allData);
    }

    public function storeBorrowing(BorrowingRequest $request)
    {
        // Borrowing::->create([
        //     'name' => $request->name,
        //     'address' => $request->address,
        //     'mobile' => $request->mobile,
        //     'email' => $request->email,
        //     'date_start' => $request->date_start,
        //     'borrowing_period' => $request->borrowing_period,
        //     'note' => $request->note,
        //     'book_id' => $request->book_id,
        //     'user_id' => Auth::id(),
        // ]);
        return $request->all();

        Book::find($request->book_id)->update([
            'status' => 0
        ]);

        $notification = array(
            'message' => 'تم إضافة الإستعارات بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('borrowings.index')->with($notification);
    }
}
