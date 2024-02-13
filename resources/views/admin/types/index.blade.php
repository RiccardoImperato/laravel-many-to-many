@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h2>Tipi di progetto</h2>
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary btn-sm">Nuovo tipo</a>
    </div>
    @if (session('message'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Notifica</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Type</th>
                <th scope="col">Slug</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->title }}</td>
                    <td>{{ $type->slug }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.types.edit', $type) }}"
                                class="btn btn-secondary btn-sm mx-2">Modifica</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-{{ $type->id }}">
                                Elimina
                            </button>

                            <div class="modal fade" id="exampleModal-{{ $type->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler eliminare: {{ $type->title }}?
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Chiudi</button>
                                            <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="Elimina">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
