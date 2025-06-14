<?php

namespace App\DataTables;

use App\Models\HelpInquiry;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class HelpInquiryDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                return '<a href="'.route('admin.help-inquiries.show', $query->id).'" class="btn btn-primary btn-sm">Details</a>';
            })
            ->addColumn('status', function($query){
                if($query->is_read){
                    return '<span class="badge bg-success">Read</span>';
                }
                return '<span class="badge bg-warning">Unread</span>';
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    public function query(HelpInquiry $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('helpinquiry-table')
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

    protected function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('category'),
            Column::make('full_name'),
            Column::make('email'),
            Column::make('subject'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }
}
