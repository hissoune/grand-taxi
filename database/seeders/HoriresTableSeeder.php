<?php

namespace Database\Seeders;


use App\Models\horaires;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HoriresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfRecords = 5;
        $timestamp = now()->addDay();
        for ($i = 0; $i < $numberOfRecords; $i++) {
            horaires::create(['created_at' => $timestamp]);
            $timestamp = $timestamp->addDay();
        }
    }
    }

