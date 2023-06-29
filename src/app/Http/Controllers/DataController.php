<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Painting;

class DataController extends Controller
{
    // Metode atgriež 3 publicētus Book ierakstus nejaušā secībā
	public function getTopPaintings()
	{
	 $paintings = Painting::where('display', true)
	 ->inRandomOrder()
	 ->take(3)
	 ->get();
	 return $paintings;
	}
	// Metode atgriež izvēlēto Book ierakstu, ja tas ir publicēts
	public function getPainting(Painting $painting)
	{
	 $selectedPainting = Painting::where([
	 'id' => $painting->id,
	 'display' => true,
	 ])
	 ->firstOrFail();
	 return $selectedPainting;
	}
	// Metode atgriež 3 publicētus Book ierakstus nejaušā secībā,
	// izņemot izvēlēto Book ierakstu
	public function getRelatedPaintings(Painting $painting)
	{
	 $paintings = Painting::where('display', true)
	 ->where('id', '<>', $painting->id)
	 ->inRandomOrder()
	 ->take(3)
	 ->get();
	 return $paintings;
	}

}
