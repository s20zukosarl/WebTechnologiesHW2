@extends('layout')
@section('content')
 <h1>{{ $title }}</h1>
 @if (count($items) > 0)
 <table class="table table-striped table-hover table-sm">
 <thead class="thead-light">
 <tr>
 <th>ID</td>
<th>Nosaukums</td>
<th>&nbsp;</td>
 </tr>
 </thead>
 <tbody>
 @foreach($items as $style)
 <tr>
 <td>{{ $style->id }}</td>
 <td>{{ $style->name }}</td>
 <td>
 <a href="/styles/update/{{ $style->id }}" class="btn btn-outline-primary btn-sm">Labot</a>
 <form action="/styles/delete/{{ $style->id }}" method="post" class="d-inline deletion-form">
 @csrf
 <button type="submit" class="btn btn-outline-danger btn-sm">Dzēst</button>
</form>
</td>
 </tr>
 @endforeach
 </tbody>
 </table>
 @else
 <p>Nav atrasts neviens ieraksts</p>
 @endif
 <a href="/styles/create" class="btn btn-primary">Izveidot jaunu</a>
@endsection