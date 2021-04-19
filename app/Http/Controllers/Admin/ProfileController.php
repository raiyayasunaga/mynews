<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }


    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        return redirect('admin/profile/edit');
    }
     public function create(Request $request)
    {
        
      // 以下を追記
      // Varidationを行う
      $this->validate($request, News::$rules);
      $news = new News;
      $form = $request->all();

      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }
      unset($form['_token']);
      unset($form['image']);
      $news->fill($form);
      $news->save();
      
      return redirect('admin/news/create');
     }  
}
