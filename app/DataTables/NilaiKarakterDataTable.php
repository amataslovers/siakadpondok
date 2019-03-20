<?php

namespace App\DataTables;

use App\Models\NilaiKarakter;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class NilaiKarakterDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'nilai_karakters.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NilaiKarakter $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(NilaiKarakter $model)
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
            'ID_HISTORY_KELAS',
            'IJIN',
            'SAKIT',
            'ALFA',
            'AKHLAQ',
            'KEBERSIHAN',
            'KERAJINAN'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'nilai_karaktersdatatable_' . time();
    }
}
