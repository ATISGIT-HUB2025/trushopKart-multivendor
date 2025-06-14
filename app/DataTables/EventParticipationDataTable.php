<?php

namespace App\DataTables;

use App\Models\EventParticipant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EventParticipationDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('user', function($query){
                return $query->user->name;
            })
            ->addColumn('email', function($query){
                return $query->user->email;
            })
            ->addColumn('event', function($query){
                return $query->event->title;
            })
            ->addColumn('event_date', function($query){
                return $query->event->start_datetime->format('d M Y, h:i A');
            })
            ->addColumn('status', function($query){
                $badges = [
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                    'attended' => 'info'
                ];
                return '<span class="badge bg-'.$badges[$query->status].'">'
                    .ucfirst($query->status).'</span>';
            })
            ->addColumn('registration_date', function($query){
                return $query->created_at->format('d M Y');
            })
            ->addColumn('action', function($query){
                return '<a href="'.route('admin.event-participations.show', $query->id).'" class="btn btn-primary btn-sm">
                    <i class="fas fa-eye"></i> View
                </a>';
            })
            ->rawColumns(['status', 'action'])
            ->setRowId('id');
    }

    public function query(EventParticipant $model): QueryBuilder
    {
        return $model->with(['user', 'event'])->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('event-participations-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(6, 'desc')
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
            Column::make('user'),
            Column::make('email'),
            Column::make('event'),
            Column::make('event_date'),
            Column::make('status'),
            Column::make('registration_date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }
}
