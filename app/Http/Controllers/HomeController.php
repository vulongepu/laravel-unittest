<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
//        echo Storage::url('1.jpg');die;
//        echo asset('storage/images.json');die;
//        $images = [
//            [
//                'no' => '1',
//                'name' => '1.jpg',
//                'src' => '1.jpg',
//                'link' => 'link1',
//            ],
//            [
//                'no' => '2',
//                'name' => '2.jpg',
//                'src' => '2.jpg',
//                'link' => 'link2',
//            ]
//        ];
//        $images = json_encode($images);
//        Storage::disk('public')->put('images.json', $images);die;

        $images = Storage::disk('public')->get('images.json');
        $images = json_decode($images, true);
        foreach ($images as $key => $image) {
            $images[$key] = $image;
            $images[$key]['src'] = Storage::url($image['src']);
        }
        $images = json_encode($images);
//        dd($images);
//        dd(json_decode($images, true));
        return view('home.index', compact('images'));
    }

    public function store(Request $request)
    {
        $images = Storage::disk('public')->get('images.json');
        Storage::disk('public')->put('images.json', $images);
//        dd($images);
        dd($request->all());
    }
}
