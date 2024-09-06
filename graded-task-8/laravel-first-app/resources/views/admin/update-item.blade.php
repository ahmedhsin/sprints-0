@extends('layout')
@section('title','Update')
@section('content')
    <div class="contact_us">
        <div class="container">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
            @if(session('success'))
                <p class="alert alert-success">{{session('success')}}</p>
            @endif
            <form method="post" action="{{route('update_item')}}?model={{$model}}">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                @foreach($cols as $col)
                    <div class="mb-3">
                        <label>{{$col['name']}}</label>
                        <input type="{{$col['type']}}" class="form-control" name="{{$col['name']}}" value="{{$item[$col['name']]}}" {{isset($col['attributes']) ? implode(' ', $col['attributes']) : ''}}>
                        @error($col['name'])
                        there is error in {{$col['name']}}
                        @enderror
                    </div>
                @endforeach
                <input type="submit" class="btn btn-success">
            </form>
        </div>
    </div>

@endsection
