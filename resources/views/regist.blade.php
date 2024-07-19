@extends('layouts.app')

@section('title', '新規登録')

@section('content')

<h1 class="info2">商品新規登録画面</h1>
<br>
<div class="container" id="product">
    <div class="col-md-8">

<form action="{{ route('submit') }}" method="post"  enctype='multipart/form-data'>
    @csrf

            <div class="form-group">
                <label for="name">商品名<span>*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
            </div>
            <br>
            <div class="form-group">
                <label for="makername">メーカー名<span>*</span></label>
                <select name="makername" id="makername" value="{{ old('makername') }}">
                    <option value=""></option>
                    <option value="Coca-Cola">Coca-Cola</option>
                    <option value="サントリー">サントリー</option>
                    <option value="キリン">キリン</option>
                </select>
                @if($errors->has('makername'))
                        <p>{{ $errors->first('makername') }}</p>
                    @endif
            </div>
            <br>
            <div class="form-group">
                <label for="price">価格<span>*</span></label>
                <input type="text" id="price" name="price" value="{{ old('price') }}">
                @if($errors->has('price'))
                        <p>{{ $errors->first('price') }}</p>
                    @endif
            </div>
                <br>
                <div class="form-group">
                    <label for="stocks">在庫数<span>*</span></label>
                    <input type="text" id="stocks" name="stocks" value="{{ old('stocks') }}">
                    @if($errors->has('stocks'))
                        <p>{{ $errors->first('stocks') }}</p>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea id="coment" name="comment" value="{{ old('coment') }}" rows="2"></textarea>
                    @if($errors->has('comment'))
                        <p>{{ $errors->first('comment') }}</p>
                    @endif
                </div>
                <br>

                <div class="form-group">
                    商品画像
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

            <br><br>
           
            <button type="submit" class="btn btn-warning" id="new">新規登録</button>
            
        </from>
        <a href="#" onclick="history.back()" class="btn btn-primary" id="back">戻る</a>

    </div>
</div>

    @endsection
