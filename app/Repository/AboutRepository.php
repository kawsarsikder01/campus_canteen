<?php 
namespace App\Repository;

use App\Interface\RepositorInterface;
use App\Models\About;

class AboutRepository implements RepositorInterface{
    public function getAll()
    {
        return About::All();
    }
    public function create(array $details)
    {
        return About::create( $details);
    }
    public function show($id)
    {
        return About::findOrFail($id);
    }
    public function update($id ,Array $data)
    {
        return About::whereId($id)->update($data);
    }
    public function delete($id)
    {
        return About::destroy($id);
    }
}