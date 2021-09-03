<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class AuxListDivisao extends Migration
{
    /**
     * @param string $typeList
     * @return string
     */
    private function newTableName(string $typeList): string
    {
        return 'list_'.str_replace(['_list', '.'], ['', '_'], $typeList);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('aux_list')
            ->whereIn('type_list', ['', 'true_false2'])
            ->update([
                'deleted' => 1
            ]);

        $rows = DB::table('aux_list')
            ->where('deleted', '=', 0)
            ->orderBy('type_list')
            ->get()->toArray()
            ;

        foreach ($rows as $row) {
            $newTableName = $this->newTableName($row->type_list);

            if (!Schema::hasTable($newTableName)) {
                Schema::create($newTableName, function (Blueprint $table) {
                    $table->id();
                    $table->string('description');
                    $table->timestamps();
                    $table->timestamp('deleted_at')->nullable();
                    $table->integer('aux_list_id');
                });
            }

            DB::table($newTableName)
            ->insert([
                'description' => $row->descricao,
                'created_at' => Carbon::now(),
                'aux_list_id' => $row->id,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        $rows = DB::table('information_schema.tables')
            ->select('table_name')
            ->where('table_name', 'like', '%list_%')
            ->get()
        ;

        foreach ($rows as $row) {
            Schema::drop($row->TABLE_NAME);
        }
    }
}
