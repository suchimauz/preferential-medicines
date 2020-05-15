@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="/exempt/{{ $exempt->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field("PUT") }}
                            @include('exempt.components.fields')
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection