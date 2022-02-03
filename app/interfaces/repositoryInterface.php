<?php
namespace App\interfaces;

interface repositoryInterface
{

        // get all data
    public function index();

         // store data
    public function store($data);

        //get element by id
    public function getElementById($id);

        //update element
    public function update($data, $id);
        // delete element
    public function destroy($id);

}
