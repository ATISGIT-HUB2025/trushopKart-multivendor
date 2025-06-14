<?php

namespace App\DataTables;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ComplaintDataTable extends DataTable
{

    
public function dataTable(QueryBuilder $query): EloquentDataTable
{
    return (new EloquentDataTable($query))
        ->addColumn('student_name', function($query) {
            return $query->user ? $query->user->name : 'Guest User';
        })
        ->addColumn('student_email', function($query) {
            return $query->user ? $query->user->email : 'N/A';
        })
        ->addColumn('status', function($query) {
            $badges = [
                'pending' => 'warning',
                'in_progress' => 'info',
                'resolved' => 'success'
            ];
            return '<span class="badge bg-'.$badges[$query->status].'">'
                .ucfirst(str_replace('_', ' ', $query->status)).'</span>';
        })
        ->addColumn('action', function($query) {
            return '<a href="'.route('admin.complaints.show', $query->id).'" class="btn btn-primary btn-sm">View</a>';
        })
        ->rawColumns(['status', 'action'])
        ->setRowId('id');
}


    public function query(Complaint $model): QueryBuilder
    {
        return $model->with('user')->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('complaints-table')
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
            Column::make('student_name'),
            Column::make('student_email'),
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
