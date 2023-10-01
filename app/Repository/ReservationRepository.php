<?php 
namespace App\Repository;

use App\Interface\ReservationInterface;
use App\Models\Reservation;
use App\Models\Table;

class ReservationRepository implements ReservationInterface{
    public function getAll()
    {
        return Reservation::All();
    }
    public function create(array $details)
    {
        return Reservation::create( $details);
    }
    public function show($id)
    {
        return Reservation::findOrFail($id);
    }
    public function update($id ,Array $data)
    {
        return Reservation::whereId($id)->update($data);
    }
    public function delete($id)
    {
        return Reservation::destroy($id);
    }
    public function find($status ,$available)
    {
        return Table::where($status,$available)->get();
    }
}