<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-view',
            'role-create',
            'role-edit',
            'role-delete',
            'agama-view',
            'agama-create',
            'agama-edit',
            'agama-delete',
            'catatan-spp-view',
            'catatan-spp-create',
            'catatan-spp-edit',
            'catatan-spp-delete',
            'detail-keluarga-view',
            'detail-keluarga-create',
            'detail-keluarga-edit',
            'detail-keluarga-delete',
            'guru-view',
            'guru-create',
            'guru-edit',
            'guru-delete',
            'history-kelas-view',
            'history-kelas-create',
            'history-kelas-edit',
            'history-kelas-delete',
            'jenis-keluarga-view',
            'jenis-keluarga-create',
            'jenis-keluarga-edit',
            'jenis-keluarga-delete',
            'kelas-view',
            'kelas-create',
            'kelas-edit',
            'kelas-delete',
            'keluarga-murid-view',
            'keluarga-murid-create',
            'keluarga-murid-edit',
            'keluarga-murid-delete',
            'mata-pelajaran-view',
            'mata-pelajaran-create',
            'mata-pelajaran-edit',
            'mata-pelajaran-delete',
            'murid-view',
            'murid-create',
            'murid-edit',
            'murid-delete',
            'nilai-akademik-view',
            'nilai-akademik-create',
            'nilai-akademik-edit',
            'nilai-akademik-delete',
            'nilai-karakter-view',
            'nilai-karakter-create',
            'nilai-karakter-edit',
            'nilai-karakter-delete',
            'pelanggaran-murid-view',
            'pelanggaran-murid-create',
            'pelanggaran-murid-edit',
            'pelanggaran-murid-delete',
            'pengampu-view',
            'pengampu-create',
            'pengampu-edit',
            'pengampu-delete',
            'peraturan-view',
            'peraturan-create',
            'peraturan-edit',
            'peraturan-delete',
            'perizinan-murid-view',
            'perizinan-murid-create',
            'perizinan-murid-edit',
            'perizinan-murid-delete',
            'sanksi-view',
            'sanksi-create',
            'sanksi-edit',
            'sanksi-delete',
            'semester-view',
            'semester-create',
            'semester-edit',
            'semester-delete',
            'tahun-ajaran-view',
            'tahun-ajaran-create',
            'tahun-ajaran-edit',
            'tahun-ajaran-delete',
            'tenaga-umum-view',
            'tenaga-umum-create',
            'tenaga-umum-edit',
            'tenaga-umum-delete',
            'tingkat-view',
            'tingkat-create',
            'tingkat-edit',
            'tingkat-delete',
            'user-view',
            'user-create',
            'user-edit',
            'user-delete'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
