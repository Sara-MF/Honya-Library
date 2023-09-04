@extends('master')

@section('content')
<div class="content">
    <div class="header-content">
        <h3>Update book</h3>
    </div>

    @if (count($errors) > 0 && $errors->has('error'))
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="body-content">
        <a href="{{ route('list') }}"><button class="button col-md-2">Back to list</button></a>

        <div class="create-form">

            <form action="{{ route('update-book', ['id' => $book->id]) }}" method="post">

                @csrf
                @method('PUT')

                <div class="row form-group">

                    <div class="col-md-6">
                        <label>Title</label>
                        <input id="title" name="title" class="form-control" type="text" value="{{ $book->title }}" required>
                    </div>

                    <div class="col-md-6">
                        <label>Author</label>
                        <input id="author" name="author" class="form-control" type="text" value="{{ $book->author }}" required>
                    </div>

                </div>

                <div class="form-group">

                    <label>Description</label>
                    <textarea id="description" name="description" class="form-control">{{ $book->description }}</textarea>

                </div>


                <div class="row form-group">

                    <div class="col-md-6">
                        <label>Release Year</label>
                        <select name="release_year" id="release_year" class="form-control">
                            <option value="0">Don't know the year</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ $book->release_year == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Rented</label>
                        <select id="rented_status" name="rented_status" class="form-control" required>
                            <option value="0" {{ $book->rented == false ? 'selected' : '' }}>No</option>
                            <option value="1" {{ $book->rented == true ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                
                </div>

                <div style="text-align: center;">
                    <button class="button button-form col-md-2 col-sm-12" type="submit">Update</button>
                </div>

            </form>

        </div>
    </div>
</div

@endsection