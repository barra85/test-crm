@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>

                        @php ($i = 1)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td><a href="/login/{{$user->id}}">Login as this Sales Manager</a></td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Routes</div>

                <div class="card-body">
                    <pre>{{file_get_contents(base_path('routes/web.php'))}}</pre>
                </div>
            </div>
        </div>
    </div>

    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Controller</div>
                <div class="card-body">
                <pre>{{file_get_contents(app_path('Http/Controllers/UserController.php'))}}</pre>
                </div>
            </div>
        </div>
    </div>

    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Model</div>
                <div class="card-body">
                <pre>{{file_get_contents(app_path('User.php'))}}</pre>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
