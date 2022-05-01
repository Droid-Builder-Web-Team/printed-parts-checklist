<?php

namespace App\DataTables;

use App\Models\Droid;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DroidDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('delete', '')
            ->editColumn(
                'delete',
                function ($row) {
                    $crudRoutePart = "user";
                    $parts = array('delete');
                    return view('components.datatablesActions', compact('row', 'crudRoutePart', 'parts'));
                }
            )
            // Make the droid name clickable to view that droid - RH
            ->editColumn('name', '<a href="#">{{$name}}</a>')
            ->rawColumns(['name', 'delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Droid $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Droid $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('droid-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->lengthMenu([15, 25, 50])
            ->orderBy(0)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name'),
            Column::make('description'),
            Column::make('image'),
            Column::computed('delete')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Droid_' . date('YmdHis');
    }
}
