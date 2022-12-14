<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function uploadImage(Request $request, string $folder = "", string $input = '', string $name = '')
    {
        if ($request->has($name)) {
            $file_name =  Storage::disk('public')->putFile(
                $folder,
                $input,
            );

            return $file_name;
        }
        return null;
    }
}
