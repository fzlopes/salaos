<?php

namespace App\Http\Controllers\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;
use Illuminate\Support\Carbon;
use App\Service;
use App\Client;

class ScheduleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::where('date', '=', Carbon::now()->format('Y-m-d'))
                   ->orderBy('hour', 'asc')
                   ->get();

        $dataHoje = Carbon::now()->format('d/m/Y'); 
        
        return view('schedules.index')->with(compact('schedules','dataHoje'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::select('id','name')
            ->orderBy('name', 'asc')
            ->get()
            ->pluck('name','id');
        
        $services = Service::select('id','name')
        ->orderBy('name', 'asc')
        ->get()
        ->pluck('name','id');

        return view('schedules.create')->with(compact('clients','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Schedule::create($request->all());

        return redirect()
            ->route('agendas.index')
            ->with(['success' => 'Agenda cadastrada com sucesso!']);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);

        $date = $schedule->date;
        $dataHoje = Carbon::parse($date)->format('d/m/Y');
        $schedules = null;

        $clients = Client::select('id','name')
        ->orderBy('name', 'asc')
        ->get()
        ->pluck('name','id');
    
        $services = Service::select('id','name')
        ->orderBy('name', 'asc')
        ->get()
        ->pluck('name','id');

        $schedules = Schedule::where('date', '=', $date)
            ->orderBy('hour', 'asc')
            ->get();

        return view('schedules.edit')->with(compact('schedules',
            'dataHoje',
            'clients',
            'services',
            'schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->fill($request->all());
        $schedule->save();

        $date = $schedule->date;
        $dataHoje = Carbon::parse($date)->format('d/m/Y');
        $schedules = null;

        $clients = Client::select('id','name')
        ->orderBy('name', 'asc')
        ->get()
        ->pluck('name','id');
    
        $services = Service::select('id','name')
        ->orderBy('name', 'asc')
        ->get()
        ->pluck('name','id');

        $schedules = Schedule::where('date', '=', $date)
            ->orderBy('hour', 'asc')
            ->get();

        return redirect()
            ->route('agendas.index')
            ->with(['success' => 'Agenda alterada com sucesso!']);
       
    }

    public function search($date)
    {
        if(!empty($date)) {
            $schedules = Schedule::where('date', '=', Carbon::parse($date)->format('Y-m-d'))->orderBy('hour', 'asc')->get();
        } else {
            $schedules = Schedule::where('date', '=', Carbon::now()->format('Y-m-d'))->orderBy('hour', 'asc')->get();
        }

        $clients = Client::get()->pluck('name', 'id');

        $services = Service::get()->pluck('name', 'id');

        return ['schedules'=>$schedules, 'clients'=>$clients, 'services'=>$services];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        $schedule->delete();

        \Session::flash('success', 'Agenda ' . $schedule->hour . ' apagada com sucesso.');

        return response()->json(['message' => 'Agenda ' . $schedule->hour . ' apagada com sucesso.']);
    }
}
