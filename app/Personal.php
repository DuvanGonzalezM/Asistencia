<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model{
    protected $table='personals';
    protected $fillable = ['PersType','PersDocType','PersDocNumber','PersFirstName','PersSecondName','PersLastName','PersEmail','PersLibreta','PersPase','PersBirthday','PersPhoneNumber','PersCellphone','PersAddress','PersEPS','PersARL','PersBank','PersBankAccaunt','PersIngreso','PersSalida'];
    protected $primaryKey = 'ID_Pers';

    public function Assistence(){
        return $this->hasMany('App\Assistence', 'ID_Asis','id');//como personal tiene muchas asistencias
    }
}
