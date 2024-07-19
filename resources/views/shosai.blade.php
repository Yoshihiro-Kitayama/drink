@extends('layouts.app')

@section('title', '詳細')

@section('content')

<style>
    label {
    display: inline-block;
    width: 150px;
    vertical-align: top;
}

    #back {
        margin-left:30px;  
    }
</style>

<h1 style="font-size:1.75rem; text-align:center">商品情報詳細画面</h1>
<br>
<div style="border:1px solid black" class="container">
        <div class="col-md-8">

            <div class="form-group">
                <label for="id">ID</label>
                {{ $shohin->id }}
            </div>
            <br>
            <div class="form-group">
                <label for="image">商品画像</label>
                <img src="{{ asset($shohin->image_file) }}" width="100px">
            </div>
            <br>
            <div class="form-group">
                <label for="name">商品名</label>
                {{ $shohin->name }}
            </div>
            <br>
            <div class="form-group">
                <label for="makername">メーカー名</label>
                {{ $shohin->makername }}
            </div>
            <br>
            <div class="form-group">
                <label for="price">価格</label>
                {{ $shohin->price }}
            </div>
                <br>
                <div class="form-group">
                    <label for="stocks">在庫数</label>
                    {{ $shohin->stocks }}
                </div>
                <br>
                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea rows="2">{{ $shohin->comment }}</textarea>
                </div>
                <br>
            <br>
            <div>

            <a href="{{ route('edit' , ['id'=>$shohin->id]) }}" class="btn btn-warning" id="edit">編集</a>
            <a href="#" onclick="history.back()" class="btn btn-primary" id="back">戻る</a>
            </div>


    </div>
</div>

    @endsection
