<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Conta;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdateRequest;

class EventController extends Controller
{
    public function loadEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function loadContas()
    {
        $contas = Conta::where('pago', '0')->get();
        return response()->json($contas);
    }

    public function store(EventRequest $request)
    {
        $event = new Event;
        $event->fill($request->all());
        $event->save();
        $message = 'Evento foi criado com sucesso';
        return response()->json(['status' => true, 'message' => $message]);
    }

    public function update(EventUpdateRequest $request)
    {
        $event = Event::find($request->id);
        $event->fill($request->all());
        $event->update();
        $message = 'Evento foi alterado com sucesso';
        return response()->json(['status' => true, 'message' => $message]);
    }

    public function destroy(Request $request)
    {
        $event = Event::find($request->id);
        $event->delete();
        $message = 'Evento foi deletado com sucesso';
        return response()->json(['status' => true, 'message' => $message]);
    }
}
