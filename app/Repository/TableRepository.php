<?php 
namespace App\Repository;

use App\Interface\RepositorInterface;
use App\Models\Table;

class TableRepository implements RepositorInterface{
    public function getAll()
    {
        return Table::All();
    }
    public function create(array $details)
    {
        return Table::create($details);
    }
    public function show($id)
    {
        return Table::findOrFail($id);
    }
    public function update($id ,Array $data)
    {
        return Table::whereId($id)->update($data);
    }
    public function delete($id)
    {
        return Table::destroy($id);
    }
}