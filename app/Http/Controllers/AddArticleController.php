<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Color;
use App\Model\Gender;
use App\Model\Marque;
use App\Model\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddArticleController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $marques = Marque::all();
        $genders = Gender::all();
        $colors = Color::all();

        return view('add-article.index')
            ->with('categories', $categories)
            ->with('marques', $marques)
            ->with('genders', $genders)
            ->with('colors', $colors);
    }

    public function category(Request $request)
    {

        $id = $request->category;
        $size = Size::all()->where('category_id', '=', $id);

        return response()->json($size);
    }
    public function add(Request $request)
    {

        $name = $request->name;
        $category_id = $request->category_id;
        if ($request->marqueNull != null) {
            $marque_id = $request->marqueNull;
        } else {
            $marque_id = $request->marque_id;
        }
        $gender_id = $request->gender_id;

        $article['name'] = $name;
        $article['category_id'] = $category_id;
        $article['marque_id'] = $marque_id;
        $article['gender_id'] = $gender_id;
        foreach ($request->size_id as $key => $size) {
            $article['declinations'][$key]['size_id'] = $size;
        }
        foreach ($request->color_id as $key => $color) {
            $article['declinations'][$key]['color_id'] = $color;
        }
        foreach ($request->quantity as $key => $quantite) {
            $article['declinations'][$key]['quantity'] = $quantite;
        }

        Session::push('collect', $article);

        $btn = $request->btn;

        if ($btn == 0) {

            return redirect()->route('recapCollect');
        } else {
            $categories = Category::all();
            $marques = Marque::all();
            $genders = Gender::all();
            $colors = Color::all();

            return view('add-article.index')
                ->with('categories', $categories)
                ->with('marques', $marques)
                ->with('genders', $genders)
                ->with('colors', $colors);
        }
    }
}
