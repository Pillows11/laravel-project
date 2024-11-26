<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gradeName = fake()->unique()->randomElement([
            'X PPLG 1', 'X PPLG 2', 'XI PPLG 1', 'XI PPLG 2', 'XII PPLG 1', 'XII PPLG 2',
            'X Animasi 1', 'X Animasi 2', 'X Animasi 3', 'X Animasi 4', 'X Animasi 5',
            'XI Animasi 1', 'XI Animasi 2', 'XI Animasi 3', 'XI Animasi 4', 'XI Animasi 5',
            'XII Animasi 1', 'XII Animasi 2', 'XII Animasi 3', 'XII Animasi 4', 'XII Animasi 5',
            'X Teknik Grafika 1', 'X Teknik Grafika 2', 'XI Teknik Grafika 1', 'XI Teknik Grafika 2',
            'XII Teknik Grafika 1', 'XII Teknik Grafika 2', 'X DKV 1', 'X DKV 2', 'XI DKV 1',
            'XI DKV 2', 'XII DKV 1', 'XII DKV 2',
        ]);

        $departmentId = null;

        if (str_contains($gradeName, 'PPLG')) {
            $departmentId = Departement::where('nama', 'PPLG')->value('id');
        } elseif (preg_match('/Animasi (1|2|3)/', $gradeName)) {
            $departmentId = Departement::where('nama', 'ANIMASI 3D')->value('id');
        } elseif (preg_match('/Animasi (4|5)/', $gradeName)) {
            $departmentId = Departement::where('nama', 'ANIMASI 2D')->value('id');
        } elseif (str_contains($gradeName, 'Teknik Grafika')) {
            $departmentId = Departement::where('nama', 'TG')->value('id');
        } elseif (str_contains($gradeName, 'DKV')) {
            $departmentId = Departement::where('nama', 'DG')->value('id');
        }

        return [
            'nama' => $gradeName,
            'departement_id' => $departmentId,
        ];
    }
}
