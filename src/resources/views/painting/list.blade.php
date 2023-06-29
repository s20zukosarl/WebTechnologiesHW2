@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if (count($items) > 0)
 <table class="table table-sm table-hover table-striped">
 <thead class="thead-light">
 <tr>
 <th>ID</th>
 <th>Nosaukums</th>
 <th>Mākslinieks</th>
 <th>Stils</th>
 <th>Izdošanas gads</th>
 <th>Atrašanās vieta</th>
 <th>Attēlot</th>
 <th>&nbsp;</th>
 </tr>
 </thead>
 <tbody>
 @foreach($items as $painting)
 <tr>
 <td>{{ $painting->id }}</td>
 <td>{{ $painting->name }}</td>
 <td>{{ $painting->artist->name }}</td>
 <td>{{ $painting->style->name }}</td>
 <td>{{ $painting->year }}</td>
 <td>{{ $painting->location }}</td>
 <td>{!! $painting->display ? '&#10004;' : '&#10060;' !!}</td>
<td>
 <a
 href="/paintings/update/{{ $painting->id }}"
 class="btn btn-outline-primary btn-sm"
 >Labot</a> 
 <form
 method="post"
 action="/paintings/delete/{{ $painting->id }}"
 class="d-inline deletion-form"
 >
 @csrf
<button
 type="submit"
 class="btn btn-outline-danger btn-sm"
 >Dzēst</button>
 </form>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
@else
 <p>Nav atrasts neviens ieraksts</p>
@endif
<a href="/paintings/create" class="btn btn-primary">Pievienot jaunu</a>
@endsection