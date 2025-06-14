<?php

namespace App\DataTables;

use App\Models\ExamCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ExamCategoryDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
               $editBtn = "<a href='".route('admin.exam-category.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
               $deleteBtn = "<a href='".route('admin.exam-category.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

               return $editBtn.$deleteBtn;
            })
            ->addColumn('logo', function($query){
              return $img = "<img width='100px' src='".asset($query->logo)."'></img>";
            })
            ->addColumn('status', function($query){
                $active = '<i class="badge badge-success">Active</i>';
                $inActive = '<i class="badge badge-danger">Inactive</i>';
                return $query->status == 1 ? $active : $inActive;
            })
            ->rawColumns(['logo', 'action', 'status'])
            ->setRowId('id');
    }

    public function query(ExamCategory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('exam-category-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->width(60),
            Column::make('logo')->width(200),
            Column::make('name'),
            Column::make('exam_date'),
            Column::make('duration'),
            Column::make('medium'),
            Column::make('total_marks'),
            Column::make('serial'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'ExamCategory_' . date('YmdHis');
    }
}
