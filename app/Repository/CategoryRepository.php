<?php 
namespace App\Repository;

use App\Interface\RepositorInterface;
use App\Models\Categorie;

class CategoryRepository implements RepositorInterface{
    public function getAll()
    {
        return Categorie::All();
    }
    public function create(array $details)
    {
        return Categorie::create( $details);
    }
    public function show($id)
    {
        return Categorie::findOrFail($id);
    }
    public function update($id ,Array $data)
    {
        return Categorie::whereId($id)->update($data);
    }
    public function delete($id)
    {
        return Categorie::destroy($id);
    }
}