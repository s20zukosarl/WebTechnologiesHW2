<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    use HasFactory;
	
	protected $fillable = ['name', 'artist_id', 'style_id', 'description', 'location', 'year'];

	public function artist()
	{
	 return $this->belongsTo(Artist::class);
	}
	
	public function style()
	{
	 return $this->belongsTo(Style::class);
	}
	
	public function jsonSerialize(): mixed
	{
	 return [
	 'id' => intval($this->id),
	 'name' => $this->name,
	 'artist' => $this->artist->name,
	 'style' => ($this->style ? $this->style->name : ''),
	 'description' => $this->description,
	 'location' => $this->location,
	 'year' => intval($this->year),
	 'image' => asset('images/' . $this->image),
	 ];
	}

}
