<?php

use Illuminate\Database\Seeder;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
            array(
                "name" => "Alimentación"
            ),
            array(
                "name" => "Transporte"
            ),
            array(
                "name" => "Plan de Celular"
            ),
        );

        foreach ($types as $type){
            $expenseType = new \App\ExpenseType();
            $expenseType->name = $type["name"];
            $expenseType->save();
        }

    }
}
