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
	public $fillable = [
        'text', 'action', 'class', 'icon'
    ];
	public $searchable = [
        'text', 'action', 'class', 'icon'
    ];

    public $timestamps = false;

    /**
     * Retorna os campos referentes para montar o botão de ação
     * @param int $id
     * @return array
     */
    public function returnFieldsResult(int $id): array
	{
		return self::query()
            ->where('id', '=', $id)
			->select('text', 'action', 'class', 'icon')
		    ->get()->toArray();
    }

    /**
     * Retorna os fields para montar a tabela do resultado
     * @param string $module
     * @param bool $permissionVisualize
     * @param bool $permissionEdit
     * @param bool $permissionDelete
     * @return array
     */
    public function returnActionsResult(String $module, int $id, bool $permissionVisualize = true, bool $permissionEdit = true, bool $permissionDelete = true): array
    {
        $actionsResult = [];

        if($permissionVisualize)
        {
            $idAction = 5;
            $actionVisualize = $this->returnAction($module, $id, $idAction);
            array_push($actionsResult, $actionVisualize);	
        }

        if($permissionEdit)
        {
            $idAction = 3;
            $actionEdit = $this->returnAction($module, $id, $idAction);
            array_push($actionsResult, $actionEdit);	
        }

        if($permissionDelete)
        {
            $idAction = 4;
            $actionDelete = $this->returnAction($module, $id, $idAction);
            array_push($actionsResult, $actionDelete);	
        }
        
        return $actionsResult;
    }

    /**
     * Retorna o action
     * @param string $module
     * @return array
     */
    public function returnAction(String $module, int $id,  int $idAction): array
    {
        $resultAction = $this->returnFieldsResult($idAction);

        $text = $resultAction['0']['text'];
        $action = $resultAction['0']['action'];
        $class = $resultAction['0']['class'];
        $icon = $resultAction['0']['icon'];

        $href = '/'.$module.'/'.$id;

        if($idAction == 3){
            $href .= '/'.$action;
        }

        $actionButton = [
            'class' => $class,
            'title' => $text,
            'icon' => $icon,
            'href' => $href
        ];

        //caso seja a ação de deletar
        if($idAction == 4){
            $actionForm = $this->returnActionDelete();
            $actionButton = array_merge($actionButton, $actionForm);
        }

        return $actionButton;
    }

    /**
     * Retorna o action delete
     * @return array
     */
    public function returnActionDelete(): array
    {
        $actionDelete = [
            'form' => [
                'method' => 'DELETE',
                'data-confirm' => 'Tem certeza que deseja excluir?'
            ],
        ];

        return $actionDelete;
    }

}
