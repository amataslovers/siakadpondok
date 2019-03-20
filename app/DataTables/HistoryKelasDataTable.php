<?php

namespace App\DataTables;

use App\Models\HistoryKelas;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class HistoryKelasDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'history_kelas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HistoryKelas $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HistoryKelas $model)
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
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px'])
            ->parameters([
                'dom'     => 'lfrtip',
                'order'   => [[0, 'desc']],
                
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'ID_KELAS',
            'ID_SEMESTER',
            'NIS'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'history_kelasdatatable_' . time();
    }
}
