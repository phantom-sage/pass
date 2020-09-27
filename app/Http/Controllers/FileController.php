<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use DB;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $file= File::find(1);
    // $download = (json_decode($file->file))[]->download_link;

    
        $locale= app()->getLocale();
        $files = DB::table('files')
        ->select('name_'.$locale.' as name','file' )
        ->get();


        return view('file.index', [
            'files' => $files,
        ]);
    }


}
