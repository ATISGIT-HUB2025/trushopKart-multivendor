<?php

namespace App\DataTables;

use App\Models\Awards;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AwardsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addIndexColumn()
          ->addColumn('action', function($query){
    $editBtn = "<a href='".route('admin.awards.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";

    $deleteBtn = "
    <form method='POST' action='".route('admin.awards.destroy', $query->id)."' style='display:inline-block;' onsubmit='return confirm(\"Are you sure you want to delete this?\");'>
        ".csrf_field()."
        <input type='hidden' name='_method' value='DELETE'>
        <button type='submit' class='btn btn-danger ml-2'><i class='far fa-trash-alt'></i></button>
    </form>
    ";

    return $editBtn . $deleteBtn;
})

            ->addColumn('image', function($query){
            return "<img width='100px' src='".asset($query->image)."' ></img>";
            })
           
            ->addColumn('publish_date', function($query){
                return date('d-m-y', strtotime($query->created_at));
            })
           ->addColumn('status', function($query){
    if($query->status == 1){
        $button = '<label class="custom-switch mt-2">
            <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status" >
            <span class="custom-switch-indicator"></span>
        </label>';
    } else {
        $button = '<label class="custom-switch mt-2">
            <input type="checkbox" name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
            <span class="custom-switch-indicator"></span>
        </label>';
    }
    return $button;
})
            ->rawColumns(['action', 'image', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
  public function query(Awards $model): QueryBuilder
{
    return $model->newQuery();
}

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('awards-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
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

    
    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
            ->title('ID')
            ->searchable(false)
            ->orderable(false)
            ->width(30)
            ->addClass('text-center'),
            Column::make('image'),
            Column::make('title'),
            // Column::make('category'),
            Column::make('status'),
            // Column::make('publish_date'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Blog_' . date('YmdHis');
    }
}
