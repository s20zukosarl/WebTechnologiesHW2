@extends('layout')
@section('content')
 <h1>{{ $title }}</h1>
 @if ($errors->any())
 <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
 @endif
 <form method="post" action="{{ $style->exists ? '/styles/patch/' . $style->id : '/styles/put' }}">
 @csrf
 <div class="mb-3">
 <label for="style-name" class="form-label">Stila nosaukums</label>
 <input
 value="{{ old('name', $style->name) }}"
 type="text" 
 class="form-control @error('name') is-invalid @enderror"
 id="style-name"
 name="name">
 @error('name')
 <p class="invalid-feedback">{{ $errors->first('name') }}</p>
 @enderror
 </div>
 <button type="submit" class="btn btn-primary">Pievienot</button>
 </form>
@endsection