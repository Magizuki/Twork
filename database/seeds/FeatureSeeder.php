<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('msfeature')->insert([
            'FeatureName'=>'Photoshop',
            'AuditUsername'=>'Admin',
            'AuditTime'=>Carbon::now()->toDateTimeString(),
            'AuditActivity'=>'I',
        ]);
        DB::table('msfeature')->insert([
            'FeatureName'=>'Ms Word',
            'AuditUsername'=>'Admin',
            'AuditTime'=>Carbon::now()->toDateTimeString(),
            'AuditActivity'=>'I',
        ]);
        DB::table('msfeature')->insert([
            'FeatureName'=>'Ms Excel',
            'AuditUsername'=>'Admin',
            'AuditTime'=>Carbon::now()->toDateTimeString(),
            'AuditActivity'=>'I',
        ]);
        DB::table('msfeature')->insert([
            'FeatureName'=>'Eclipse',
            'AuditUsername'=>'Admin',
            'AuditTime'=>Carbon::now()->toDateTimeString(),
            'AuditActivity'=>'I',
        ]);
        DB::table('msfeature')->insert([
            'FeatureName'=>'Laravel',
            'AuditUsername'=>'Admin',
            'AuditTime'=>Carbon::now()->toDateTimeString(),
            'AuditActivity'=>'I',
        ]);
    }
}
