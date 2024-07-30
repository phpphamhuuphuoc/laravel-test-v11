<?php

use App\Http\Controllers\CMS\API\ModuleController;
use App\Http\Controllers\CMS\API\PageController;
use App\Http\Controllers\CMS\API\Category\BaseController;
use App\Http\Controllers\CMS\API\CategoryTypeController;
use App\Http\Controllers\CMS\API\DesignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\API\Category\CollectionController;
use App\Http\Controllers\CMS\API\Category\AssetController;
use App\Http\Controllers\CMS\API\Category\NavigationController;
use App\Http\Controllers\CMS\API\Category\ClassificationController;
use App\Http\Controllers\CMS\API\Category\FormController;
use App\Http\Controllers\CMS\API\Category\GlobalController;
use App\Http\Controllers\CMS\API\TemplateController;
use App\Models\CMS\Page;
// Import Below Here


use App\Http\Controllers\CMS\API\Item\ProductController;

use App\Http\Controllers\CMS\API\Item\PostController;

use App\Http\Controllers\CMS\API\Item\ContactController;

use App\Http\Controllers\CMS\API\Item\TestController;

use App\Http\Controllers\CMS\API\Item\CollectionTestController;

use App\Http\Controllers\CMS\API\Item\TestCollectionController;
use App\Models\CMS\Category;

// const BREAKPOINT_USE = 'DO NOT DELETE OR MOVE';



// Lấy danh sách các trang từ CmsPage kèm theo thông tin của template
$pages = Page::with('template')->get();

// Đăng ký route cho từng trang
foreach ($pages as $page) {
    if ($page->template_id == 3) {
        Route::get('/', function () use ($page) {
            return dispatchPage($page);
        })->name('cms.page.home');
    }else if($page->template_id == 5) {

        Route::get("/{$page->slug}", function () use ($page) {
            return dispatchPage($page);
        })->name("cms.page.{$page->slug}");
        Route::post("/{$page->slug}/store", function () use ($page) {
            return dispatchPageContact($page);
        })->name("cms.page.{$page->slug}.store");

    }else if($page->template_id == 6) {

        Route::get("/{$page->slug}", function () use ($page) {
            return dispatchPage($page);
        })->name("cms.page.{$page->slug}");
        $category = Category::findOrFail($page->handle_id);
        $slugCategory = slugify($category->title);
        Route::get("/{itemSlug}-{$slugCategory}{categoryId}", function ($itemSlug, $categoryId) use ($page) {
            return dispatchItemPage($itemSlug, $categoryId, $page);
        })->where([
            'itemSlug' => '.*', // Cho phép slug dài và có dấu gạch nối
            'parentId' => '[0-9]+' // ID của danh mục cha là số
        ])->name('cms.page.item');

    }
    else {
        Route::get('/' . $page->slug, function () use ($page) {
            return dispatchPage($page);
        })->name("cms.page.item");
    }
}

Route::prefix('cms/api')->name('cms.api.')->group(function () {
    Route::apiResources([
        'template' => TemplateController::class,
        'category-type' => CategoryTypeController::class,
        'category' => BaseController::class,
        'design' => DesignController::class,
        'page' => PageController::class,
        'module' => ModuleController::class,
        'collection' => CollectionController::class,
        'navigation' => NavigationController::class,
        'classification' => ClassificationController::class,
        'asset' => AssetController::class,
        'form' => FormController::class,
        'global' => GlobalController::class,
    ]);



Route::name('item.')->prefix('item')->group(function () {
    Route::get('product/category', [ProductController::class, 'category'])->name('product.category');
    Route::apiResources([
        'product' => ProductController::class,
    ]);
});

Route::name('item.')->prefix('item')->group(function () {
    Route::get('post/category', [PostController::class, 'category'])->name('post.category');
    Route::apiResources([
        'post' => PostController::class,
    ]);
});

Route::name('item.')->prefix('item')->group(function () {
    Route::get('contact/category', [ContactController::class, 'category'])->name('contact.category');
    Route::post('contact/store-and-send-mail', [ContactController::class, 'storeAndSendMail'])->name('contact.store-and-send-mail');
    Route::apiResources([
        'contact' => ContactController::class,
    ]);
});

Route::name('item.')->prefix('item')->group(function () {
    Route::get('test/category', [TestController::class, 'category'])->name('test.category');
    Route::post('test/store-and-send-mail', [TestController::class, 'storeAndSendMail'])->name('test.store-and-send-mail');
    Route::apiResources([
        'test' => TestController::class,
    ]);
});

Route::name('item.')->prefix('item')->group(function () {
    Route::get('collection-test/category', [CollectionTestController::class, 'category'])->name('collection-test.category');
    Route::apiResources([
        'collection-test' => CollectionTestController::class,
    ]);
});

Route::name('item.')->prefix('item')->group(function () {
    Route::get('test-collection/category', [TestCollectionController::class, 'category'])->name('test-collection.category');
    Route::apiResources([
        'test-collection' => TestCollectionController::class,
    ]);
});
// const BREAKPOINT_ROUTE = 'DO NOT DELETE OR MOVE';
});


Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
// Route bắt tất cả các yêu cầu cho cms
Route::get('/cms/{any?}', function () {
    return view('cms.layout');
})->where('any', '.*');

