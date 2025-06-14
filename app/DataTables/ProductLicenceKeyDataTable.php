<?php

namespace App\DataTables;

use App\Models\ProductLicenceKey;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTableAbstract; // Required for indexing



class ProductLicenceKeyDataTable extends DataTable
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
 $editBtn = "<a href='/admin/product-key-edit/".$query->id."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='/admin/product-key-delete/".$query->id."' onclick='return confirm(\"Are you sure?\")' class='btn btn-danger ml-2'><i class='far fa-trash-alt'></i></a>";

                return $editBtn.$deleteBtn;
            })
           ->addColumn('is_assigned', function($query){
    if ($query->assigned == "Y" && $query->user) {
        return '<div class="badge bg-success text-white">✔ Assigned to ' . e($query->user->name) . '</div>';
    } else {
        return '<div class="badge bg-secondary text-white">⏳ Not Assigned</div>';
    }
})
            ->rawColumns(['action','is_assigned'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
 public function query(ProductLicenceKey $model): QueryBuilder
{
    return $model->with('user')->latest()->newQuery();
}

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productlicencekey-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
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

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
           
             Column::make('DT_RowIndex')
              ->title('Id')
              ->searchable(false)
              ->orderable(false),

            Column::make('sr_no'),
            Column::make('product_key'),
            Column::make('is_assigned'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
             Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductLicenceKey_' . date('YmdHis');
    }
}