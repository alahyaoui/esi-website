<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class DownloadFileController extends Controller
{
    /**
     * Permet de télécharger un fichier.
     *
     * @param $file_path
     * @return Response
     * @throws FileNotFoundException
     */
    public function index($file_path)
    {
        $file = Storage::disk('public')->get($file_path);
        return (new Response($file, 200));
    }
}
