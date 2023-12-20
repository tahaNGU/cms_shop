<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\product_request;
use App\Http\Requests\admin\product_request_edit;
use App\Models\admin\brand;
use App\Models\product;
use App\Models\product_cat;
use App\Models\tag;
use App\trait\admin\action_items;
use Illuminate\Http\Request;

class productController extends Controller
{
    use action_items;
    public function create()
    {
        $brands = brand::all();
        $tags = tag::all();
        $product_cats = product_cat::where('parent_id', '0')->get();
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        return view('admin.product.create', compact('brands', 'tags', 'product_cats', 'redirect_kinds', 'index_type'));
    }

    public function store(product_request $request)
    {
        $protrude_attribute_controller=new product_attribute_controller();
        $protrude_variation_controller=new product_variation_controller();
        $product_tag_controller=new productTagController();

        $pic = 'product/' . time() . '.' . $request->pic->extension();
        $request->pic->move(public_path('images/product'), $pic);


        $product=product::create([
            'canonical' => $request->canonical,
            'redirect' => $request->redirect,
            'redirect_kind' => $request->redirect_kind,
            'robots' => $request->robots,
            'h1' => $request->h1,
            'url_seo' => str_replace(' ', '-', $request->url_seo),
            'title_seo' => $request->title_seo,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'brand_id' => $request->brand_id,
            'category_id' => $request->parent_id,
            'primary_image' => $pic,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'admin_id' => auth()->user()->id,
        ]);

        $protrude_attribute_controller->store($request->attribute_ids,$product->id);
        $protrude_variation_controller->store($request->variation_values,$product->id,$request->parent_id);
        $product_tag_controller->store($request->tag_ids,$product->id);
        return back()->with('success', __('alert_msg.success_submit'));

    }

    public function attribute_category(Request $request)
    {
        $product = product_cat::find($request->get('id'));
        return ['attributes' => $product->categories()->wherePivot('is_filter', '1')->get(), 'variation' => $product->categories()->wherePivot('is_variation', '1')->get()];
    }

    public function list(Request $request){
        $products=product::all();
        if($request->has('cat_id')){
            $products=product::where('category_id',$request->get('cat_id'))->get();

        }
        return view('admin.product.list',compact('products'));
    }

    public function edit($id){
        $product=product::find($id);
        $brands = brand::all();
        $tags = tag::all();
        $product_cats = product_cat::where('parent_id', '0')->get();
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');

        return view('admin.product.edit',compact('product','brands', 'tags', 'product_cats', 'redirect_kinds', 'index_type'));
    }

    public function update(product_request_edit $request,$id){



        $pic='';
        if ($request->has('upload_value_pic')) {
            $pic=$request->get('upload_value_pic');

            if ($request->has('pic')) {
                if (is_object($request->pic)) {
                    $pic = 'news/' . time() . '.' . $request->pic->extension();
                    $request->pic->move(public_path('images/news'), $pic);
                }
            }
        }
        else{
            if ($request->has('pic')) {
                if (is_object($request->pic)) {
                    $pic = 'product/' . time() . '.' . $request->pic->extension();
                    $request->pic->move(public_path('images/product'), $pic);
                }
            }
        }
        $product_tag_controller=new productTagController();
        $product=product::find($id)->update([
            'canonical' => $request->canonical,
            'redirect' => $request->redirect,
            'redirect_kind' => $request->redirect_kind,
            'robots' => $request->robots,
            'h1' => $request->h1,
            'url_seo' => str_replace(' ', '-', $request->url_seo),
            'title_seo' => $request->title_seo,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'brand_id' => $request->brand_id,
            'primary_image' => $pic,
                'description' => $request->description,
            'is_active' => $request->is_active,
        ]);
        $product_tag_controller->change($request->tag_ids,$id);
        return back()->with('success', __('alert_msg.success_change'));

    }


    public function product_cat_update($id){
        $product_cats = product_cat::all();
        $product = product::find($id);
        return view('admin.product.product_cat_update',compact('product_cats','product'));
    }





    public function product_cat_store(Request $request,$product_id){
        $protrude_attribute_controller=new product_attribute_controller();
        $protrude_variation_controller=new product_variation_controller();
        $request->validate([
            'parent_id'=>'required',
            'attribute_ids'=>'required',
            'attribute_ids.*'=>'required',
            'variation_values.*.*'=>'required',
            'variation_values'=>'required',
            'variation_values.price.*' => 'integer',
            'variation_values.discount.*' => 'integer',
            'variation_values.quantity.*' => 'integer',
        ]);
        $protrude_attribute_controller->change($request->attribute_ids,$product_id);
        $protrude_variation_controller->change($request->variation_values,$product_id);
        return back()->with('success', __('alert_msg.success_submit'));

    }
    public function action_items(Request $request){
        if (isset($request->check_item)) {
            return back()->with('error', $this->action_items_list($request->action_type, product::class, false, $request->check_item, $request->order));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }


}
