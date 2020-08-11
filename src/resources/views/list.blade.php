@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <p>Listesiden!</p>

                    <form method="POST" action="{{ (isset($listItem) ? route('yourlist.update_complete', ['id' => $listItem->id]) : route('yourlist.create')) }}">
                        @csrf
                        @if (isset($listItem))
                            @method('patch')
                        @endif
                        <table>
                            <tr>
                                <td>Title: </td>
                                <td>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ (isset($listItem) && old('title') === null ? $listItem->title : old('title')) }}" required autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Content: </td>
                                <td>
                                    <textarea id="title" class="form-control @error('content') is-invalid @enderror" name="content" required>{{ (isset($listItem) && old('content') === null ? $listItem->content : old('content')) }}</textarea>

                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">
                                        @if (isset($listItem))
                                            Save
                                        @else
                                            Create
                                        @endif
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>

                    <br><br>

                    <table class="table">
                        <thead>
                            <tr>
                                <td><strong>#</strong></td>
                                <td><strong>Title</strong></td>
                                <td><strong>Created</strong></td>
                                <td><strong>Updated</strong></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>

                            @if (auth()->user()->listitems()->exists())
                                @foreach (auth()->user()->listitems()->get() as $listItem)
                                    <tr>
                                        <td>{{ $listItem->id }}</td>
                                        <td>{{ $listItem->title }}</td>
                                        <td>{{ $listItem->created_at }}</td>
                                        <td>{{ $listItem->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('yourlist.update_show', ['id' => $listItem->id]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="your-list/{{ $listItem->id }}" onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();">
                                                <i class="far fa-trash-alt"></i>
                                            </a>

                                            <form id="delete-form" action="{{ route('yourlist.delete', ['id' => $listItem->id]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center"><i>No listitems found</i></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
