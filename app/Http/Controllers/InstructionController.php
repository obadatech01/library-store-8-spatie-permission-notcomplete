<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Http\Request;
use App\Http\Requests\InstructionRequest;
use Illuminate\Support\Facades\Auth;

class InstructionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:instructions|instructions-create|instructions-edit|instructions-delete', ['only' => ['index','store']]);
        $this->middleware('permission:instructions-create', ['only' => ['create','store']]);
        $this->middleware('permission:instructions-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:instructions-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $allData['instructions'] = Instruction::all();
        return view('instructions.index', $allData);
    }

    public function create()
    {
        return view('instructions.create');
    }

    public function store(InstructionRequest $request)
    {
        Instruction::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        $notification = array(
            'message' => 'تم إضافة الإرشادات بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('instructions.index')->with($notification);
    }

    public function edit($id)
    {
        $editData['instructions'] = Instruction::find($id);

        if(!$editData['instructions']){
            $notification = array(
                'message' => 'أعد المحاولة مرة أخرى',
                'alert-type' => 'error'
            );
            return redirect()->route('instructions.index')->with($notification);
        }
        // $editData['instructions'] = Instruction::findOrFail($id);
        return view('instructions.edit', $editData);
    }

    public function update(Request $request, $id)
    {
        Instruction::findOrFail($id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        $notification = array(
            'message' => 'تم تعديل الإرشادات بنجاح',
            'alert-type' => 'info'
        );

        return redirect()->route('instructions.index')->with($notification);
    }

    public function delete($id)
    {
        $instructions = Instruction::findOrFail($id);

        if(!$instructions){
            $notification = array(
                'message' => 'أعد المحاولة مرة أخرى',
                'alert-type' => 'error'
            );
            return redirect()->route('instructions.index')->with($notification);
        }

        $instructions->delete();

        $notification = array(
            'message' => 'تم حذف الإرشادات بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->route('instructions.index')->with($notification);
    }
}
