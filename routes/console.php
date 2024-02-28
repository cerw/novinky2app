<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Inspiring;
use App\Models\Show;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('import', function () {

    // make db connection to differne db and query shows table
    $shows = DB::connection('mysql-radio1')
    ->table('shows')
    ->where('title','Novinky na alternativní scéně ')
    ->whereNotNull('stream_id')
    ->get();


    $streams = DB::connection('mysql-radio1')
    ->table('streams')
    ->whereIn('id', $shows->pluck('stream_id'))
    ->get();

    // insert into shows via model
    $shows->each(function($show) use ($streams){


        $url = 'https://radio1.sgp1.digitaloceanspaces.com/';

        $stream = $streams->where('id', $show->stream_id)->first();
        Show::firstOrCreate([
            'date' => $show->date,
        ],[
            'title' => trim($show->title),
            'description' => $show->desc,
            'starts_at' => $show->starts_at,
            'ends_at' => $show->ends_at,
            'stream_url' => $url.$stream->name,
        ]);
    });




})->purpose('Display an inspiring quote');
