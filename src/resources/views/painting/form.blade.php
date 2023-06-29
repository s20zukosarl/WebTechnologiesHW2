@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if ($errors->any())
 <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
@endif
<form
 
 method="post"
 enctype="multipart/form-data"
 action="{{ $painting->exists ? '/paintings/patch/' . $painting->id : '/paintings/put' }}">
 
 
 @csrf
 <div class="mb-3">
 <label for="painting-name" class="form-label">Nosaukums</label>
 <input
 type="text"
 id="painting-name"
 name="name"
 value="{{ old('name', $painting->name) }}"
 class="form-control @error('name') is-invalid @enderror"
 >
 @error('name')
 <p class="invalid-feedback">{{ $errors->first('name') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="painting-artist" class="form-label">Mākslinieks</label>
 <select
 id="painting-artist"
 name="artist_id"
 class="form-select @error('artist_id') is-invalid @enderror"
 >
 <option value="">Norādiet mākslinieku!</option>
 @foreach($artists as $artist)
 <option
 value="{{ $artist->id }}"
 @if ($artist->id == old('artist_id', $painting->artist->id ?? false)) selected @endif
 >{{ $artist->name }}</option>
 @endforeach
 </select>
 @error('artist_id')
 <p class="invalid-feedback">{{ $errors->first('artist_id') }}</p>
 @enderror
 </div>
 
 <div class="mb-3">
 <label for="painting-style" class="form-label">Stils</label>
 <select
 id="painting-style"
 name="style_id"
 class="form-select @error('style_id') is-invalid @enderror"
 >
 <option value="">Norādiet stilu!</option>
 @foreach($styles as $style)
 <option
 value="{{ $style->id }}"
 @if ($style->id == old('style_id', $painting->style->id ?? false)) selected @endif
 >{{ $style->name }}</option>
 @endforeach
 </select>
 @error('style_id')
 <p class="invalid-feedback">{{ $errors->first('style_id') }}</p>
 @enderror
 </div>
 
 <div class="mb-3">
 <label for="painting-description" class="form-label">Apraksts</label>
<textarea
 id="painting-description"
 name="description"
 class="form-control @error('description') is-invalid @enderror"
 >{{ old('description', $painting->description) }}</textarea>
 @error('description')
 <p class="invalid-feedback">{{ $errors->first('description') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="painting-year" class="form-label">Izdošanas gads</label>
 <input
 type="number"
 id="painting-year"
 name="year"
 value="{{ old('year', $painting->year) }}"
 class="form-control @error('year') is-invalid @enderror"
 >
 @error('year')
 <p class="invalid-feedback">{{ $errors->first('year') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="painting-location" class="form-label">Atrašanās vieta</label>
 <input
 type="text"
 id="painting-location"
 name="location"
 value="{{ old('location', $painting->location) }}"
 class="form-control @error('painting') is-invalid @enderror"
 >
 @error('location')
 <p class="invalid-feedback">{{ $errors->first('location') }}</p>
 @enderror
 </div>
 

 
 <div class="mb-3">
 <div class="form-check">
 <input
 type="checkbox"
 id="painting-display"
 name="painting"
 value="1"
 class="form-check-input @error('display') is-invalid @enderror"
 @if (old('display', $painting->display)) checked @endif>
 <label class="form-check-label" for="painting-display">
 Publicēt ierakstu
 </label>
 <div class="mb-3">
	 <label for="painting-image" class="form-label">Attēls</label>
	 @if ($painting->image)
	 <img
	 src="{{ asset('images/' . $painting->image) }}"
	 class="img-fluid img-thumbnail d-block mb-2"
	 alt="{{ $painting->name }}"
	 >
	 @endif
	 <input
	 type="file" accept="image/png, image/jpg"
	 id="painting-image"
	 name="image"
	 class="form-control @error('image') is-invalid @enderror"
	 >
	 @error('image')
	 <p class="invalid-feedback">{{ $errors->first('image') }}</p>
	 @enderror
</div>
@error('display')
 <p class="invalid-feedback">{{ $errors->first('display') }}</p>
 @enderror
 </div>
 </div>
 <button type="submit" class="btn btn-primary">
 {{ $painting->exists ? 'Atjaunot ierakstu' : 'Pievienot ierakstu' }}
 </button>


</form>
@endsection
