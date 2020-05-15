@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="flex-row space-between align-items-center">
                        <div>
                            Формы выпуска
                        </div>
                        <a href="/release/create" class="btn btn-link">+ Создать</a>
                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($releases as $release)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $release->name }}</td>
                                <td>
                                    <span style="float: right">
                                        <a href="/release/{{ $release->id }}/edit">Редактировать</a>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Форм выпуска не найдено</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
