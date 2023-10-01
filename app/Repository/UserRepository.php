<?php 
namespace App\Repository;

use App\Interface\RepositorInterface;
use App\Models\User;

class UserRepository implements RepositorInterface{
    public function getAll()
    {
        return User::All();
    }
    public function create(array $details)
    {
        return User::create( $details);
    }
    public function show($id)
    {
        return User::findOrFail($id);
    }
    public function update($id,Array $userData)
    {
        return User::whereId($id)->update($userData);
    }
    public function delete($id)
    {
        return User::destroy($id);
    }
}