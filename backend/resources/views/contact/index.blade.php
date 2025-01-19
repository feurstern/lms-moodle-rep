@extends('mainlayout')
@section('content')
    <section>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <form method="POST" action="{{ route('blog.create') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">title</label>
                                <input type="text" class="form-control" id="" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">category</label>
                                <input type="text" class="form-control" id="" name="category">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Content</label>
                                <input type="text" class="form-control" id="" name="content">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">creator_9d</label>
                               <input type="text" name="creator_id" id="">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection;