@extends('Dashboard.main.master')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row page-titles">
                <div class="col p-0">
                    <h4>Hello, <span>Welcome here</span></h4>
                </div>
                <div class="col p-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                        <li class="breadcrumb-item active">{{ isset($book) ? 'Edit Book' : 'Create Book' }}</li>
                    </ol>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <!-- Dynamic form action -->
                                <form action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}" method="POST">
                                    @csrf
                                    @if(isset($book))
                                        @method('PUT') <!-- For updating an existing book -->
                                    @endif

                                    <!-- Book ID -->
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="book_id">Books ID <span class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control @error('book_id') is-invalid @enderror" 
                                                   id="book_id" name="book_id" value="{{ old('book_id', $book->book_id ?? uniqid('BOOK_')) }}" readonly>
                                            @error('book_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Book Name -->
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Books Name <span class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                   id="name" name="name" placeholder="Enter book name" 
                                                   value="{{ old('name', $book->name ?? '') }}" required autofocus>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Writer -->
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="writer">Book Writer <span class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control @error('writer') is-invalid @enderror" 
                                                      id="writer" name="writer" rows="3" 
                                                      placeholder="Enter writer name" required>{{ old('writer', $book->writer ?? '') }}</textarea>
                                            @error('writer')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Book Type -->
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="type">Type <span class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                                <option value="">Please select</option>
                                                <option value="Horror" {{ old('type', $book->type ?? '') == 'Horror' ? 'selected' : '' }}>Horror</option>
                                                <option value="Fantasy" {{ old('type', $book->type ?? '') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                                                <option value="Fairy Tales" {{ old('type', $book->type ?? '') == 'Fairy Tales' ? 'selected' : '' }}>Fairy Tales</option>
                                                <option value="Drama" {{ old('type', $book->type ?? '') == 'Drama' ? 'selected' : '' }}>Drama</option>
                                                <option value="Fable" {{ old('type', $book->type ?? '') == 'Fable' ? 'selected' : '' }}>Fable</option>
                                                <option value="Romance" {{ old('type', $book->type ?? '') == 'Romance' ? 'selected' : '' }}>Romance</option>
                                                <option value="Short Story" {{ old('type', $book->type ?? '') == 'Short Story' ? 'selected' : '' }}>Short Story</option>
                                                <option value="Suspense and Thriller" {{ old('type', $book->type ?? '') == 'Suspense and Thriller' ? 'selected' : '' }}>Suspense and Thriller</option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group row">
                                        <div class="col-lg-8 offset-lg-4">
                                            <button type="submit" class="btn btn-primary">{{ isset($book) ? 'Update' : 'Create' }} Book</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Display Errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
