<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaintingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:256',
			'artist_id' => 'required',
			'style_id' => 'required',
			'description' => 'nullable',
			'location' => 'nullable|numeric',
			'year' => 'numeric',
			'image' => 'nullable|image',
			'display' => 'nullable'
        ];
    }
	
	public function messages()
	{
		 return [
		 'required' => 'Lauks ":attribute" ir obligāts',
		 'min' => 'Laukam ":attribute" jābūt vismaz :min simbolus garam',
		 'max' => 'Lauks ":attribute" nedrīkst būt garāks par :max simboliem',
		 'boolean' => 'Lauka ":attribute" vērtībai jābūt "true" vai "false"',
		 'unique' => 'Šāda lauka ":attribute" vērtība jau ir reģistrēta',
		 'numeric' => 'Lauka ":attribute" vērtībai jābūt skaitlim',
		 'image' => 'Laukā ":attribute" jāpievieno korekts attēla fails',
		 ];
	}
	public function attributes()
		{
		 return [
		 'name' => 'nosaukums',
		 'artist_id' => 'mākslinieks',
		 'style_id' => 'stils',
		 'description' => 'apraksts',
		 'location' => 'lokācija',
		 'year' => 'gads',
		 'image' => 'attēls',
		 'display' => 'publicēt',
		 ];
		}

}
