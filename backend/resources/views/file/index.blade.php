@extends('mainlayout')
@section('content')
    <section>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <form method="POST" action="{{ route('file.upload') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" id="" name="name"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">File:</label>
                                <input type="file" class="form-control" id="" name="file_upload">
                              @error('file_upload')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                @foreach ($files as $x)
                    {{-- <a href="{{ asset('uploads') . '/' . $x->file_path }}"> xoxo {{ $x->file_path }} </a> --}}
                    <a href="{{ $x->file_path }}"> xoxo {{ $x->file_path }} </a>
                    <br />
                    <a href="{{ route('download', ['id' => $x->file_path]) }}"> Download</a>
                    <br />
                @endforeach
            </div>
        </div>

    </section>
@endsection
