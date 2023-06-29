<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Style;


class StyleController extends Controller
{
    public function list()
	{
	 $items = Style::orderBy('name', 'asc')->get();
	 return view(
	 'style.list',
	 [
	 'title' => 'Stili',
	 'items' => $items
	 ]
	 );
	}
	
	public function create()
	{
	 return view(
	 'style.form',
	 [
	 'title' => 'Pievienot stilu',
	 'style' => new Style()

	 ]
	 );
	}
	
	public function put(Request $request)
	{
	 $validatedData = $request->validate([
	 'name' => 'required',
	 ]);
	 $style = new Style();
	 $style->name = $validatedData['name'];
	 $style->save();
	 return redirect('/styles');
	}
	
	public function update(Style $style)
	{
	 return view(
	 'style.form',
	 [
	 'title' => 'Rediģēt stilu',
	 'style' => $style
	 ]
	 );
	}
	
	public function patch(Style $style, Request $request)
	{
	 $validatedData = $request->validate([
	 'name' => 'required',
	 ]);
	 $style->name = $validatedData['name'];
	 $style->save();
	 return redirect('/styles');
	}
	
	public function delete(Style $style)
	{
	 $style->delete();
	 return redirect('/styles');
	}

}
