<?php

use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //extraer fecha en formato YYYY-MM-DD
        $date = \Carbon\Carbon::now()->toDateString();

        $expenses = array(
            array(
                "value" => 50,
                "date" => $date,
                "expense_type_id" => 1
            ),
            array(
                "value" => 5,
                "date" => $date,
                "expense_type_id" => 2
            ),
            array(
                "value" => 25,
                "date" => $date,
                "expense_type_id" => 3
            ),
        );

        foreach ($expenses as $item){
            $expense = new \App\Expense();
            $expense->value = $item["value"];
            $expense->date = $item["date"];
            $expense->expense_type_id = $item["expense_type_id"];
            $expense->save();
        }
    }
}
