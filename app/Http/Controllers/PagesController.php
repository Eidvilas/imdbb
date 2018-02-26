<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Blog\Movie;
use Blog\Categorie;
use Blog\Actor;


class PagesController extends Controller
{
    /*

    public function index() {
        $title = "Welcome to Laravel";

        return view('pages.index')->with('title', $title);
    }


    public function index() {
        $title = "Welcome to Laravel";

        return view('pages.index', compact('title'));
    }
    */

    public function index() {



        return view('pages.index');
    }

    public function movies() {
        $movies = Movie::orderBy('name', 'asc')->paginate(10); // paginate - puslapiavimas kas 10 irasu
        return view('pages.movies', [
            'movies' => $movies,
        ]);
    }

    public function categories() {
        $categories = Categorie::all();

        return view('pages.categories', [
            'categories' => $categories,
        ]);
    }

    public function actors() {
        $actors= Actor::paginate(10);

        return view('pages.actors', [
            'actors' => $actors,
        ]);
    }

    public function admin() {


        return view('pages.admin');
    }
}
