<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DocumentController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048',
            'name'=>'required',
            'description'=>'required',
            'department'=>'required'
        ]);

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pdfs'), $fileName);

            // Сохранение информации о файле в базе данных
            $pdf = new Document();
            $pdf->path = $fileName;
            $pdf->name = $request->input('name');
            $pdf->description = $request->input('description');
            $pdf->department = $request->input('department');
            $pdf->user_id = auth()->user()->id;
            $pdf->save();

            // Дополнительные действия, если нужно

            return redirect()->route('admin.document.index');
        }

        return redirect()->back()->with('error', 'Не удалось загрузить PDF.');
    }

    public function create()
    {
        return view('admin.document.create');
    }

    public function index()
    {
        $documents = Document::all();
        return view('admin.document.index', compact('documents'));
    }

    public function downloadFile($id)
    {
        $pdf = Document::find($id);

        if ($pdf) {
            $filePath = public_path('pdfs/' . $pdf->path);

            return Response::download($filePath, $pdf->path);
        }

        return redirect()->back()->with('error', 'Файл не найден.');
    }
}
