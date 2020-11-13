<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Downloade;
use Response;
use DB;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {


        $locale= app()->getLocale();
        $files = DB::table('files')
        ->select('id','name_'.$locale.' as name','file' )
        ->get();


        return view('file.index', [
            'files' => $files,
        ]);
    }

    public function download($locale,File $file)
    {

        $url = storage_path('app/public/'.$file->getLink($file)) ;
        $download = Downloade::where('file_id', $file->id)->first();

        if ($download ) {
          $download->counter+=1;
          $download->update();
        }else{

          $download = new Downloade();
          $download->file_id=$file->id;
          $download->counter+=1;
          $download->save();
        }
           return Response::download($url);



    }
}
