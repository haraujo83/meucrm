<?php

namespace App\Models;

use App\Models\BaseModel;

use App\Traits\PaginateWithSearch;
use App\Traits\TraitBuilder;
use App\Traits\TraitCollection;

class Action extends BaseModel
{
    use PaginateWithSearch, TraitCollection, TraitBuilder;

    public $table = 'actions';
	public $fillable = ['text', 'action'];
	public $searchable = ['text', 'action'];

    public $timestamps = false;

    /**
     * Retorna os fields para montar a tabela do resultado
     * @param string $module
     * @param bool $permissionVisualize
     * @param bool $permissionEdit
     * @param bool $permissionDelete
     * @return array
     */
    public function returnActionsResult(String $module, bool $permissionVisualize = true, bool $permissionEdit = true, bool $permissionDelete = true): array
    {
        $actionsResult = [];

        if($permissionVisualize)
        {
            $actionVisualize = $this->returnActionVisualize($module);
            array_push($actionsResult, $actionVisualize);	
        }

        if($permissionEdit)
        {
            $actionEdit = $this->returnActionEdit($module);
            array_push($actionsResult, $actionEdit);	
        }

        if($permissionDelete)
        {
            $actionDelete = $this->returnActionDelete($module);
            array_push($actionsResult, $actionDelete);	
        }
        
        return $actionsResult;
    }

    /**
     * Retorna o action visualize
     * @param string $module
     * @return array
     */
    public function returnActionVisualize(String $module): array
    {
        $action = [
            'class' => 'btn btn-info btn-alterar',
            'title' => 'Visualizar',
            'icon' => 'fa fa-edit',
            'href' => '/'.$module.'/show/{id}'
        ];

        return $action;
    }

    /**
     * Retorna o action edit
     * @param string $module
     * @return array
     */
    public function returnActionEdit(String $module): array
    {
        $action = [
            'class' => 'btn btn-info btn-alterar',
            'title' => 'Editar',
            'icon' => 'fa fa-edit',
            'href' => '/'.$module.'/edit/{id}'
        ];

        return $action;
    }

    /**
     * Retorna o action delete
     * @param string $module
     * @return array
     */
    public function returnActionDelete(String $module): array
    {
        $action = [
            'class' => 'btn btn-danger btn-excluir',
            'title' => 'Excluir',
            'icon' => 'fa fa-trash',
            'href' => '/'.$module.'/destroy/{id}',
            'form' => [
                'method' => 'POST',
                'data-confirm' => 'Tem certeza que deseja excluir?'
            ],
        ];

        return $action;
    }

}
