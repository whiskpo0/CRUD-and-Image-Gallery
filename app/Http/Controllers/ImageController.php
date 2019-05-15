<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image; 
use App\Album;
use Image as IntervesionImage; 

class ImageController extends Controller
{
    public function index()  
    {
        $images = Image::get(); 
        return view('home', compact('images')); 
    }

    public function album() 
    { 
        $albums = Album::with('images')->get(); 
        return view('welcome', compact('albums')); 
    }

    public function show($id) 
    { 
        $albums = Album::findOrFail($id); 
        return view('gallery', compact('albums')); 
    }

    public function store(Request $request)  
    {
        
        $this->validate($request, [
            'album'=> 'required|min:3|max:50', 
            'image'=> 'required'
        ]); 

        $album = Album::create([
            'name' => $request->get('album')
        ]); 

        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $path = $image->store('uploads', 'public');

                Image::create([
                    'name'     => $path, 
                    'album_id' => $album->id
                ]);
            }             
        }

        return "<div class='alert alert-success'>Album created successfully!</div>";
    }

    public function addImage(Request $request)
    { 
        $albumId = request('id'); 

        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $path = $image->store('uploads', 'public');

                Image::create([
                    'name'     => $path, 
                    'album_id' => $albumId
                ]);
            }             
        }

        return \redirect()->back()->with('message', 'Images added successfully!');  
    }

    public function albumImage(Request $request){
        $this->validate($request,[
            'image'=>'required'
        ]);
        $albumId= request('id');
        if($request->hasFile('image')){
                $file = $request->file('image');
                $path = $file->store('uploads','public');
                Album::where('id',$albumId)->update([
                    'image'=> $path,
                ]);
            }
        
        return redirect()->back()->with('message','Album images added successfully!');
    }

    public function upload(){
        $albums = Album::get();
        return view('upload',compact('albums'));
    }

    public function postUpload(Request $request){
        if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                IntervesionImage::make($file)->resize(100,100)->save('avatars/'.$filename);

                Album::create([
                    'image'=>$filename,
                    'name'=>'resizing image'
                ]);
                return back();
        }

    }

    public function destroy()
    { 
        $id = request('id'); 
        $imagesDelete = Image::findOrFail($id);
        $imagesDelete->delete(); 

        return redirect()->back()->with('message', 'Image delete successfully!'); 
    }
}
