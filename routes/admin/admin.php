<?php

use Illuminate\Support\Facades\Route;

include "auth.php";
Route::middleware('auth:admins')->group(function () {
    Route::prefix('admin/banner/')->as('admin.banner.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\banner_controller::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\banner_controller::class, 'store'])->name('store');
        Route::get('index', [\App\Http\Controllers\admin\banner_controller::class, 'index'])->name('index');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\banner_controller::class, 'delete'])->name('delete');
        Route::post('action_all', [\App\Http\Controllers\admin\banner_controller::class, 'action_items'])->name('action_items');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\banner_controller::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\banner_controller::class, 'update'])->name('update');
    });

    Route::prefix('admin/article_cat')->as('admin.article_cat.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\articleCatController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\articleCatController::class, 'store'])->name('store');
        Route::get('index', [\App\Http\Controllers\admin\articleCatController::class, 'index'])->name('index');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\articleCatController::class, 'delete'])->name('delete');
        Route::post('action_all', [\App\Http\Controllers\admin\articleCatController::class, 'action_items'])->name('action_items');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\articleCatController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\articleCatController::class, 'update'])->name('update');

    });
    Route::prefix('admin/article')->as('admin.article.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\article_controller::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\article_controller::class, 'store'])->name('store');
        Route::get('index', [\App\Http\Controllers\admin\article_controller::class, 'index'])->name('index');
        Route::post('action_all', [\App\Http\Controllers\admin\article_controller::class, 'action_items'])->name('action_items');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\article_controller::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\article_controller::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\article_controller::class, 'update'])->name('update');
    });
    Route::prefix('admin/page')->as('admin.page.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\pageController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\pageController::class, 'store'])->name('store');
        Route::get('list', [\App\Http\Controllers\admin\pageController::class, 'list'])->name('list');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\pageController::class, 'delete'])->name('delete');
        Route::post('action_all', [\App\Http\Controllers\admin\pageController::class, 'action_items'])->name('action_items');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\pageController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\pageController::class, 'update'])->name('update');
    });
    Route::prefix('admin/menu')->as('admin.menu.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\menuController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\menuController::class, 'store'])->name('store');
        Route::get('list', [\App\Http\Controllers\admin\menuController::class, 'list'])->name('list');
        Route::post('action_all', [\App\Http\Controllers\admin\menuController::class, 'action_items'])->name('action_items');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\menuController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\menuController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\menuController::class, 'update'])->name('update');

    });
    Route::prefix('admin/faq')->as('admin.faq.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\faqController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\faqController::class, 'store'])->name('store');
        Route::get('list', [\App\Http\Controllers\admin\faqController::class, 'list'])->name('list');
        Route::post('action_all', [\App\Http\Controllers\admin\faqController::class, 'action_items'])->name('action_items');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\faqController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\faqController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\faqController::class, 'update'])->name('update');

    });
    Route::prefix('admin/group_access')->as('admin.group_access.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\access_group_controller::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\access_group_controller::class, 'store'])->name('store');
        Route::get('list', [\App\Http\Controllers\admin\access_group_controller::class, 'list'])->name('list');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\access_group_controller::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\access_group_controller::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\access_group_controller::class, 'update'])->name('update');
        Route::post('action_all', [\App\Http\Controllers\admin\access_group_controller::class, 'action_items'])->name('action_items');
    });
    Route::prefix('admin/manager')->as('admin.manager.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\managerController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\managerController::class, 'store'])->name('store');

    });
    Route::prefix('admin/brand')->as('admin.brand.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\brand_controller::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\brand_controller::class, 'store'])->name('store');
        Route::get('list', [\App\Http\Controllers\admin\brand_controller::class, 'list'])->name('list');
        Route::post('action_all', [\App\Http\Controllers\admin\brand_controller::class, 'action_items'])->name('action_items');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\brand_controller::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\brand_controller::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\brand_controller::class, 'update'])->name('update');

    });
    Route::prefix('admin/attribute')->as('admin.attribute.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\attributeController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\attributeController::class, 'store'])->name('store');
        Route::get('list', [\App\Http\Controllers\admin\attributeController::class, 'list'])->name('list');
        Route::post('action_all', [\App\Http\Controllers\admin\attributeController::class, 'action_items'])->name('action_items');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\attributeController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\attributeController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\attributeController::class, 'update'])->name('update');
    });
    Route::prefix('admin/category')->as('admin.category.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\categoryController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\categoryController::class, 'store'])->name('store');
        Route::get('list', [\App\Http\Controllers\admin\categoryController::class, 'list'])->name('list');
        Route::post('action_all', [\App\Http\Controllers\admin\categoryController::class, 'action_items'])->name('action_items');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\categoryController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\categoryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\categoryController::class, 'update'])->name('update');


    });
    Route::prefix('admin/tag')->as('admin.tag.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\tagController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\tagController::class, 'store'])->name('store');
        Route::get('list', [\App\Http\Controllers\admin\tagController::class, 'list'])->name('list');
        Route::post('action_all', [\App\Http\Controllers\admin\tagController::class, 'action_items'])->name('action_items');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\tagController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\tagController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\tagController::class, 'update'])->name('update');


    });
    Route::prefix('admin/product')->as('admin.product.')->group(function () {
        Route::get('create', [\App\Http\Controllers\admin\productController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\productController::class, 'store'])->name('store');
        Route::get('attribute_category', [\App\Http\Controllers\admin\productController::class, 'attribute_category'])->name('attribute_category');
        Route::get('list', [\App\Http\Controllers\admin\productController::class, 'list'])->name('list');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\productController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\productController::class, 'update'])->name('update');
        Route::post('action_all', [\App\Http\Controllers\admin\productController::class, 'action_items'])->name('action_items');


        Route::get('edit/product_cat/{id}', [\App\Http\Controllers\admin\productController::class, 'product_cat_update'])->name('product_cat_update');
        Route::post('update/product_cat/{id}', [\App\Http\Controllers\admin\productController::class, 'product_cat_store'])->name('product_cat_store');
    });


    Route::prefix('admin/content')->as('admin.content.')->middleware('content_verify')->group(function () {
        Route::get('{item_id}/{module}/create', [\App\Http\Controllers\admin\contentController::class, 'create'])->name('create');
        Route::post('store/{module}', [\App\Http\Controllers\admin\contentController::class, 'store'])->name('store');
        Route::get('{item_id}/{module}/list', [\App\Http\Controllers\admin\contentController::class, 'list'])->name('list');
        Route::post('{item_id}/{module}/action_all', [\App\Http\Controllers\admin\contentController::class, 'action_items'])->name('action_items');
        Route::get('delete/{id}', [\App\Http\Controllers\admin\contentController::class, 'delete'])->name('delete');
        Route::get('edit/{module}/{id}', [\App\Http\Controllers\admin\contentController::class, 'edit'])->name('edit');
        Route::post('update/{module}/{item_id}', [\App\Http\Controllers\admin\contentController::class, 'update'])->name('update');
    });
    Route::get('admin/setting', [\App\Http\Controllers\admin\settingController::class, 'setting'])->name('admin.setting');
    Route::get('admin/setting_store', [\App\Http\Controllers\admin\settingController::class, 'setting_store'])->name('admin.setting_store');

    Route::get('/dashboard/admin/base', function () {
        return view('admin.layout.base');
    })->name('admin.base');

});
