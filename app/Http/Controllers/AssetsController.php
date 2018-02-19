<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Intervention\Image\Constraint;

class AssetsController extends Controller
{

    public function index(Request $request)
    {
        $query = Asset::latest();

        if ($request->per_page)
            return $query->paginate($request->per_page);

        return ['data'=>$query->get()];
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = $request->file('image');

        $thumbnail = Image::make($image->getRealPath())->fit(344, 262, function ($constraint) {
        });
        $thumbnail->save(public_path('files/thumbnail/' . $image->hashName()));


        $productLittleThumbnail = Image::make($image->getRealPath())->fit(258, 214, function (Constraint $constraint) {
            $constraint->aspectRatio();
        });
        $productLittleThumbnail->save(public_path('files/product-little-thumbnails/' . $image->hashName()));

        $productLargeThumbnail = Image::make($image->getRealPath())->fit(802, 602, function (Constraint $constraint) {
            $constraint->aspectRatio();
        });
        $productLargeThumbnail->save(public_path('files/product-large-thumbnails/' . $image->hashName()));

        $widgetThumbnail = Image::make($image->getRealPath())->fit(250, 87, function (Constraint $constraint) {
            $constraint->aspectRatio();
        });
        $widgetThumbnail->save(public_path('files/widget-thumbnails/' . $image->hashName()));

        $articleLittleThumbnail = Image::make($image->getRealPath())->fit(480, 320, function (Constraint $constraint) {
            $constraint->aspectRatio();
        });
        $articleLittleThumbnail->save(public_path('files/article-little-thumbnails/' . $image->hashName()));

        $articleLargeThumbnail = Image::make($image->getRealPath())->fit(1601, 498, function (Constraint $constraint) {
            $constraint->aspectRatio();
        });
        $articleLargeThumbnail->save(public_path('files/article-large-thumbnails/' . $image->hashName()));

        $large = Image::make($image->getRealPath())->resize(1920, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $large->save(public_path('files/large/' . $image->hashName()));


        $asset = new Asset();
        $asset->name = $image->hashName();
        $asset->size = $image->getSize();
        $asset->type = $image->getMimeType();
        $asset->url = env('APP_URL') . 'files/large/' . $image->hashName();
        $asset->thumbnail_url = env('APP_URL') . 'files/thumbnail/' . $image->hashName();
        $asset->product_little_thumbnail = env('APP_URL') . 'files/product-little-thumbnails/' . $image->hashName();
        $asset->product_large_thumbnail = env('APP_URL') . 'files/product-large-thumbnails/' . $image->hashName();
        $asset->widget_thumbnail = env('APP_URL') . 'files/widget-thumbnails/' . $image->hashName();
        $asset->article_little_thumbnail = env('APP_URL') . 'files/article-little-thumbnails/' . $image->hashName();
        $asset->article_large_thumbnail = env('APP_URL') . 'files/article-large-thumbnails/' . $image->hashName();
        $asset->width = $large->getWidth();
        $asset->height = $large->getHeight();
        $asset->save();
        $asset->fresh();

        return ['data' => $asset->toArray()];
    }

    public function destroy(Asset $asset)
    {
        $asset->colors()->detach();
        $asset->products()->detach();
        $asset->articles()->detach();

        $asset->delete();
    }
}
