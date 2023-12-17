<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\product_cat_request_edit;
use App\Http\Requests\admin\productCat_request;
use App\Models\admin\brand;
use App\Models\attribiute;
use App\Models\product_cat;
use App\trait\admin\action_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    use action_items;

    public function create()
    {
        $attributes = attribiute::all();
        $brands = brand::all();
        $product_cats = product_cat::where('parent_id', '0')->get();
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        return view('admin.category.create', compact('index_type', 'redirect_kinds', 'attributes', 'brands', 'product_cats'));
    }

    public function store(productCat_request $request)
    {
        try {
            DB::beginTransaction();

            $icon = 'product_cat/' . time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('images/product_cat'), $icon);

            $popular_article = '';
            if (isset($request->popular_article)) {
                $popular_article = implode(',', $request->popular_article);
            }
            $product_cat = product_cat::create([
                'canonical' => $request->canonical,
                'h1' => $request->h1,
                'redirect' => $request->redirect,
                'redirect_kind' => $request->redirect_kind,
                'robots' => $request->robots,
                'url_seo' => str_replace(' ', '-', $request->url_seo),
                'title_seo' => $request->title_seo,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'title' => $request->title,
                'parent_id' => $request->parent_id,
                'admin_id' => auth()->user()->id,
                'icon' => $icon,
                'description' => $request->description,
            ]);

            foreach ($request->get('attributes') as $attribute_id) {
                $attribute_model = attribiute::findOrFail($attribute_id);
                $attribute_model->categories()->attach($product_cat->id, [
                    'is_filter' => in_array($attribute_id, $request->compare) ? 1 : 0,
                    'is_variation' => $request->variation == $attribute_id ? 1 : 0,

                ]);
            }
            DB::commit();
            return back()->with('success', __('alert_msg.success_submit'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('alert_msg.error_form_category'));

        }
    }

    public function list()
    {
        $parent_id = '0';
        if (request()->has('parent_id')) {
            $parent_id = request()->get('parent_id');
        }
        $product_cats = product_cat::where('parent_id', $parent_id)->get();
        return view('admin.category.list', compact('product_cats'));
    }

    public function edit($id){
        $product_cat=product_cat::find($id);
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        $product_cats=product_cat::where('id','!=',$product_cat["id"])->get();
        $attributes=attribiute::all();
        return view('admin.category.edit',compact('product_cat','redirect_kinds','index_type','product_cats','attributes'));
    }



    public function delete($id){
        product_cat::find($id)->categories()->detach();
        product_cat::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }
    public function action_items(Request $request)
    {
        if ($request->get('action_type') == 'delete_all') {
            foreach ($request->check_item as $id_product_cat) {
                product_cat::find($id_product_cat)->categories()->detach();
                product_cat::find($id_product_cat)->delete();
            }
            return back()->with('error',__('alert_msg.success_delete_all'));

        } else {
            if (isset($request->check_item)) {
                return back()->with('error', $this->action_items_list($request->action_type, product_cat::class, false, $request->check_item, $request->order));
            } else {
                return back()->with('error', __('alert_msg.empty_items'));

            }
        }
    }
    public function update(product_cat_request_edit $request){
        try {
            DB::beginTransaction();
            $pic='';
            if ($request->has('upload_value_icon')) {
                $pic=$request->get('upload_value_icon');

                if ($request->has('icon')) {
                    if (is_object($request->icon)) {
                        $pic = 'news/' . time() . '.' . $request->icon->extension();
                        $request->icon->move(public_path('images/product_cat'), $pic);
                    }
                }
            }
            else{
                if ($request->has('icon')) {
                    if (is_object($request->icon)) {
                        $pic = 'product_cat/' . time() . '.' . $request->icon->extension();
                        $request->icon->move(public_path('images/product_cat'), $pic);
                    }
                }
            }


            $product_cat = product_cat::find($request->id)->update([
                'canonical' => $request->canonical,
                'redirect' => $request->redirect,
                'h1' => $request->h1,
                'redirect_kind' => $request->redirect_kind,
                'robots' => $request->robots,
                'url_seo' => str_replace(' ', '-', $request->url_seo),
                'title_seo' => $request->title_seo,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'title' => $request->title,
                'parent_id' => $request->parent_id,
                'admin_id' => auth()->user()->id,
                'icon' => $pic,
                'description' => $request->description,
            ]);
            $product_cat=product_cat::find($request->id);
            $product_cat->categories()->detach();

            foreach ($request->get('attributes') as $attribute_id) {
                $attribute_model = attribiute::findOrFail($attribute_id);
                $attribute_model->categories()->attach($product_cat->id, [
                    'is_filter' => in_array($attribute_id, $request->compare) ? 1 : 0,
                    'is_variation' => $request->variation == $attribute_id ? 1 : 0,
                ]);
            }
            DB::commit();
            return back()->with('success', __('alert_msg.success_submit'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('alert_msg.error_form_category'));

        }
    }



}
