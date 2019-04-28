<?php

namespace App\DataTables;

use App\Models\TenagaUmum;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TenagaUmumDataTable extends DataTable
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

        return $dataTable
            ->addColumn('action', 'tenaga_umums.datatables_actions')
            ->editColumn('TANGGAL_LAHIR', function ($query) {
                return $query->TANGGAL_LAHIR;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TenagaUmum $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TenagaUmum $model)
    {
        return $model->when(auth()->user()->hasRole('tenaga-umum'), function ($q) {
            $q->where('NIP', auth()->user()->name);
        })->newQuery();
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
            'NIP' => ['title' => 'NIP'],
            'NAMA' => ['title' => 'Nama'],
            'TEMPAT_LAHIR' => ['title' => 'Tempat Lahir'],
            'TANGGAL_LAHIR' => ['title' => 'Tanggal Lahir'],
            'ALAMAT' => ['title' => 'Alamat'],
            'NOTELP' => ['title' => 'No Telepon']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tenaga_umumsdatatable_' . time();
    }
}
