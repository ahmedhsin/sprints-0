@extends('layout')
@section('title','Admin | '.$model)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 list-group">
            <h3>DashBoard</h3>
            <div class="">
                <a href="/dashboard?model=users">Users</a>
                <a href="/dashboard?model=contacts">Contacts</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="container">
                <h1 class="my-4">All {{$model}}</h1>
                <table class="table table-bordered table-striped text-center">
                    <thead class="thead-dark">
                    <tr>
                        @foreach($cols as $col)
                            <th>{{$col}}</th>
                        @endforeach
                        <th>Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($data->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">No data found.</td>
                        </tr>
                    @else
                        @foreach ($data as $row)
                            <tr>

                                @foreach ($cols as $col)
                                    <td>
                                        @if($col == 'image')
                                            @if(isset($row['image']))
                                                <img src="{{ asset('images/'.$row['image']->name) }}" alt="">
                                            @else
                                                <img src="{{ asset('images/default.png') }}" alt="">
                                            @endif
                                        @else
                                            {{$row[$col]}}
                                        @endif
                                    </td>

                                @endforeach
                                <td><a href="dashboard/update?model={{$model}}&id={{$row['id']}}" class="btn btn-primary">Edit</a>
                                    <a href="/delete?model_name={{$model}}&id={{$row['id']}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
