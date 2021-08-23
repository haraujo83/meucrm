<?php

namespace App\Http\Controllers;

use App\Http\Requests\FieldsSearchModuleResultColumnsSaveRequest;
use App\Models\Field;
use App\Models\FieldSearch;
use DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 *
 */
class FieldsSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function moduleResultColumnsIndex(Request $request): View
    {
        $userId = 1;
        $module = $request->query('module');

        $field = new Field();
        $fieldsSearchListNotSelected = $field->getModuleFieldsListNotSelected($userId, $module);

        $fieldSearch = new FieldSearch();
        $fieldsSearchListSelected = $fieldSearch->getModuleFieldsListSelected($userId, $module);

        $viewData = compact(
            'module',
            'fieldsSearchListSelected',
            'fieldsSearchListNotSelected'
        );

        return view('fields-search.module-result-columns', $viewData);
    }

    /**
     * @param FieldsSearchModuleResultColumnsSaveRequest $request
     * @return JsonResponse
     */
    public function moduleResultColumnsSave(FieldsSearchModuleResultColumnsSaveRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $userId = 1;

        $query = 'delete from fields_search where user_id = ?';
        $b = [$userId];
        DB::update($query, $b);
        foreach ($validated['fields_search'] as $fieldId) {
            $fieldsSearch = new FieldSearch([
                'user_id' => $userId,
                'field_id' => $fieldId,
            ]);

            $fieldsSearch->save();
        }

        $r = [
            'success' => true,
            'msg' => 'Seleção de colunas foi gravada com sucesso',
        ];

        return response()->json($r);
    }
}
