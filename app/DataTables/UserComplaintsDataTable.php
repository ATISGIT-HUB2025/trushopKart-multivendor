<?php

namespace App\DataTables;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserComplaintsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('status', function($query){
                $badges = [
                    'pending' => 'warning',
                    'in_progress' => 'info',
                    'resolved' => 'success'
                ];
                return '<span class="badge bg-'.$badges[$query->status].'">'
                    .ucfirst(str_replace('_', ' ', $query->status)).'</span>';
            })
            ->addColumn('image', function($query){
                return $query->image ? '<img src="'.asset($query->image).'" width="50px">' : 'N/A';
            })
            ->addColumn('created_at', function($query){
                return $query->created_at->format('d M Y');
            })
            ->rawColumns(['status', 'image'])
            ->setRowId('id');
    }

    public function query(Complaint $model): QueryBuilder
    {
        return $model->where('user_id', auth()->id())->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('complaints-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('subject'),
            Column::make('barcode'),
            Column::make('status'),
            Column::make('image'),
            Column::make('created_at'),
        ];
    }
}
