<?php 
namespace App\Repository;

use App\Interface\RepositorInterface;
use App\Models\Slider;

class SliderRepository implements RepositorInterface{
    public function getAll()
    {
        return Slider::All();
    }
    public function create(array $details)
    {
        return Slider::create($details);
    }
    public function show($id)
    {
        return Slider::findOrFail($id);
    }
    public function update($id ,Array $data)
    {
        return Table::whereId($id)->update($data);
    }
    public function delete($id)
    {
        return Slider::destroy($id);
    }
}