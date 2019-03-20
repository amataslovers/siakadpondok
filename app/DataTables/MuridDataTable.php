<?php

namespace App\DataTables;

use App\Models\Murid;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MuridDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'murids.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Murid $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Murid $model)
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
                'scrollX' => 'true',
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
                'initComplete' => 'function () {
                    this.api().columns().every(
                        function () {
                            var column = this;
                            var input = document.createElement("input");
                            $(input).appendTo(
                                $(column.footer()).empty()).on(\'change\', 
                                function () {
                                    column.search($(this).val(), false, false, true).draw();
                                }
                            );
                        }
                    );
                }',
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
            'ID_AGAMA' => ['title' => 'Agama'],
            'NAMA' => ['title' => 'Nama'],
            'NAMA_ARAB' => ['title' => 'Nama Arab'],
            'JENIS_KELAMIN' => ['title' => 'Gender'],
            'TEMPAT_LAHIR' => ['title' => 'Tempat Lahir'],
            'TANGGAL_LAHIR' => ['title' => 'Tgl Lahir'],
            'ALAMAT',
            'EMAIL',
            'NOTELP',
            'NAMA_ASAL_SEKOLAH',
            'ALAMAT_ASAL_SEKOLAH',
            'IJAZAH_SD',
            'IJAZAH_SMP',
            'IJAZAH_SMA',
            'TANGGAL_MASUK',
            'TANGGAL_KELUAR',
            'ANGKATAN',
            'FOTO_AKTE_LAHIR',
            'FOTO',
            'STATUS_AKTIF'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'muridsdatatable_' . time();
    }
}
