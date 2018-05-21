@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                       <table>
                           <tr>
                               <th>Name</th>
                               <td>{{$user->name}}</td>
                           </tr>
                           <tr>
                               <th>E-mail</th>
                               <td>{{$user->email}}</td>
                           </tr>

                           @if($user->is('account_manager'))
                               <tr>
                                   <th>Sales Manager</th>
                                   <td>{{$user->sales_manager->name}}</td>
                               </tr>
                           @endif
                       </table>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        @if($user->is('sales_manager'))

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Account Managers</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>

                            @php($i = 1)
                            @foreach($user->account_managers as $account_manager)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$account_manager->name}}</td>
                                    <td>{{$account_manager->country->name}}</td>
                                    <td><a href="/login/{{$account_manager->id}}">Login as this Account Manager</a></td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if($user->is('account_manager'))
        <br />
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Shops</div>

                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Vistor Address</th>
                                    <th>Invoice Address</th>
                                </tr>

                                @php($i = 1)
                                @foreach($user->shops as $shop)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$shop->name}}</td>
                                        <td>
                                            {{$shop->visitor_street}}
                                            {{$shop->visitor_house_number}}
                                            <br />
                                            {{$shop->visitor_zip}}
                                            {{$shop->visitor_place}},
                                            {{$shop->visitor_country->name}}
                                        </td>

                                        <td>
                                            {{$shop->invoice_street}}
                                            {{$shop->invoice_house_number}}
                                            <br />
                                            {{$shop->invoice_zip}}
                                            {{$shop->invoice_place}},
                                            {{$shop->invoice_country->name}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    @endif

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
