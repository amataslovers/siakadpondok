<?php

namespace App\DataTables;

use App\Models\Peraturan;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PeraturanDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'peraturans.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Peraturan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Peraturan $model)
    {
        return $model
            ->with('sanksi')
            ->newQuery();
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
                'language' => [
                    'buttons' => [
                        'colvis' => 'Ganti Kolom'
                    ],
                    'search' => 'Cari:',
                    'zeroRecords' => 'Data tidak ditemukan',
                    'paginate' => [
                        'first' => 'Awal',
                        'last' => 'Terakhir',
                        'next' => 'Selanjutnya',
                        'previous' => 'Sebelumnya'
                    ],
                ],

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
            'ID_SANKSI' => ['title' => 'Sanksi', 'name' => 'sanksi.NAMA_SANKSI', 'data' => 'sanksi.NAMA_SANKSI'],
            'NAMA_PERATURAN' => ['title' => 'Peraturan']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'peraturansdatatable_' . time();
    }
}
