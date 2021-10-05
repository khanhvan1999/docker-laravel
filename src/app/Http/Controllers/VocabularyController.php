<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VocabularyController extends Controller
{
    public function getlist(){
        $voca = Vocabulary::all();
        return view('list',['voca'=>$voca]);
    }

    public function getadd(){
        return view('add');
    }

    public function postadd(Request $request){
        $voca = new Vocabulary;
        $voca->english = $request->english;
        $voca->type = $request->type;
        $voca->vietnamese = $request->vietnamese;
        $voca->example = $request->example;
        if($request->hasFile('image')){
            $file = $request->file('image');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif'){
                return redirect('vocabulary/list')->with('loi','Bạn chỉ được chọn file có đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/vocabulary/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/vocabulary",$hinh);
            $voca->image = $hinh;
        }
        else{
            $voca->image = "";
        }

        $voca->save();
        return redirect('vocabulary/list')->with('thongbao','Bạn đã thêm từ thành công');
    }

    public function getedit($id){
        $voca = Vocabulary::find($id);
        return view('edit',['voca'=>$voca]);
    }

    public function postedit(Request $request, $id){
        $voca = Vocabulary::find($id);
        $voca->english = $request->english;
        $voca->type = $request->type;
        $voca->vietnamese = $request->vietnamese;
        $voca->example = $request->example;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('vocabulary/add')->with('loi','Bạn chỉ được chọn file có đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/vocabulary/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/vocabulary",$hinh);
            $voca->image = $hinh;
        }
        else{
            //$voca->image = $voca->image;
        }
        $voca->save();
        return redirect('vocabulary/edit/'.$voca->id)->with('thongbao','Bạn đã chỉnh sửa từ thành công');
    }

    public function getdelete($id){
        $voca = Vocabulary::find($id);
        $voca->delete();
        return redirect('vocabulary/list')->with('thongbao','Bạn đã xóa từ '.$voca->english.' thành công');
    }
}

