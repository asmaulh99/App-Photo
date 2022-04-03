<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    //Tampil Semua data
    public function index()
    {
        $data = Photo::all();
        return response()->json($data,200);
    }
    // Insert Data
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'file' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $photo = $request->file('file');
        $photo->storeAs('public/img', $photo->getClientOriginalName());
            Photo::create([
                'file' => $photo->getClientOriginalName(),
                'caption' => $request->caption,
                'tags' => $request->tags,
                'like' => $request->like
            ]);
            return response()->json(['message'=>'Data Berhasil di Insert']);
    }
    //Tampil Data tunggal
    public function show($id)
    {
        $array=[
            'id' => $id
        ];
        $validator = Validator::make($array, ['id' => 'integer']);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $data = Photo::findOrFail($id);
        return response()->json($data, 200);
    }
    //Update Data
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all()+['id'=>$id],[
            'file' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'id' => 'integer'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $file=Photo::findOrFail($id);
        Storage::delete('public/img/'.$file->file);
        $photo = $request->file('file');
        $photo->storeAs('public/img', $photo->getClientOriginalName());
        Photo::where('id',$id)->update([
            'file' => $photo->getClientOriginalName(),
            'caption' => $request->caption,
            'tags' => $request->tags,
            'like' => $request->like
        ]);
        return response()->json(['message'=>'Data berhasil di update'], 200);
    }
    //Like Photo
    public function like($id){
        Photo::where('id',$id)->update(['like'=>true]);
        return response()->json(['message'=> 'like berhasil'], 200);
    }
    //Unlike Photo
    public function unlike($id){
        Photo::where('id',$id)->update(['like'=>false]);
        return response()->json(['message'=> 'unlike berhasil'], 200);
    }
    //hapus data
    public function destroy($id)
    {
        Photo::where('id',$id)->delete();
        return response()->json(['message'=>'berhasil menghapus data'], 200);
    }
}
