<?php

namespace App\DataTables;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TransactionDataTable extends DataTable
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
            ->addColumn('action', 'transaction.action')
           ->addColumn('invoice_id', function ($query) {
    // $query->order is already an array-like JSON string? Then decode it
    $order = is_string($query->order) ? json_decode($query->order) : $query->order;

    if ($order && isset($order->invocie_id)) {
        return '#' . $order->invocie_id;
    }

    return 'N/A';
})
->addColumn('gst', function ($query) {
    return number_format($query->amount - ($query->amount / 1.18), 2) ;
})

            ->addColumn('amount_in_base_currency', function ($query) {
                return isset($query->order->currency_name)
                    ? $query->amount . ' ' . $query->order->currency_name
                    : 'N/A';
            })
            ->addColumn('amount_in_real_currency', function ($query) {
                return isset($query->amount_real_currency, $query->amount_real_currency_name)
                    ? $query->amount_real_currency . ' ' . $query->amount_real_currency_name
                    : 'N/A';
            })
            ->addColumn('payment_method', function ($query) {
                return $query->payment_method == "inr" ? "INR" : $query->payment_method ;
            })

            ->filterColumn('invoice_id', function ($query, $keyword) {
                $query->whereHas('order', function ($subQuery) use ($keyword) {
                    $subQuery->where('invoice_id', 'like', "%$keyword%");
                });
            });
            // ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Transaction $model): QueryBuilder
    {
        return $model->latest()->with('order')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('transaction-table')
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

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
             Column::computed('DT_RowIndex')
            ->title('SN')
            ->searchable(false)
            ->orderable(false),
            // Column::make('id'),
            Column::make('invoice_id')->title('Invoice ID'),
            Column::make('transaction_id')->title('Transaction ID'),
            Column::make('gst')->title('GST'),
            Column::make('payment_method')->title('Payment Method'),
            Column::make('amount_in_base_currency')->title('Amount'),
            // // Column::make('amount_in_real_currency')->title('Amount (Real Currency)'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Transaction_' . date('YmdHis');
    }
}
