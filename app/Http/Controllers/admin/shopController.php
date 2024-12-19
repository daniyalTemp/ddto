<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\products;
use App\Utility\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Serializer;
use function PHPUnit\Framework\directoryExists;

class shopController extends Controller
{

    public function categoryList(Request $request)
    {
        $cats = category::all();
        return view('dashboard.shop.category.list', compact('cats'));

    }

    public function categoryAdd(Request $request)
    {

        return view('dashboard.shop.category.form');

    }

    public function categoryEdit(Request $request, int $id)
    {
        $category = category::find($id);
        return view('dashboard.shop.category.form', compact('category'));

    }

    public function categorySave(Request $request, int $id)
    {
        $this->validate($request, ['name' => 'required'], ['name.required' => "ورود نام الزامی است "]);

        if ($id == -1) {
            category::create([
                'name' => $request->name
            ]);
        } else {
            $cat = category::find($id);
            $cat->name = $request->name;
            $cat->save();

        }

        return redirect()->route('dashboard.shop.category.list')->with(['msg' => 'عملیات با موفیت انجام شد']);
    }

    public function categoryDel(Request $request, int $id)
    {
        category::destroy([$id]);
        return redirect()->route('dashboard.shop.category.list')->with(['msg' => 'عملیات با موفیت انجام شد']);

    }


    //shop

    public function productLsit(Request $request)
    {
        $products = products::all();
        return view('dashboard.shop.list', compact('products'))->with(['msg' => 'عملیات با موفیت انجام شد']);
    }

    public function productAdd(Request $request)
    {
        $cats = category::all();
//        dd($cats);
        return view('dashboard.shop.form', compact('cats'));
    }

    public function productEdit(Request $request, int $id)
    {
        $cats = category::all();
        $product = products::find($id);
//        dd(($product->color[0]));
        return view('dashboard.shop.form', compact('cats', 'product'));
    }


    public function productSave(Request $request, int $id)
    {
//TODO Check Num Validation

//        dd($request->all());
        $valRules = [
            'name' => 'required',
            'image' => 'required|image',
            'BasePrice' => 'required',
        ];
        $valMassage = [
            'name.required' => 'ورود نام الزامیست',
            'BasePrice.required' => 'ورود قیمت الزامی است',
            'image.required' => 'ارسال عکس الزامی است',
            'image.image' => 'عکس ارسالی معتبر نیست',
        ];

        if ($request->get('BasePrice') != null) {
            $valMassage = ['BasePrice.numeric' => 'قیمت وارد شده صحیح نیست',
            ];
            $valRules = ['BasePrice' => 'numeric',
            ];

        }
        if ($request->get('count') != null) {
            $valMassage = ['count.numeric' => 'موجودی وارد شده صحیح نیست',
            ];
            $valRules = ['count' => 'numeric',
            ];

        }

        $this->validate($request, $valRules, $valMassage);

        if ($id == -1) // new
        {
            $product = products::create([
                'name' => $request->name,
                'available' => (bool)$request->available,
                'discount' => $request->discount ? $request->discount : 0,
                'BasePrice' => $request->BasePrice ? $request->BasePrice : 0,
                'description' => $request->description ? $request->description : 'ندارد',
                'weight' => $request->weight ? $request->weight : '0',
                'color' => [],
                'size' => [],
                'material' => [],

            ]);
            if ($request->has('category') && $request->category != -1)
                $product->Category()->sync([$request->category]);
            if ($request->files->count() > 0) {
                $product->image = $request->file('image')->getClientOriginalName();
                $product->save();
                $request->file('image')->move(storage_path('app/public/images/products/' . $product->id . '/'), $request->file('image')->getClientOriginalName());
            }
            return redirect()->route('dashboard.shop.product.edit', $product->id)->with(['msg' => 'عملیات با موفیت انجام شد']);

        } else {
            $product = products::find($id);
            $product->name = $request->name;
            $product->available = (bool)$request->available;
            $product->discount = $request->discount ? $request->discount : $product->discount;
            $product->BasePrice = $request->BasePrice;
            $product->description = $request->description ? $request->description : $product->description;
            $product->weight = $request->weight ? $request->weight : $product->weight;
//            $path='public/storage/pages/productsDes/';
//            if(!Storage::exists($path)){
//                Storage::makeDirectory($path);
//            }
//
//            $myfile = fopen($path.$product->id."blade.php", "w") ;
//            fwrite($myfile, $product->description);
//            fclose($myfile);
            $product->save();
            if ($request->has('category') && $request->category != -1)
                $product->Category()->sync([$request->category]);
            if ($request->files->count() > 0) {
                $product->image = $request->file('image')->getClientOriginalName();
                $product->save();
                $request->file('image')->move(storage_path('app/public/images/products/' . $product->id . '/'), $request->file('image')->getClientOriginalName());
            }
            return redirect()->route('dashboard.shop.product.list')->with(['msg' => 'عملیات با موفیت انجام شد']);
        }

    }

    public function productSaveExtra(Request $request, int $id, string $type = 'none', int $Eid = -1)
    {
        if ($request->get('discount') != null) {
            $valMassage = ['discount.digits_between' => 'درصد تخفیف صحیح نیست',
            ];
            $valRules = ['discount' => 'digits_between:0,100',
            ];
            $this->validate($request, $valRules, $valMassage);

            $product = products::find($id);
            $product->discount = $request->discount ? $request->discount : $product->discount;
            $product->save();

            return redirect()->route('dashboard.shop.product.list')->with(['msg' => 'عملیات با موفیت انجام شد']);
        } else {
            $valMassage = ['name.required' => 'مقدار نام ویژگی الزامی است ',
            ];
            $valRules = ['name' => 'required',
            ];
//            dd($request->all());
            if ((($request->addition != null) && ($request->percentage != null)) || (($request->addition != null) && ($request->ratio != null)) || (($request->ratio != null) && ($request->percentage != null)) || (($request->ratio == null) && ($request->percentage == null) && ($request->addition == null))) {
                $validator = \Validator::make([], []);

                $validator->errors()->add('percentage', 'لطفا فقط یکی از فیلد های قیمت ویژگی را وارد نمایید');

                throw new \Illuminate\Validation\ValidationException($validator);
            }

            if (($request->addition != null)) {
                $valMassage = ['addition.numeric' => 'مقدار قیمت افزوده ویژگی شما صحیح نیست',
                ];
                $valRules = ['addition' => 'numeric',
                ];
            }

            if (($request->percentage != null)) {
//                $request->percentage=intval($request->percentage);
//                dd($request->percentage);
                $valMassage = ['percentage.digits_between' => 'مقدار درصد قیمت ویژگی شما باید بین 0-100 باشد',
                ];
                $valRules = ['percentage' => 'digits_between:0,100',
                ];

            }
            if (($request->ratio != null)) {
                $valMassage = ['ratio.numeric' => 'مقدار ضریب قیمتی ویژگی شما صحیح نیست',
                ];
                $valRules = ['ratio' => 'numeric',
                ];
            }
//            dd( $this->validate($request, $valRules, $valMassage));
            $this->validate($request, $valRules, $valMassage);
            $product = products::find($id);

            if ($Eid != -1) { // Update Mode
                if ($request->type == 'color') {
                    $color = $product->color;

                    if (($request->addition != null))
                        $color[$Eid] = new ProductAttribute($request->name, $request->addition, 'addition', $request->colorCode);
                    if (($request->percentage != null))
                        $color[$Eid] = new ProductAttribute($request->name, $request->percentage, 'percentage', $request->colorCode);
                    if (($request->ratio != null))
                        $color[$Eid] = new ProductAttribute($request->name, $request->ratio, 'ratio', $request->colorCode);

                    $product->color = $color;

                } elseif ($request->type == 'size') {
                    $size = $product->size;
                    if (($request->addition != null))
                        $size[$Eid] = new ProductAttribute($request->name, $request->addition, 'addition', '-');

                    if (($request->percentage != null))
                        $size[$Eid] = new ProductAttribute($request->name, $request->percentage, 'percentage', '-');


                    if (($request->ratio != null))
                        $size[$Eid] = new ProductAttribute($request->name, $request->ratio, 'ratio', '-');

                    $product->size = $size;

                } elseif ($request->type == 'material') {
                    $material = $product->material;
                    if (($request->addition != null))
                        $material[$Eid] = new ProductAttribute($request->name, $request->addition, 'addition', '-');

                    if (($request->percentage != null))
                        $material[$Eid] = new ProductAttribute($request->name, $request->percentage, 'percentage', '-');


                    if (($request->ratio != null))
                        $material[$Eid] = new ProductAttribute($request->name, $request->ratio, 'ratio', '-');

                    $product->material = $material;


                }

            } else {//add Mode
                if ($request->type == 'color') {
                    $color = $product->color;

                    if (($request->addition != null))
                        array_push($color, new ProductAttribute($request->name, $request->addition, 'addition', $request->colorCode));

                    if (($request->percentage != null))
                        array_push($color, new ProductAttribute($request->name, $request->percentage, 'percentage', $request->colorCode));


                    if (($request->ratio != null))
                        array_push($color, new ProductAttribute($request->name, $request->ratio, 'ratio', $request->colorCode));

                    $product->color = $color;

                } elseif ($request->type == 'size') {
                    $size = $product->size;
                    if (($request->addition != null))
                        array_push($size, new ProductAttribute($request->name, $request->addition, 'addition'));

                    if (($request->percentage != null))
                        array_push($size, new ProductAttribute($request->name, $request->percentage, 'percentage'));


                    if (($request->ratio != null))
                        array_push($size, new ProductAttribute($request->name, $request->ratio, 'ratio'));

                    $product->size = $size;

                } elseif ($request->type == 'material') {
                    $material = $product->material;
                    if (($request->addition != null))
                        array_push($material, new ProductAttribute($request->name, $request->addition, 'addition'));

                    if (($request->percentage != null))
                        array_push($material, new ProductAttribute($request->name, $request->percentage, 'percentage'));


                    if (($request->ratio != null))
                        array_push($material, new ProductAttribute($request->name, $request->ratio, 'ratio'));

                    $product->material = $material;


                }
            }
        }
        $product->save();
        return redirect()->route('dashboard.shop.product.edit', $product->id)->with(['msg' => 'عملیات با موفیت انجام شد']);


    }

    public function productDel(Request $request, int $id)
    {
        products::destroy([$id]);
        return redirect()->route('dashboard.shop.product.list')->with(['msg' => 'حذف محصول با موفیت انجام شد']);


    }

    public function productDelExtra(Request $request, string $type, int $pId, int $id)
    {
        $product = products::find($pId);
        if ($type == 'color') {
            $color = $product->color;
            unset($color[$id]);
            $product->color = $color;

        } elseif ($type == 'size') {
            $size = $product->size;
            unset($size[$id]);
            $product->size = $size;

        } elseif ($type == 'material') {
            $material = $product->material;
            unset($material[$id]);
            $product->material = $material;


        }
        $product->save();
        return redirect()->route('dashboard.shop.product.edit', $product->id)->with(['msg' => 'عملیات با موفیت انجام شد']);

    }

}
