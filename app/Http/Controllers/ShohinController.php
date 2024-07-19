<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shohin;
use App\Http\Requests\ShohinRequest;
use Illuminate\Support\Facades\DB;

class ShohinController extends Controller
{
    public function showList() {
        $model = new Shohin();
        $shohins = $model->getList();
        
        return view('list', ['shohins' => $shohins]);
    }

    public function showRegistForm() {
        return view('regist');
    }
    
    // 詳細ボタン押下時
    public function shosai($id) {
        $shohin = Shohin::find($id);
        return view('shosai', compact('shohin'))
            ->with('shohin', $shohin);
    }

    // 編集ボタン押下時
    public function edit($id) {
        $shohin = Shohin::find($id);
        return view('edit', compact('shohin'))
            ->with('shohin', $shohin);
    }


    // 新規登録
    public function registSubmit(ShohinRequest $request) {
         
        //①画像ファイルの取得
	    $image = $request->file('image');
	
        //②画像ファイルのファイル名を取得
        $file_name = $image->getClientOriginalName();
        
        //③storage/app/public/imagesフォルダ内に、取得したファイル名で保存
        $image->storeAs('public/images', $file_name);
        
        //④データベース登録用に、ファイルパスを作成
        $image_path = 'storage/images/' . $file_name;

        $model = new Shohin();
        
        // トランザクション開始
        DB::beginTransaction();
        
        try {
            // 登録処理呼び出し
            $model->registShohin($request, $image_path);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらregistにリダイレクト
        return redirect(route('regist'));
    }


        // 更新
        public function update($id, ShohinRequest $request) {
            $shohin = Shohin::find($id);
    
            $image = $request->file('image');
    
            $file_name = $image->getClientOriginalName();

            $image->storeAs('public/images', $file_name);

            $image_path = 'storage/images/' . $file_name;
    
    
            shohin::where('id', $id)->update([
    
            'name' => $request->name,
            'image_file' => $image_path,
            'price' => $request->price,
            'stocks' => $request->stocks,
            'makername' => $request->makername,
            'comment' => $request->comment
            
        ]);
        
            return view('edit', compact('shohin'));
    
        }


    public function destroy(Shohin $shohin) {
        $shohin->delete();
        return redirect()->route('list');
            // ->with('success','削除しました');
    }

    // 検索機能

        public function search(Request $request) {

            $keyword = $request->input('keyword');
            
            $model = new Shohin();
            
            $shohins = $model->SearchList($keyword);
            
            return view('list', compact('shohins'));

        }

}