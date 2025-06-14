<?php

namespace App\DataTables;

use App\Models\PressRelease;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PressreleaseDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.pressrelease.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";

                $deleteBtn = "
                <form method='POST' action='" . route('admin.pressrelease.destroy', $query->id) . "' style='display:inline-block;' onsubmit='return confirm(\"Are you sure you want to delete this?\");'>
                    " . csrf_field() . "
                    <input type='hidden' name='_method' value='DELETE'>
                    <button type='submit' class='btn btn-danger ml-2'><i class='far fa-trash-alt'></i></button>
                </form>
                ";

                return $editBtn . $deleteBtn;
            })
            ->addColumn('image', function ($query) {
                return "<img width='100px' src='" . asset($query->image) . "' />";
            })
            ->addColumn('publish_date', function ($query) {
                return date('d-m-Y', strtotime($query->created_at));
            })
            ->addColumn('status', function ($query) {
                return '
                    <label class="custom-switch mt-2">
                        <input type="checkbox" ' . ($query->status ? 'checked' : '') . ' data-id="' . $query->id . '" class="custom-switch-input change-status">
                        <span class="custom-switch-indicator"></span>
                    </label>';
            })
            ->rawColumns(['action', 'image', 'status'])
            ->setRowId('id');
    }

    public function query(PressRelease $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('press_release-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
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
            Column::make('id'),
            Column::make('image')->title('Image'),
            Column::make('title')->title('Title'),
            Column::make('status')->title('Status'),
            Column::make('publish_date')->title('Publish Date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'PressReleases_' . date('YmdHis');
    }
}
