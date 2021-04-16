@extends('layouts')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('App\Http\Controllers\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="user">ユーザー名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="user" value="{{ $profile->user }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="photo">写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="photo">
                            <div class="form-text text-info">
                                設定中: {{ $profile->photo_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="age">年齢</label>
                        <div class="col-md-10">
                            <select name="age">
                                {{ $profile->age }}
                                <option value="secret">ないしょ♪</option>
                                <option value="10s">10代</option>
                                <option value="20s">20代</option>
                                <option value="30s">30代</option>
                                <option value="40s">40代</option>
                                <option value="50s">50代</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection




                        
                