<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blogCategory;
use App\Models\blogs;
use App\Models\category;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index()
    {
        $blogs = blogs::all();
        return view('dashboard.blog.list', compact('blogs'));
    }

    public function add()
    {
        $cats = blogCategory::all();
        return view('dashboard.blog.form', compact('cats'));

    }

    public function edit(int $id)
    {

        $blog = blogs::find($id);
        $cats = blogCategory::all();
        return view('dashboard.blog.form', compact('blog', 'cats'));
    }

    public function save(Request $request, int $id)
    {
//        dd($request->cats);
        $valRules = [
            'title' => 'required',
            'seen' => 'numeric',

        ];
        $valMassage = [
            'title.required' => 'ورود عنوان الزامیست',
            'seen.numeric' => 'تعداد بازدید باید عدد باشد ',

        ];
        if ($request->hasFile('image')) {
            $valRules['image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            $valMassage['image.image'] = 'فرمت عکس ارسالی درست نیست';
            $valMassage['image.mimes'] = 'فرمت عکس ارسالی درست نیست';
            $valMassage['image.max'] = 'حجم عکس ارسالی زیاد است (حداکثر 2 مگابایت)';
        }


        $this->validate($request, $valRules, $valMassage);

        if ($id == -1) {
            $blog = blogs::create([
                'title' => $request->title,
                'text' => $request->text,
                'seen' => $request->seen,
            ]);
        } else {
            $blog = blogs::find($id);
            $blog->update([
                'title' => $request->title,
                'text' => $request->text,
                'seen' => $request->seen,
            ]);
        }
        if ($request->has('cats') && count($request->cats) > 0 )
//            $blog->Category()->sync([$request->cats]);
        if ($request->files->count() > 0) {
            $blog->image = $request->file('image')->getClientOriginalName();
            $blog->save();
            $request->file('image')->move(storage_path('app/public/images/blog/' . $blog->id . '/'), $request->file('image')->getClientOriginalName());
        }


return redirect()->route('dashboard.blog.list')->with(['msg' => 'عملیات با موفیت انجام شد']);
    }

    public function delete(int $id)
    {
        blogs::destroy($id);
        return redirect()->route('dashboard.blog.list')->with(['msg' => 'عملیات با موفیت انجام شد']);

    }

    public function catIndex()
    {
        $cats = blogCategory::all();
        return view('dashboard.blog.category.list', compact('cats'));
    }

    public function catAdd()
    {
        return view('dashboard.blog.category.form');
    }

    public function catEdit(int $id)
    {
        $category = blogCategory::find($id);
        return view('dashboard.blog.category.form', compact('category'));

    }

    public function catSave(Request $request, int $id)
    {
        $valRules = [
            'name' => 'required',

        ];
        $valMassage = [
            'name.required' => 'ورود عنوان الزامیست',

        ];


        $this->validate($request, $valRules, $valMassage);
        if ($id == -1) {
            blogCategory::create($request->all());
        } else {
            $item = blogCategory::find($id);
            $item->update($request->all());
        }
        return redirect()->route('dashboard.blog.category.list')->with(['msg' => 'عملیات با موفیت انجام شد']);

    }

    public function catDelete(int $id)
    {
        blogCategory::destroy($id);
        return redirect()->back();
    }
}

