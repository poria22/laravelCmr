<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostEditorController extends Controller
{
    public function uplod(Request $request)
    {

        $file = $request->file('upload');
        $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $file_name = $base_name . '_' . time() . '.' . $ext;
        $file->storeAs('images/posts', $file_name, 'public_files');
        $function = $request->CKEditorFuncNum;
        $url = asset('images/posts/' . $file_name);
        return response("<script>window.parent.CKEDITOR.tools.callFunction({$function} ,{$url},'save'})</script>");
    }
}



