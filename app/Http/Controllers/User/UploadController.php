<?php

namespace App\Http\Controllers\User;

use Storage;
use File;
use Image;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use App\Advert;
use App\Upload;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Advert $advert, Request $request)
    {

      $uploadedFile = $request->file('file');

      $upload = $this->storeUpload($advert, $uploadedFile);

        if ($request->hasFile('file')) {
            $photo = $request->file('file');

            $filename = Auth::user()->username.'-'.time().'-'.str_slug($uploadedFile->getClientOriginalName()).'.'.$uploadedFile->getClientOriginalExtension();

            try {
                $image = Image::make($photo);
                // If valid file
                $image->resize(800, 600, function($constraint){ $constraint->aspectRatio(); });
                $image->save('assets/images/advert/'.$filename);
            }
            catch(NotReadableException $e) {
//                flash('The File is not valid. Ensure the file is in either JPG, PNG or GIF format', 'danger');
                return false;
            }
        }

        // Storage::disk('local')->put($upload->filename, File::get($uploadedFile));

      return $upload;
    }

    protected function storeUpload(Advert $advert, UploadedFile $uploadedFile)
    {
        $upload = new Upload;

        $upload->fill([
            'filename' => $this->generateFilename($uploadedFile, $advert->title),
            'size' => $uploadedFile->getSize(),
            'user_id' => Auth::id(),
        ]);

        $upload->advert()->associate($advert);
        // $upload->user()->associate(auth()->user());

        $upload->save();

        // dd($upload);

        return $upload;
    }

    public function getPhoto($photo)
    {
        if ($photo)
        {
            return response()->download(Storage_path('assets/images/advert/'.$photo), null, [], null);
//          $file = Storage::disk('local')->get($photo);
//
//          return new Response($file, 200);
        }
    }

    protected function generateFilename(UploadedFile $uploadedFile)
    {
        return Auth::user()->username.'-'.time().'-'.str_slug($uploadedFile->getClientOriginalName()).'.'.$uploadedFile->getClientOriginalExtension();
    }

    public function destroy(Advert $advert, Upload $upload)
    {
        // $this->authorize('touch', $advert);
        // $this->authorize('touch', $upload);

        // prevent all products from being deleted when editing advert
        // if ($advert->uploads->count() === 1) {
        //     return response()->json(null, 422);
        // }

        // Delete file


        // $oldFilename = $old->filename;

        // // dd($oldFilename);

        if(file_exists('assets/images/advert/'.$upload->filename)){

            Storage::delete('assets/images/advert/'.$upload->filename);
            $upload->delete();
            return 'yes';

        }else{
            return 'assets/images/advert/'.$upload->filename;
        }
    }
}
