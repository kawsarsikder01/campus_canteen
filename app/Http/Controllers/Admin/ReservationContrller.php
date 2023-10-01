<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Http\Requests\ReservationStoreRequest;
use App\Repository\TableRepository;
use App\Enums\TableStatus;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Repository\ReservationRepository;

class ReservationContrller extends Controller
{
    public $reservation ;
    public $table;
    public function __construct(ReservationRepository $reservation,TableRepository $table)
    {
        $this->reservation = $reservation;
        $this->table = $table;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = $this->reservation->getAll();
        return view('admin.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = $this->reservation->find('status',TableStatus::Avalaiable);
        return view('admin.reservations.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = $this->table->show($request->table_id);
        if($table->guest_number < $request->guest_number){
            return back()->with('warning','Please chose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach($table->reservation as $res){
            $res_date = Carbon::parse($res->res_date);
            if($res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('warning','This table is reserved for this date.');
            }
        }
        $this->reservation->create($request->validated());
        return redirect(route('admin.reservations.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('admin.reservations.edit',compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRepository $request, Reservation $reservation)
    {
        $table = $this->table->show($request->id);
        if($table->guest_number < $request->guest_number){
            return back()->with('warning','Please chose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach($table->reservation as $res){
            $res_date = Carbon::parse($res->res_date);
            if($res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('warning','This table is reserved for this date.');
            }
        }
        $this->reservation->update($reservation->id , $request->validated());
        return redirect(route('admin.reservations.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $this->reservation->delete($reservation->id);
    }
}
