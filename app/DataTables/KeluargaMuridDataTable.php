<?php

namespace App\DataTables;

use App\Models\KeluargaMurid;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class KeluargaMuridDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'keluarga_murids.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KeluargaMurid $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KeluargaMurid $model)
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
            'ID_JENIS_KELUARGA',
            'ID_AGAMA',
            'NAMA',
            'TANGGAL_LAHIR',
            'TEMPAT_LAHIR',
            'ALAMAT',
            'EMAIL',
            'NOTELP',
            'PEKERJAAN'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'keluarga_muridsdatatable_' . time();
    }
}
