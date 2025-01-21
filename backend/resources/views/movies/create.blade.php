@extends('mainlayout')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3>Movie</h3>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('movie.index') }}" class="btn"
                                style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('movie.insert') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image_path" class="form-control">
                                    <input type="hidden" name="user_id" value="11" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Movie Title</label>
                                    <input name="title" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Rating</label>
                                    <input name="ratings" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Release Year</label>
                                    <input type="number" name="release_year" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Genre</label>
                                    <select name="genre_id" class="form-control">
                                        <option value="0" default> choose</option>
                                        @foreach ($genres as $x)
                                            <option value={{ $x->id }}> {{ $x->genre_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Director</label>
                                    <select name="director_id">
                                        <option value="0" default>Choose</option>
                                        @for ($i = 0; $i < count($directors); $i++)
                                            <option value="{{ $directors[$i]->id }}"> {{ $i + 1 }}.
                                                {{ $directors[$i]->first_name }} {{ $directors[$i]->last_name }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Duration</label>
                                    <input type="text" name="duration" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="">description</label>
                                    <textarea class="form-control" name="description"> </textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Create</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
