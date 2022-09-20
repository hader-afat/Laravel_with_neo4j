@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div class="card">
                <div class="card-header">
                    <h4>
                        Student Data
                        <a type="button" class="btn btn-primary float-end"
                            href="{{ route('student.create') }}">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td> {{ $student['id'] }} </td>
                                    <td> {{ $student['name'] }} </td>
                                    <td> {{ $student['age'] }} </td>
                                    <td> {{ $student['email'] }} </td>
                                    <td> {{ $student['phone'] }} </td>

                                    <td>
                                        <form action="{{ route('student.edit',$student['id']) }}"
                                            method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                            Edit</button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="{{ route('student.delete',$student['id']) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"href ="/#">Delete</button>
                                        </form>
                                    </td>
                                    {{-- <td><a href ="/#">Delete</a></td> --}}
                                    {{-- <td> {{ $student['email'] }} </td>
                                    <td> {{ $student['phone'] }} </td> --}}
                                    {{-- <td><a href ="{{ route('student.edit',$student['id']) }}">Edit</a></td> --}}
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- @section('scripts')

<script> --}}
    {{-- // $(document).ready(function () {

    //     fetchstudent();

    //     function fetchstudent() {
    //         $.ajax({
    //             type: "GET",
    //             url: "/api/all",
    //             dataType: "json",
    //             success: function (response) {
    //                 console.log(response);
    //                 // console.log(response.data[0].name);
    //                 $('tbody').html("");
    //                 $.each(response.data, function (key, item) {
    //                     $('tbody').append('<tr>\
    //                         <td>' + item.id + '</td>\
    //                         <td>' + item.name + '</td>\
    //                         <td>' + item.age + '</td>\
    //                         <td>' + item.email + '</td>\
    //                         <td>' + item.phone + '</td>\
    //                         <td><a href ="{{ route('student.edit','+{item.id}+') }}">Edit</a></td>\
    //                         <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
    //                     \</tr>');
    //                 });
    //             }
    //         });
    //     }

    // }); --}}

{{-- </script> --}}

{{-- @endsection --}}