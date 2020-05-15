@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="flex-row space-between align-items-center">
                        <div>
                            Льготные лекарства
                        </div>
                        @if(!Auth::guest())
                            <a href="/medicament/create" class="btn btn-link">+ Создать</a>
                        @endif
                    </div>
                </div>

                <div class="panel-heading">
                    <form action="/">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Категория лекарства</label>
                                <select class="form-control" name="category_id">
                                    <option @if(Request()->category_id == '')) selected @endif value={{ null }}>Все</option>
                                    @foreach ($categories as $category)
                                        <option 
                                            value="{{ $category->id }}"
                                            @if(Request()->category_id == $category->id) selected @endif
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Категория льготника</label>
                                <select class="form-control" name="exempt_id">
                                    <option @if(Request()->exempt_id == '')) selected @endif value={{ null }}>Все</option>
                                    @foreach ($exempts as $exempt)
                                        <option 
                                            value="{{ $exempt->id }}"
                                            @if(Request()->exempt_id == $exempt->id) selected @endif
                                        >
                                            {{ $exempt->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label>Форма выпуска</label>
                                <select class="form-control" name="release_id">
                                    <option @if(Request()->release_id == '')) selected @endif value={{ null }}>Все</option>
                                    @foreach ($releases as $release)
                                        <option 
                                            value="{{ $release->id }}"
                                            @if(Request()->release_id == $release->id) selected @endif
                                        >
                                            {{ $release->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-7">
                                <label>Поиск</label>
                                <input class="form-control" placeholder="Введите причину обращения" name="search" @if(isset($_GET['search'])) value="{{ $_GET['search'] }}" @endif>
                            </div>
                        </div>
                        <div style="margin-top: 15px">
                            <button class="btn btn-primary" type="submit">Искать</button>
                        </div>
                    </form>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Льготник</th>
                        <th scope="col">Форма выпуска</th>
                        @if(!Auth::guest())
                            <th scope="col"></th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medicaments as $medicament)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $medicament->name }}</td>
                                <td>{{ $medicament->category->name }}</td>
                                <td>{{ $medicament->exempt->name }}</td>
                                <td>{{ $medicament->release->name }}</td>
                                @if(!Auth::guest())
                                    <td>
                                        <span style="float: right">
                                            <a href="/medicament/{{ $medicament->id }}/edit">Редактировать</a>
                                        </span>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Не найдено медикаментов</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
