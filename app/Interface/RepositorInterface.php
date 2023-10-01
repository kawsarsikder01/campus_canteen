<?php 
namespace App\Interface;

interface RepositorInterface{
    public function getAll();
    public function show($id);
    public function delete($id);
    public function create(array $details);
    public function update($id, array $data);
    // public function find($status,$available);
}