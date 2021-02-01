@extends('layouts')

@section('title', 'プロフィールの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
            <h2>プロフィール作成</h2>
            <form action="{{ action('App\Http\Controllers\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2">ユーザー名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="user" value="{{ old('user') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">写真</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="photo">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">年齢</label>
                    <div class="col-md-10">
                        <select name="age">
                            <option value="seacret">ないしょ♪</option>
                            <option value="10s">10代</option>
                            <option value="20s">20代</option>
                            <option value="30s">30代</option>
                            <option value="40s">40代</option>
                            <option value="50s">50代</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">自己紹介</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="introduction" rows="10">{{ old('introduction') }}</textarea>
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" valu="作成">
            </form>
            </div>
        </div>
    </div>
@endsection

