@extends('layouts.app')

@section('title', '商品画面一覧')

@section('content')


<div class="container">
     <h1 style="font-size:1.25rem;" >商品画像一覧</h1>
</div>

<form action="{{ route('search') }}" method="GET">
    @csrf
    <!-- 商品名検索 -->
    <div class="search_name" style="margin-left:20px;">
        <input type="text" name="keyword" placeholder="検索キーワード">

    <!-- メーカー名検索 -->
        <input type="text" name="sort" list="maker" placeholder="メーカー名">
        <datalist id="maker">
        <option value="Coka-cola"></option>
        <option value="サントリー"></option>
        <option value="キリン"></option>
        </datalist>
        
        <input type="submit" value="検索">
    </div>

</form>

<div class="links">
  <table class="table table-striped">
     <thead>
        <tr style="text-align:center">
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー</th>
            <th></th>
            <th><a href="{{ route('regist') }}" class="btn btn-warning">新規登録</a></th>
        </tr>
    </thead>
     <tbody>
    @foreach ($shohins as $shohin)
        <tr style="text-align:center; vertical-align:middle;">
            <td style="text-align:center">{{ $shohin->id }}</td>
            
            <td><img src="{{ asset($shohin->image_file) }}" width="100px"></td>

            <td style="text-align:center">{{ $shohin->name }}</td>
            <td style="text-align:center">{{ $shohin->price }}</td>
            <td style="text-align:center">{{ $shohin->stocks }}</td>
            <td style="text-align:center">{{ $shohin->makername }}</td>
            <td style="text-align:center;">
                <a class="btn btn-primary" href="{{ route('shosai' , $shohin->id) }}">詳細</a>
            </td>
            <td style="text-align:center;">
                <form action="{{ route('destroy', $shohin->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか？")'>
                        削除
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
  
@endsection
