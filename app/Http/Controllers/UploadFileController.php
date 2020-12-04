<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UploadFileController extends Controller
{
    public function upload(Request $request)
    {
        $fileName = $request->file('filename')->store('');
        $session = Session::put('filename', $fileName);
        return $fileName;
    }
}
