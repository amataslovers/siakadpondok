<?php

namespace App\DataTables;

use App\Models\CatatanSpp;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CatatanSppDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'catatan_spps.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CatatanSpp $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CatatanSpp $model)
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
            'TANGGAL_BAYAR',
            'JENIS_PEMBAYARAN',
            'NO_REFERENSI',
            'KETERANGAN',
            'TOTAL_BAYAR'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'catatan_sppsdatatable_' . time();
    }
}
