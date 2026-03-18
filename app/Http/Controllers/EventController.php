<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{

public function index()
{
$events = Event::all();
return view('calendar', compact('events'));
}

public function store(Request $request)
{
Event::create($request->all());
return redirect('/');
}

public function update(Request $request,$id)
{

$event = Event::find($id);

$event->tanggal = $request->tanggal;
$event->judul = $request->judul;
$event->deskripsi = $request->deskripsi;

$event->save();

return redirect('/');

}

public function destroy($id)
{
    Event::find($id)->delete();
    return redirect()->back();
}

public function download()
{
$events = Event::all();

$filename = "events.csv";

$handle = fopen($filename,'w+');

fputcsv($handle,['Tanggal','Judul','Deskripsi']);

foreach($events as $e){
fputcsv($handle,[$e->tanggal,$e->judul,$e->deskripsi]);
}

fclose($handle);

return response()->download($filename)->deleteFileAfterSend(true);
}

}