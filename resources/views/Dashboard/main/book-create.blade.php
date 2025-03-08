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
                        <li class="breadcrumb-item active">Book Form</li>
                    </ol>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('books.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="book_id">Books ID <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="book_id" name="book_id" value="{{ old('book_id', uniqid('BOOK_')) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Books Name <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter book name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="writer">Book Writer <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" id="writer" name="writer" rows="3" placeholder="Enter writer name" required>{{ old('writer') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="type">Type <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="">Please select</option>
                                                <option value="Horror" {{ old('type') == 'Horror' ? 'selected' : '' }}>Horror</option>
                                                <option value="Fantasy" {{ old('type') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                                                <option value="Fairy Tales" {{ old('type') == 'Fairy Tales' ? 'selected' : '' }}>Fairy Tales</option>
                                                <option value="Drama" {{ old('type') == 'Drama' ? 'selected' : '' }}>Drama</option>
                                                <option value="Fable" {{ old('type') == 'Fable' ? 'selected' : '' }}>Fable</option>
                                                <option value="Romance" {{ old('type') == 'Romance' ? 'selected' : '' }}>Romance</option>
                                                <option value="Short Story" {{ old('type') == 'Short Story' ? 'selected' : '' }}>Short Story</option>
                                                <option value="Suspense and Thriller" {{ old('type') == 'Suspense and Thriller' ? 'selected' : '' }}>Suspense and Thriller</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6 offset-lg-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
