@extends('layouts.app')

@section('title', '編集')

@section('content')

<style>

    label {
    display: inline-block;
    width: 150px;
    vertical-align: top;
}

    span {
    color:red;
    font-weight:600;
    }

    #back {
     margin-left:30px;  
    }
        
</style>

<h1 style="font-size:1.75rem; text-align:center">商品情報編集画面</h1>
<br>
<div style="border:1px solid black" class="container">
        <div class="col-md-8">

<form action="{{ route('update' , $shohin->id) }}" method="post"  enctype='multipart/form-data'>
    @method('put')

    @csrf
            <div class="form-group">
                <label for="id">ID</label>
                {{ $shohin->id }}
            </div>
            <br>
            <div class="form-group">
                <label for="name">商品名<span>*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                        <p style="color:red;">{{ $errors->first('name') }}</p>
                    @endif
            </div>
            <br>
            <div class="form-group">
                <label for="makername">メーカー名<span>*</span></label>
                <select name="makername" id="makername" name="makername" value="{{ old('makername') }}">
                    <option value=""></option>
                    <option value="Coca-Cola">Coca-Cola</option>
                    <option value="サントリー">サントリー</option>
                    <option value="キリン">キリン</option>
                </select>
                @if($errors->has('makername'))
                        <p style="color:red;">{{ $errors->first('makername') }}</p>
                    @endif
            </div>
            <br>
            <div class="form-group">
                <label for="price">価格<span>*</span></label>
                <input type="text" id="price" name="price" value="{{ old('price') }}">
                @if($errors->has('price'))
                        <p style="color:red;">{{ $errors->first('price') }}</p>
                    @endif
            </div>
                <br>
                <div class="form-group">
                    <label for="stocks">在庫数<span>*</span></label>
                    <input type="text" id="stocks" name="stocks" value="{{ old('stocks') }}">
                    @if($errors->has('stocks'))
                        <p style="color:red;">{{ $errors->first('stocks') }}</p>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea id="coment" name="comment" value="{{ old('coment') }}" rows="2"></textarea>
                    @if($errors->has('comment'))
                        <p style="color:red;">{{ $errors->first('comment') }}</p>
                    @endif
                </div>
                <br>

                <div class="form-group">
                    商品画像
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <br><br>
           
            <button type="submit" class="btn btn-warning">更新</button>
            
        </from>
        <a href="#" onclick="history.back()" class="btn btn-primary" id="back">戻る</a>

    </div>
</div>

    @endsection