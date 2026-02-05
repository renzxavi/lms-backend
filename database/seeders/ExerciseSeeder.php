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
            'title' => 'EL GATITO DICE HOLA',
            'description' => 'Haz que el gatito diga "¡Miau! Hola amigos"',
            'instructions' => 'Arrastra el bloque "imprimir" y escribe el mensaje del gatito.',
            'toolbox' => json_encode(['text', 'logic']),
            'expected_result' => '¡Miau! Hola amigos',
            'difficulty' => 'easy',
            'points' => 10,
            'lesson_id' => $lesson1->id,
            'character' => 'cat',
            'story' => 'El gatito quiere saludar a todos sus amigos. ¿Le ayudas?',
            'help_video_url' => 'https://www.youtube.com/embed/eT7i6JSIPmI',
            'help_text' => '💡 **Pista:** Busca el bloque de "imprimir" en la caja de herramientas. Arrastra ese bloque al área de trabajo y escribe el mensaje dentro. ¡No olvides las palabras exactas que el gatito quiere decir!'
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
            'story' => 'El gatito vio 3 ratones en la cocina y 2 en el jardín. ¿Cuántos son en total?',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Necesitas usar un bloque de matemáticas para sumar. Busca el bloque que tiene el símbolo "+" y coloca los números 3 y 2. Luego, imprime el resultado para ver cuántos ratones hay en total.'
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
            'story' => 'Al perrito le encanta dar vueltas en el parque. ¡Ayúdalo a dar 5 vueltas!',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Los bucles (loops) te permiten repetir acciones. Busca el bloque "repetir" y configúralo para que se repita 5 veces. Dentro del bucle, coloca un bloque de imprimir para mostrar cada vuelta.'
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
            'story' => 'Si está lloviendo, el perrito se queda en casa. Si no, sale a jugar.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Las condiciones SI/ENTONCES te permiten tomar decisiones. Busca el bloque "si" y coloca una condición. Si la condición es verdadera, ejecuta una acción; si no, ejecuta otra diferente.'
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
            'story' => 'El león come 5 kilos al día. ¿Cuánto comerá en 7 días?',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** La multiplicación es una suma repetida. Busca el bloque de matemáticas y cambia la operación a multiplicación (×). Coloca 5 y 7 como los números a multiplicar, luego imprime el resultado.'
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
            'story' => 'El elefante nunca olvida. ¿Puedes repetir su patrón favorito?',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Necesitas un bucle con una variable. Crea una variable que comience en 1, usa un bucle que se repita 3 veces, y en cada vuelta imprime el valor de la variable y auméntala en 1.'
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
            'story' => '¡Hay 10 zanahorias escondidas! Ayuda al conejo a encontrarlas todas.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Crea un bucle que se repita exactamente 10 veces. Dentro del bucle, imprime la palabra "zanahoria". Al final, deberías ver 10 zanahorias en la consola. ¡Recuerda contar bien!'
        ]);
    }
}