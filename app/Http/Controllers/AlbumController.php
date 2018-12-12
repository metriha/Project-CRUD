<?php

namespace App\Http\Controllers;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;
use Storage;
use App\Album;
use PDF;

class AlbumController extends Controller
{

    public function add()
    {
    	$data['album'] = Album::get();
    	return view('album.add')->with($data);
    }

    public function save(Request $r)
    {
        $file = $r->file('img');
    	$album = new \App\Album;
    	$album->name = $r->get('name');
    	$album->artist = $r->get('artist');
    	$album->category_artist = $r->get('category_artist');
    	$album->year = $r->get('year');
    	$album->genre_music = $r->get('genre_music');
    	$album->track = $r->get('track');
        $album->img = $file->getClientOriginalName();
        $file->move('foto/', $file->getClientOriginalName());

    	$album->save();
    	return redirect(url('add'));
    }

    public function edit($id)
    {
    	$data ['album'] = Album::findorFail($id);
    	return view('album.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
    	$album = Album::find($id);
    	$album->name = $request->input('name');
    	$album->artist = $request->input('artist');
    	$album->category_artist = $request->input('category_artist');
    	$album->year = $request->input('year');
    	$album->genre_music = $request->input('genre_music');
    	$album->track = $request->input('track');



    	$album->save();
    	return redirect(url('add'));
    }

    public function delete($id)
    {
        $album = \App\Album::find($id);
        $album->delete();

        return redirect('add');
    }


    public function pdf(Request $r)
    {
        $album = Album::find($r->input('id'));
        $data['album'] = Album::all();
        $pdf = PDF::loadview('album.pdf', $data);
        return $pdf->download('data_album.pdf');
    }
}