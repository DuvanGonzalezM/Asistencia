<?php

use Illuminate\Database\Seeder;
use App\Personal;

class PersonalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $personal = new Personal();
        $personal->PersType = 1;
        $personal->PersDocType = "CC";
        $personal->PersDocNumber = '1002526800';
        $personal->PersFirstName = "Duvan";
        $personal->PersSecondName = "Arley";
        $personal->PersLastName = "Gonzalez_Morato";
        $personal->PersEmail = "moratoduvan@gmial.com";
        $personal->PersCellphone = '3227392232';
        $personal->PersSlug = "pers-duvan-gonzalez_morato-2019-02-20";
        $personal->save();

        $personal = new Personal();
        $personal->PersType = 0;
        $personal->PersDocType = "CC";
        $personal->PersDocNumber = '76543532';
        $personal->PersFirstName = "Luis";
        $personal->PersLastName = "De_la_Hoz";
        $personal->PersEmail = "luiz@gmial.com";
        $personal->PersCellphone = '3223822393';
        $personal->PersSlug = "pers-luis-de_la_hoz-2019-02-20";
        $personal->save();

        $personal = new Personal();
        $personal->PersType = 1;
        $personal->PersDocType = "CC";
        $personal->PersDocNumber = '1002526460';
        $personal->PersFirstName = "Andres";
        $personal->PersLastName = "Ramirez";
        $personal->PersEmail = "randres@gmial.com";
        $personal->PersCellphone = '3227396432';
        $personal->PersSlug = "pers-andres-ramirez-2019-02-20";
        $personal->save();

        $personal = new Personal();
        $personal->PersType = 0;
        $personal->PersDocType = "CC";
        $personal->PersDocNumber = '105354634';
        $personal->PersFirstName = "Camilo";
        $personal->PersSecondName = "Andres";
        $personal->PersLastName = "Murcia";
        $personal->PersEmail = "cam@gmial.com";
        $personal->PersCellphone = '3221234232';
        $personal->PersSlug = "pers-camilo-murcia-2019-02-20";
        $personal->save();

        $personal = new Personal();
        $personal->PersType = 1;
        $personal->PersDocType = "CC";
        $personal->PersDocNumber = '109765643';
        $personal->PersFirstName = "Maria";
        $personal->PersLastName = "Gonzalez_Sosa";
        $personal->PersEmail = "magosa@gmial.com";
        $personal->PersCellphone = '3244562456';
        $personal->PersSlug = "pers-maria-gonzalez_sosa-2019-02-20";
        $personal->save();
    }
}
