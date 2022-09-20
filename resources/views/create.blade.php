@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Add this Student
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label >Name</label>
                            <input name="name" type="text" class="form-control"  placeholder="Enter name">
                            <small class="form-text text-muted">please enter student name</small>
                        </div>
                        <div class="form-group">
                            <label >Age</label>
                            <input name="age" type="number" class="form-control" placeholder="Enter Age">
                            <small class="form-text text-muted">max student age is 20</small>
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter Email">
                            {{-- <small class="form-text text-muted">max student age is 20</small> --}}
                        </div>
                        <div class="form-group">
                            <label >Phone</label>
                            <input name="phone" type="number" class="form-control" placeholder="Enter Phone Number">
                            {{-- <small class="form-text text-muted">max student age is 20</small> --}}
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <p>{{ dd($student) }}</p> --}}
{{-- <p>{{ dd($student[0]['name']) }}</p> --}}
{{-- <p>{{ dd($student[0]['age']) }}</p> --}}

@endsection