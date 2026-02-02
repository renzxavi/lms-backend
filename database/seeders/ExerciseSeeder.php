<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $lesson1 = Lesson::create([
            'title' => 'Introducción a la Programación',
            'description' => 'Aprende los conceptos básicos de programación con bloques',
            'order' => 1,
        ]);

        Exercise::create([
            'lesson_id' => $lesson1->id,
            'title' => 'Suma Básica',
            'description' => 'Aprende a sumar dos números',
            'instructions' => 'Crea un bloque que sume 2 + 3 y obtenga como resultado 5',
            'difficulty' => 'beginner',
            'toolbox' => [
                'kind' => 'flyoutToolbox',
                'contents' => [
                    ['kind' => 'block', 'type' => 'math_number'],
                    ['kind' => 'block', 'type' => 'math_arithmetic'],
                ],
            ],
            'expected_result' => '5',
            'hints' => [
                'Usa el bloque de número para crear el 2',
                'Usa otro bloque de número para crear el 3',
                'Usa el bloque de operación matemática (+) para sumarlos',
            ],
            'points' => 10,
            'order' => 1,
        ]);

        Exercise::create([
            'lesson_id' => $lesson1->id,
            'title' => 'Multiplicación',
            'description' => 'Aprende a multiplicar números',
            'instructions' => 'Multiplica 4 × 5 para obtener 20',
            'difficulty' => 'beginner',
            'toolbox' => [
                'kind' => 'flyoutToolbox',
                'contents' => [
                    ['kind' => 'block', 'type' => 'math_number'],
                    ['kind' => 'block', 'type' => 'math_arithmetic'],
                ],
            ],
            'expected_result' => '20',
            'hints' => [
                'Necesitas dos bloques de números: 4 y 5',
                'Usa el bloque de operación matemática',
                'Cambia la operación a multiplicación (×)',
            ],
            'points' => 15,
            'order' => 2,
        ]);

        Exercise::create([
            'lesson_id' => $lesson1->id,
            'title' => 'Operaciones Combinadas',
            'description' => 'Combina suma y multiplicación',
            'instructions' => 'Calcula (2 + 3) × 4 para obtener 20',
            'difficulty' => 'intermediate',
            'toolbox' => [
                'kind' => 'flyoutToolbox',
                'contents' => [
                    ['kind' => 'block', 'type' => 'math_number'],
                    ['kind' => 'block', 'type' => 'math_arithmetic'],
                ],
            ],
            'expected_result' => '20',
            'hints' => [
                'Primero suma 2 + 3',
                'Luego multiplica el resultado por 4',
                'Puedes anidar bloques de operaciones',
            ],
            'points' => 20,
            'order' => 3,
        ]);

        Exercise::create([
            'lesson_id' => $lesson1->id,
            'title' => 'Desafío Final',
            'description' => 'Operación compleja',
            'instructions' => 'Calcula (10 - 5) × (3 + 2) para obtener 25',
            'difficulty' => 'intermediate',
            'toolbox' => [
                'kind' => 'flyoutToolbox',
                'contents' => [
                    ['kind' => 'block', 'type' => 'math_number'],
                    ['kind' => 'block', 'type' => 'math_arithmetic'],
                ],
            ],
            'expected_result' => '25',
            'hints' => [
                'Necesitas dos operaciones separadas',
                'Primero calcula (10 - 5)',
                'Luego calcula (3 + 2)',
                'Finalmente multiplica ambos resultados',
            ],
            'points' => 25,
            'order' => 4,
        ]);
    }
}