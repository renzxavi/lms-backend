<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;
use App\Models\Lesson;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear lección
        $lesson1 = Lesson::create([
            'title' => 'Introducción a la programación',
            'description' => 'Conceptos básicos de programación con bloques',
            'order' => 1,
        ]);

        // Toolbox por defecto
        $defaultToolbox = json_encode([
            'logic',
            'loops',
            'math',
            'text',
            'variables'
        ]);

        // Crear ejercicios
        Exercise::create([
            'title' => 'Hola Mundo con Bloques',
            'description' => 'Crea tu primer programa usando bloques que imprima "Hola Mundo"',
            'instructions' => 'Arrastra el bloque imprimir y escribe el texto "Hola Mundo".',
            'toolbox' => $defaultToolbox,
            'expected_result' => 'Hola Mundo',
            'difficulty' => 'easy',
            'points' => 10,
            'lesson_id' => $lesson1->id,
        ]);

        Exercise::create([
            'title' => 'Suma de dos números',
            'description' => 'Usa bloques para sumar dos números y mostrar el resultado',
            'instructions' => 'Crea dos variables, súmalas y muestra el resultado.',
            'toolbox' => $defaultToolbox,
            'expected_result' => 'Resultado de la suma',
            'difficulty' => 'easy',
            'points' => 15,
            'lesson_id' => $lesson1->id,
        ]);

        Exercise::create([
            'title' => 'Bucle simple',
            'description' => 'Crea un bucle que repita una acción 5 veces',
            'instructions' => 'Usa un bloque de repetición para ejecutar una acción 5 veces.',
            'toolbox' => $defaultToolbox,
            'expected_result' => 'Acción repetida 5 veces',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson1->id,
        ]);

        Exercise::create([
            'title' => 'Condicionales',
            'description' => 'Usa bloques if/else para tomar decisiones',
            'instructions' => 'Muestra mensajes distintos según una condición.',
            'toolbox' => $defaultToolbox,
            'expected_result' => 'Mensaje según condición',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson1->id,
        ]);

        Exercise::create([
            'title' => 'Función personalizada',
            'description' => 'Crea una función que calcule el área de un rectángulo',
            'instructions' => 'Define una función que reciba base y altura.',
            'toolbox' => $defaultToolbox,
            'expected_result' => 'Área calculada correctamente',
            'difficulty' => 'hard',
            'points' => 30,
            'lesson_id' => $lesson1->id,
        ]);
    }
}
