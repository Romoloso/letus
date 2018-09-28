<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BuildFormData;

class FileController extends Controller
{
    public function index()
    {
        echo 1;
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $build = new BuildFormData(route('files.test'));
        $build->request($_POST);

    }

    public function test()
    {
        return $_POST;
    }
}
