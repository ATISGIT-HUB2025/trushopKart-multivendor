<?php

namespace App\DataTables;

use App\Models\EventParticipant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserEventParticipationsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('event_title', function($query){
                return $query->event->title;
            })
            ->addColumn('event_date', function($query){
                return $query->event->start_datetime->format('d M Y, h:i A');
            })
            ->addColumn('event_location', function($query){
                return $query->event->location;
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
            ->addColumn('created_at', function($query){
                return $query->created_at->format('d M Y');
            })
            ->addColumn('action', function($query){
                return '<a href="'.route('event.details', $query->event_id).'" class="btn btn-sm btn-primary">
                    <i class="fas fa-eye"></i> View Event
                </a>';
            })
            ->rawColumns(['status', 'action'])
            ->setRowId('id');
    }

    public function query(EventParticipant $model): QueryBuilder
    {
        return $model->where('user_id', auth()->id())
            ->with('event')
            ->newQuery();
    }
    

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('event-participations-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(5, 'desc')
            ->selectStyleSingle();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('event_title')->title('Event'),
            Column::make('event_date')->title('Date & Time'),
            Column::make('event_location')->title('Location'),
            Column::make('status'),
            Column::make('created_at')->title('Registration Date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }
}
