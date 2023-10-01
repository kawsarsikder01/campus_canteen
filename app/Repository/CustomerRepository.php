<?php 
namespace App\Repository;

use App\Interface\RepositorInterface;
use App\Models\Customer;

class CustomerRepository implements RepositorInterface{
    public function getAll()
    {
        return Customer::All();
    }
    public function create(array $details)
    {
        return Customer::create( $details);
    }
    public function show($id)
    {
        return Customer::findOrFail($id);
    }
    public function update( $id ,Array $data)
    {
        return Customer::whereId($id)->update($data);
    }
    public function delete($id)
    {
        return Customer::destroy($id);
    }
}