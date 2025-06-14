<?php

namespace App\DataTables;

use App\Models\BankAccount;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StudentAccountDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                return '<a href="'.route('admin.student-accounts.show', $query->id).'" class="btn btn-primary btn-sm">Details</a>';
            })
            ->addColumn('user_name', function($query){
                return $query->user->name;
            })
            ->addColumn('user_email', function($query){
                return $query->user->email;
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(BankAccount $model): QueryBuilder
    {
        return $model->newQuery()->with('user');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('student-accounts-table')
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
            Column::make('user_name')->title('Student Name'),
            Column::make('user_email')->title('Email'),
            Column::make('account_holder_name'),
            Column::make('bank_name'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }
}
