@extends('layouts')
@section('title', '日記一覧') 

@section('content')
    <div class="conteiner">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>日記一覧</h2>
            
                <div class="col-md-4 mb-2">
                    <a href="{{ action('App\Http\Controllers\TopController@add') }}" role="button" class="btn btn-primary">新規作成</a>
                </div>
                <div class="col-md-8">
                    <form action="{{ action('App\Http\Controllers\TopController@index') }}" method="get">
                        <div class="form-group row">
                            <label class="col-md-2">日付</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" name="cond_date" value="{{ $cond_date }}">
                            </div>
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
            
                <div class="list-diary col-md-12 mx-auto">
                    <div class="row">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th width="20%">日付</th>
                                    <th width="50%">本文</th>
                                <tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $diary)
                                    <tr>
                                        <th>{{  $diary->date }}</th>
                                        <th>{{ \Str::limit($diary->body, 250 )}}</th>
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
                    