<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('ckeditor', 'public');
            $url = asset('storage/' . $fileName);
            return response()->json([
                'url' => $url
            ]);
        }
    }
}
