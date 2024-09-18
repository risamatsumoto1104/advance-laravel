<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{   
    //データ一覧ページの表示
    public function index(){
        //$items = Book::all();
        $items = Book::with('author')->get();
        return view('book.index', ['items' => $items]);
    }

    //データ追加用ページの表示
    public function add(){
        return view('book.add');
    }

    //データ追加機能
    public function create(Request $request){
        $this->validate($request, Book::$rules);
        $form = $request->all();
        Book::create($form);
        return redirect('/book');
    }
}


