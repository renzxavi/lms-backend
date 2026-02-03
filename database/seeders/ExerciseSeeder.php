<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;
use App\Models\Lesson;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        // 🐱 MÓDULO 1: Aventura del Gatito
        $lesson1 = Lesson::create([
            'title' => '🐱 Aventura del Gatito',
            'description' => 'Ayuda al gatito a aprender sus primeras palabras',
            'order' => 1,
            'icon' => '🐱',
            'color' => '#FF6B9D'
        ]);

        Exercise::create([
            'title' => 'El Gatito Dice Hola',
            'description' => 'Haz que el gatito diga "¡Miau! Hola amigos"',
            'instructions' => 'Arrastra el bloque "imprimir" y escribe el mensaje del gatito.',
            'toolbox' => json_encode(['text', 'logic']),
            'expected_result' => 'miau hola amigos',
            'difficulty' => 'easy',
            'points' => 10,
            'lesson_id' => $lesson1->id,
            'character' => 'cat',
            'story' => 'El gatito quiere saludar a todos sus amigos. ¿Le ayudas?'
        ]);

        Exercise::create([
            'title' => 'Contando Ratones',
            'description' => 'El gatito encontró ratones. ¡Ayúdalo a contarlos!',
            'instructions' => 'Suma los ratones que encontró: 3 + 2. Usa bloques de matemáticas.',
            'toolbox' => json_encode(['math', 'text', 'logic']),
            'expected_result' => '5',
            'difficulty' => 'easy',
            'points' => 15,
            'lesson_id' => $lesson1->id,
            'character' => 'cat',
            'story' => 'El gatito vio 3 ratones en la cocina y 2 en el jardín. ¿Cuántos son en total?'
        ]);

        // 🐶 MÓDULO 2: El Perrito Explorador
        $lesson2 = Lesson::create([
            'title' => '🐶 El Perrito Explorador',
            'description' => 'Acompaña al perrito en su aventura por el parque',
            'order' => 2,
            'icon' => '🐶',
            'color' => '#4ECDC4'
        ]);

        Exercise::create([
            'title' => 'Caminata en el Parque',
            'description' => 'El perrito da 5 vueltas al parque',
            'instructions' => 'Usa un bloque de repetición "repetir 5 veces" con un mensaje dentro.',
            'toolbox' => json_encode(['loops', 'text', 'logic']),
            'expected_result' => '5',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson2->id,
            'character' => 'dog',
            'story' => 'Al perrito le encanta dar vueltas en el parque. ¡Ayúdalo a dar 5 vueltas!'
        ]);

        Exercise::create([
            'title' => '¿Está Lloviendo?',
            'description' => 'Si llueve, el perrito se queda en casa. Si no, sale a jugar.',
            'instructions' => 'Usa un bloque SI/ENTONCES para tomar una decisión.',
            'toolbox' => json_encode(['logic', 'text']),
            'expected_result' => 'casa',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson2->id,
            'character' => 'dog',
            'story' => 'Si está lloviendo, el perrito se queda en casa. Si no, sale a jugar.'
        ]);

        // 🦁 MÓDULO 3: El León Matemático
        $lesson3 = Lesson::create([
            'title' => '🦁 El León Matemático',
            'description' => 'Resuelve problemas con el rey de la selva',
            'order' => 3,
            'icon' => '🦁',
            'color' => '#FFD93D'
        ]);

        Exercise::create([
            'title' => 'La Comida del León',
            'description' => 'El león come 5 kilos por día. ¿Cuánto comerá en 7 días?',
            'instructions' => 'Multiplica 5 × 7 usando bloques de matemáticas.',
            'toolbox' => json_encode(['math', 'variables', 'text', 'logic']),
            'expected_result' => '35',
            'difficulty' => 'hard',
            'points' => 30,
            'lesson_id' => $lesson3->id,
            'character' => 'lion',
            'story' => 'El león come 5 kilos al día. ¿Cuánto comerá en 7 días?'
        ]);

        // 🐘 MÓDULO 4: El Elefante Sabio
        $lesson4 = Lesson::create([
            'title' => '🐘 El Elefante Sabio',
            'description' => 'Aprende patrones con el elefante más inteligente',
            'order' => 4,
            'icon' => '🐘',
            'color' => '#95E1D3'
        ]);

        Exercise::create([
            'title' => 'Memoria del Elefante',
            'description' => 'Imprime los números 1, 2, 3 usando un bucle',
            'instructions' => 'Crea un bucle que repita 3 veces e imprima el número de la vuelta.',
            'toolbox' => json_encode(['loops', 'math', 'text', 'variables']),
            'expected_result' => '3',
            'difficulty' => 'hard',
            'points' => 35,
            'lesson_id' => $lesson4->id,
            'character' => 'elephant',
            'story' => 'El elefante nunca olvida. ¿Puedes repetir su patrón favorito?'
        ]);

        // 🐰 MÓDULO 5: El Conejo Veloz
        $lesson5 = Lesson::create([
            'title' => '🐰 El Conejo Veloz',
            'description' => 'Carreras y desafíos con el conejo más rápido',
            'order' => 5,
            'icon' => '🐰',
            'color' => '#F38181'
        ]);

        Exercise::create([
            'title' => 'Carrera de Zanahorias',
            'description' => 'Cuenta hasta 10 zanahorias',
            'instructions' => 'Usa un bucle que repita 10 veces e imprime "zanahoria" cada vez.',
            'toolbox' => json_encode(['loops', 'logic', 'math', 'variables', 'text']),
            'expected_result' => '10',
            'difficulty' => 'hard',
            'points' => 40,
            'lesson_id' => $lesson5->id,
            'character' => 'rabbit',
            'story' => '¡Hay 10 zanahorias escondidas! Ayuda al conejo a encontrarlas todas.'
        ]);
    }
}