<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\News;

class NewsController extends Controller
{
    public function add() {
         return view('admin.news.create');
    }
     public function create(Request $request)
  {
      // admin/news/createにリダイレクトする
      return redirect('admin/news/create');
  }  
}
