@extends('mainlayout')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3>Customers</h3>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('movie.create') }}" class="btn"
                                style="background-color: #4643d3; color: white;"><i class="fas fa-plus"></i> Create
                                Customer</a>
                        </div>
                        <div class="col-md-8">
                            <form action="">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search anything..."
                                        aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit"
                                        id="button-addon2">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">

                            <div class="input-group mb-3">
                                <select class="form-select" name="" id="">
                                    <option value="">Newest to Old</option>
                                    <option value="">Old to Newest</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="border: 1px solid #dddddd">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Movie Title</th>
                                <th scope="col">Release Year</th>
                                <th scope="col">Ratings</th>
                                <th scope="col">Description</th>
                                <th scope="col">Movie Length</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Jhone</td>
                                <td>Deo</td>
                                <td>7-7-2000</td>
                                <td>881-6929-0200</td>
                                <td>180</td>
                                <td>
                                    <a href="" style="color: #2c2c2c;" class="ms-1 me-1"><i
                                            class="far fa-edit"></i></a>
                                    <a href="/customer-details.html" style="color: #2c2c2c;" class="ms-1 me-1"><i
                                            class="far fa-eye"></i></a>
                                    <a href="" style="color: #2c2c2c;" class="ms-1 me-1"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>


                            @for ($i = 0; $i < count($data); $i++)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $data[$i]->title }}</td>
                                    <td>{{ $data[$i]->release_year }}</td>
                                    <td>{{ $data[$i]->ratings }}</td>
                                    <td>{{ $data[$i]->description }}</td>
                                    <td>{{ $data[$i]->movie_length }} mins</td>
                                    <td>
                                        <a href="" style="color: #2c2c2c;" class="ms-1 me-1"><i
                                                class="far fa-edit"></i></a>
                                        <a href="/customer-details.html" style="color: #2c2c2c;" class="ms-1 me-1"><i
                                                class="far fa-eye"></i></a>
                                        <a href="" style="color: #2c2c2c;" class="ms-1 me-1"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endfor

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
