<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Painting;
use App\Models\Artist;
use App\Models\Style;
use App\Http\Requests\PaintingRequest;


class PaintingController extends Controller
{
    //
	
	public function list()
	{
	 $items = Painting::orderBy('name', 'asc')->get();
	 return view(
	 'painting.list',
	 [
	 'title' => 'Gleznas',
	 'items' => $items
	 ]
	 );
	}
	
	public function create()
	{
	 $artists = Artist::orderBy('name', 'asc')->get();
	 $styles = Style::orderBy('name', 'asc')->get();
	 return view(
	 'painting.form',
	 [
	 'title' => 'Pievienot gleznu',
	 'painting' => new Painting(),
	 'artists' => $artists,
	 'styles' => $styles,
	 ]
	 );
	}
	private function savePaintingData(Painting $painting, PaintingRequest $request)
	{
	 $validatedData = $request->validated();
	 
	 $painting->fill($validatedData);

	 $painting->display = (bool) ($validatedData['display'] ?? false);
	 if ($request->hasFile('image')) {
	 $uploadedFile = $request->file('image');
	 $extension = $uploadedFile->clientExtension();
	 $name = uniqid();
	 $painting->image = $uploadedFile->storePubliclyAs(
	 '/',
	 $name . '.' . $extension,
	 'uploads'
	 );
	 }
	 $painting->save();
	}
	
	public function put(Request $request)
	{
		 $validatedData = $request->validate([
		 'name' => 'required|min:3|max:256',
		 'artist_id' => 'required',
		 'style_id' => 'required',
		 'description' => 'nullable',
		 'location' => 'nullable',
		 'year' => 'numeric',
		 'image' => 'nullable|image',
		 'display' => 'nullable'
		 ]);
		 $painting = new Painting();
		 $painting->name = $validatedData['name'];
		 $painting->artist_id = $validatedData['artist_id'];
		 $painting->style_id = $validatedData['style_id'];
		 $painting->description = $validatedData['description'];
		 $painting->location = $validatedData['location'];
		 $painting->year = $validatedData['year'];
		 $painting->display = (bool) ($validatedData['display'] ?? false);
		 if ($request->hasFile('image')) {
			 $uploadedFile = $request->file('image');
			 $extension = $uploadedFile->clientExtension();
			 $name = uniqid();
			 $painting->image = $uploadedFile->storePubliclyAs(
			 '/',
			 $name . '.' . $extension,
			 'uploads'
			 );
			}
		 $painting->save();
		 return redirect('/paintings');
	}
	public function patch(Painting $painting, Request $request)
	{
		 $validatedData = $request->validate([
		 'name' => 'required|min:3|max:256',
		 'artist_id' => 'required',
		 'style_id' => 'required',
		 'description' => 'nullable',
		 'location' => 'nullable',
		 'year' => 'numeric',
		 'image' => 'nullable|image',
		 'display' => 'nullable'
		 ]);
		 $painting->name = $validatedData['name'];
		 $painting->artist_id = $validatedData['artist_id'];
		 $painting->style_id = $validatedData['style_id'];
		 $painting->description = $validatedData['description'];
		 $painting->location = $validatedData['location'];
		 $painting->year = $validatedData['year'];
		 $painting->display = (bool) ($validatedData['display'] ?? false);
		 if ($request->hasFile('image')) {
			 $uploadedFile = $request->file('image');
			 $extension = $uploadedFile->clientExtension();
			 $name = uniqid();
			 $painting->image = $uploadedFile->storePubliclyAs(
			 '/',
			 $name . '.' . $extension,
			 'uploads'
			 );
			}
		 $painting->save();
		 return redirect('/paintings/update/' . $painting->id);
	}

	
	public function update(Painting $painting)
	{
	 $artists = Artist::orderBy('name', 'asc')->get();
	 $styles = Style::orderBy('name', 'asc')->get();
	 return view(
	 'painting.form',
	 [
	 'title' => 'Rediģēt gleznu',
	 'painting' => $painting,
	 'artists' => $artists,
	 'styles' => $styles,
	 ]
	 );
	}

	public function delete(Painting $painting)
	{
	 $painting->delete();
	 return redirect('/paintings');
	}
	
	public function __construct()
	{
	 $this->middleware('auth');
	}

}
