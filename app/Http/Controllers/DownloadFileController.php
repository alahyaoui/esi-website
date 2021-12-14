<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class DownloadFileController extends Controller
{
    /**
     * Permet de télécharger un fichier.
     *
     * @param $file_path
     * @return Response
     */
    public function index($file_path)
    {
        $file = Storage::disk('public')->get($file_path);
        return (new Response($file, 200));
    }
}
