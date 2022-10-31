@extends('layouts.app')

@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="d-flex justify-content-center bg-light border border-2">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Criar anotação
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route ('create.note') }}" method="post">
          @csrf
      <div class="modal-body">
        <label>Título:</label>
        <input class="form-control" type="text" name="title">
        <label>Conteúdo:</label>
        <textarea class="form-control" name="content" cols="30" rows="10"></textarea>
        <label>Cor:</label>
        <input class="form-control" type="color" name="color">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">
            Criar</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="d-flex flex-wrap justify-content-around gap-2">
    @forelse($notes as $note)
        <div class="border border-2 shadow p-3" style="background-color: {{$note->color}};">
            <div class="card-header">{{ $note->title}}</div>
            <div class="card-body"> {{ $note->content}}</div>
    @empty
        <div class="alert alert-danger">
            Nenhuma anotação cadastrada!
        </div>
    @endforelse
    </div>
@endsection
