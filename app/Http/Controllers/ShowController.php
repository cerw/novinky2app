<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Show;

class ShowController extends Controller
{

    public function view(Show $show)
    {
        return Inertia::render('Show/View', [
            'event' => $show->only(
                'id',
                'title',
                'start_date',
                'description'
            ),
        ]);
    }

    public function index()
    {
        return Inertia::render('Show/Index', [
            'shows' => Show::latest('date')->get()->map->only(
                'id',
                'title',
                'date',
                'stream_url'
            )
        ]);
    }

    public function latest() {
        return $this->index();
    }
}
