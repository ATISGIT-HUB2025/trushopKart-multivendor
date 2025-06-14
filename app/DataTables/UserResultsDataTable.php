<?php

namespace App\DataTables;

use App\Models\Result;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserResultsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('exam_name', function ($query) {
                return $query->exam->name;
            })
            ->addColumn('obtained_marks', function ($query) {
                return $query->obtained_marks . '/' . $query->exam->total_marks;
            })
            ->addColumn('status', function ($query) {
                if ($query->passed) {
                    return "<span class='badge bg-success'>Passed</span>";
                } else {
                    return "<span class='badge bg-danger'>Failed</span>";
                }
            })
            ->addColumn('date', function ($query) {
                return date('d-M-Y', strtotime($query->completed_at));
            })
            ->addColumn('action', function ($query) {
                return '<a href="' . route('user.results.download', $query->id) . '" class="btn btn-sm btn-primary">
                            <i class="fas fa-download"></i>
                        </a>';
            })
            ->addColumn('certificate', function ($query) {
                if ($query->exam->is_certificate && $query->passed) {
                    return '<a href="' . route('user.results.certificate.download', $query->id) . '" class="btn btn-sm btn-success">
                                <i class="fas fa-certificate"></i>
                            </a>';
                }
                return '';
            })
            ->rawColumns(['status', 'action', 'certificate'])
            ->setRowId('id');
    }


    public function query(Result $model): QueryBuilder
    {
        return $model::where('user_id', Auth::user()->id)->with('exam')->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-results-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle();
    }

    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('exam_name'),
            Column::make('total_questions'),
            Column::make('correct_answers'),
            Column::make('wrong_answers'),
            Column::make('obtained_marks'),
            Column::make('status'),
            Column::make('date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::computed('certificate')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'UserResults_' . date('YmdHis');
    }
}
