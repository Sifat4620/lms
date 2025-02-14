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
                                <form class="form-valide" action="#" method="post">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Books ID <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Books ID Auto Replace..">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-email">Books Name <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Your Valid Book Name..">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-suggestions">Book Writer <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="About Your Book Writer"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Type <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="val-skill" name="val-skill">
                                                <option value="">Please select</option>
                                                <option value="html">Horror</option>
                                                <option value="css">Fantasy</option>
                                                <option value="javascript">Fairy tales, fables, and folk tales</option>
                                                <option value="angular">Drama</option>
                                                <option value="angular">Fable</option>
                                                <option value="vuejs">Romance</option>
                                                <option value="ruby">Short Story</option>
                                                <option value="php">Suspense and Thriller</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6 offset-lg-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

