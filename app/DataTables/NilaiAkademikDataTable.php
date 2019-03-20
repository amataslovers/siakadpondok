<?php

namespace App\DataTables;

use App\Models\NilaiAkademik;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class NilaiAkademikDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'nilai_akademiks.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NilaiAkademik $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(NilaiAkademik $model)
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
            'ID_PENGAMPU',
            'NIS',
            'ID_SEMESTER',
            'NILAI_UTS',
            'NILAI_UAS'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'nilai_akademiksdatatable_' . time();
    }
}
