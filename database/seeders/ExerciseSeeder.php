<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;
use App\Models\Lesson;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        // 🐱 MÓDULO 1: Aventura del Gatito (Introducción - FÁCIL)
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
            'points' => 10,
            'lesson_id' => $lesson1->id,
            'character' => 'cat',
            'story' => 'El gatito vio 3 ratones en la cocina y 2 en el jardín. ¿Cuántos son en total?',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Necesitas usar un bloque de matemáticas para sumar. Busca el bloque que tiene el símbolo "+" y coloca los números 3 y 2. Luego, imprime el resultado para ver cuántos ratones hay en total.'
        ]);

        Exercise::create([
            'title' => 'La Siesta del Gatito',
            'description' => 'Aprende qué es una variable viendo este video',
            'instructions' => 'Mira el video para entender cómo guardar información.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson1->id,
            'character' => 'cat',
            'story' => 'El gatito necesita recordar cuántas siestas tomó hoy.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Mira el video completo para aprender sobre variables. No hay código que escribir en este ejercicio.'
        ]);

        Exercise::create([
            'title' => 'Nombre del Gatito',
            'description' => 'Guarda el nombre del gatito en una variable',
            'instructions' => 'Crea una variable llamada "nombre" con el valor "Michi".',
            'toolbox' => json_encode(['variables', 'text']),
            'expected_result' => 'Michi',
            'difficulty' => 'easy',
            'points' => 10,
            'lesson_id' => $lesson1->id,
            'character' => 'cat',
            'story' => 'El gatito se llama Michi. Vamos a guardar su nombre.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Crea una variable, nómbrala "nombre" y asígnale el texto "Michi". Luego imprime esa variable.'
        ]);

        Exercise::create([
            'title' => 'Edad del Gatito',
            'description' => 'El gatito cumple años cada año',
            'instructions' => 'Crea una variable "edad" con valor 2, luego súmale 1.',
            'toolbox' => json_encode(['variables', 'math', 'text']),
            'expected_result' => '3',
            'difficulty' => 'easy',
            'points' => 10,
            'lesson_id' => $lesson1->id,
            'character' => 'cat',
            'story' => 'Michi tiene 2 años, pero hoy es su cumpleaños.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Crea una variable "edad" = 2. Luego cámbiala a edad + 1 e imprime el resultado.'
        ]);

        Exercise::create([
            'title' => 'El Juego del Gatito',
            'description' => 'Resta 5 - 2 para saber cuántos juguetes quedan',
            'instructions' => 'El gatito tenía 5 juguetes y perdió 2.',
            'toolbox' => json_encode(['math', 'text']),
            'expected_result' => '3',
            'difficulty' => 'easy',
            'points' => 10,
            'lesson_id' => $lesson1->id,
            'character' => 'cat',
            'story' => 'Ayuda al gatito a contar sus juguetes.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Usa el bloque de resta (-). 5 - 2 = ?'
        ]);

        Exercise::create([
            'title' => 'Mensaje Personalizado',
            'description' => 'Une dos textos: "Miau" y "Michi"',
            'instructions' => 'Concatena los textos con un espacio en medio.',
            'toolbox' => json_encode(['text']),
            'expected_result' => 'Miau Michi',
            'difficulty' => 'easy',
            'points' => 10,
            'lesson_id' => $lesson1->id,
            'character' => 'cat',
            'story' => 'El gatito quiere decir su nombre completo.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Une "Miau" + " " + "Michi".'
        ]);

        // 🐶 MÓDULO 2: El Perrito Explorador (Bucles y Condiciones - FÁCIL/MEDIO)
        $lesson2 = Lesson::create([
            'title' => '🐶 El Perrito Explorador',
            'description' => 'Acompaña al perrito en su aventura por el parque',
            'order' => 2,
            'icon' => '🐶',
            'color' => '#4ECDC4'
        ]);

        Exercise::create([
            'title' => 'Aprende sobre Bucles',
            'description' => 'Video explicativo sobre repeticiones',
            'instructions' => 'Mira el video para entender cómo funcionan los bucles.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson2->id,
            'character' => 'dog',
            'story' => 'Los bucles son muy útiles. ¡Aprende más sobre ellos!',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Observa cómo los bucles repiten instrucciones automáticamente.'
        ]);

        Exercise::create([
            'title' => 'Ladridos del Perrito',
            'description' => 'Haz que el perrito ladre 3 veces',
            'instructions' => 'Usa un bucle que repita "¡Guau!" 3 veces.',
            'toolbox' => json_encode(['loops', 'text']),
            'expected_result' => '3',
            'difficulty' => 'easy',
            'points' => 15,
            'lesson_id' => $lesson2->id,
            'character' => 'dog',
            'story' => 'El perrito quiere saludar ladrando 3 veces.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Crea un bucle que se repita 3 veces e imprime "¡Guau!" en cada iteración.'
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
            'points' => 20,
            'lesson_id' => $lesson2->id,
            'character' => 'dog',
            'story' => 'Si está lloviendo, el perrito se queda en casa. Si no, sale a jugar.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Las condiciones SI/ENTONCES te permiten tomar decisiones. Busca el bloque "si" y coloca una condición. Si la condición es verdadera, ejecuta una acción; si no, ejecuta otra diferente.'
        ]);

        Exercise::create([
            'title' => 'Contando Pasos',
            'description' => 'El perrito camina y cuenta sus pasos del 1 al 10',
            'instructions' => 'Usa un bucle con una variable que vaya de 1 a 10.',
            'toolbox' => json_encode(['loops', 'variables', 'math', 'text']),
            'expected_result' => '10',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson2->id,
            'character' => 'dog',
            'story' => 'El perrito cuenta cada paso que da. Ayúdalo a contar hasta 10.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Crea una variable "paso" = 1. En un bucle de 10 veces, imprime la variable y auméntala en 1.'
        ]);

        Exercise::create([
            'title' => 'Decisiones del Perrito',
            'description' => 'Si tiene hambre, come. Si no, juega.',
            'instructions' => 'Usa una condición para decidir qué hace el perrito.',
            'toolbox' => json_encode(['logic', 'text', 'variables']),
            'expected_result' => 'come',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson2->id,
            'character' => 'dog',
            'story' => 'El perrito tiene hambre. ¿Qué debería hacer?',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Crea una variable "hambre" = verdadero. Si es verdadero, imprime "come", sino "juega".'
        ]);

        Exercise::create([
            'title' => 'Saltos del Perrito',
            'description' => 'El perrito salta 8 veces',
            'instructions' => 'Usa un bucle que repita "salto" 8 veces.',
            'toolbox' => json_encode(['loops', 'text']),
            'expected_result' => '8',
            'difficulty' => 'easy',
            'points' => 15,
            'lesson_id' => $lesson2->id,
            'character' => 'dog',
            'story' => '¡El perrito está muy activo hoy!',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Repite 8 veces e imprime "salto".'
        ]);

        // 🦁 MÓDULO 3: El León Matemático (Operaciones - MEDIO)
        $lesson3 = Lesson::create([
            'title' => '🦁 El León Matemático',
            'description' => 'Resuelve problemas con el rey de la selva',
            'order' => 3,
            'icon' => '🦁',
            'color' => '#FFD93D'
        ]);

        Exercise::create([
            'title' => 'Video: Matemáticas Avanzadas',
            'description' => 'Aprende sobre multiplicación y división',
            'instructions' => 'Mira este video educativo sobre operaciones.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson3->id,
            'character' => 'lion',
            'story' => 'El león te enseña matemáticas avanzadas.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Presta atención a las operaciones matemáticas.'
        ]);

        Exercise::create([
            'title' => 'La Comida del León',
            'description' => 'El león come 5 kilos por día. ¿Cuánto comerá en 7 días?',
            'instructions' => 'Multiplica 5 × 7 usando bloques de matemáticas.',
            'toolbox' => json_encode(['math', 'text']),
            'expected_result' => '35',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson3->id,
            'character' => 'lion',
            'story' => 'El león come 5 kilos al día. ¿Cuánto comerá en 7 días?',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** La multiplicación es una suma repetida. Busca el bloque de matemáticas y cambia la operación a multiplicación (×). Coloca 5 y 7 como los números a multiplicar, luego imprime el resultado.'
        ]);

        Exercise::create([
            'title' => 'División de Presas',
            'description' => 'El león tiene 20 presas para compartir con 4 leones.',
            'instructions' => 'Divide 20 ÷ 4.',
            'toolbox' => json_encode(['math', 'text']),
            'expected_result' => '5',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson3->id,
            'character' => 'lion',
            'story' => 'Hay 20 presas y 4 leones. ¿Cuántas presas le tocan a cada uno?',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Usa el bloque de división (÷). Divide 20 entre 4.'
        ]);

        Exercise::create([
            'title' => 'Comparando Fuerzas',
            'description' => '¿Es 10 mayor que 5?',
            'instructions' => 'Usa un operador de comparación (>).',
            'toolbox' => json_encode(['logic', 'math', 'text']),
            'expected_result' => 'true',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson3->id,
            'character' => 'lion',
            'story' => 'El león quiere saber si 10 es mayor que 5.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Usa el operador > para comparar. Imprime el resultado (verdadero o falso).'
        ]);

        Exercise::create([
            'title' => 'Resto de la División',
            'description' => '23 presas entre 5 leones. ¿Cuántas sobran?',
            'instructions' => 'Usa el operador módulo (%) para encontrar el resto.',
            'toolbox' => json_encode(['math', 'text']),
            'expected_result' => '3',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson3->id,
            'character' => 'lion',
            'story' => 'Al dividir 23 presas entre 5 leones, ¿cuántas sobran?',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** El operador módulo (%) te da el resto de una división. 23 % 5 = ?'
        ]);

        Exercise::create([
            'title' => 'Potencia del Rugido',
            'description' => 'El león ruge con potencia 2^3',
            'instructions' => 'Calcula 2 elevado a la 3.',
            'toolbox' => json_encode(['math', 'text']),
            'expected_result' => '8',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson3->id,
            'character' => 'lion',
            'story' => 'La potencia del rugido es 2³. ¿Cuánto es?',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Usa la operación de potencia. 2^3 significa 2×2×2.'
        ]);

        Exercise::create([
            'title' => 'Doble Fuerza',
            'description' => 'Multiplica 6 × 2',
            'instructions' => 'El león duplica su fuerza.',
            'toolbox' => json_encode(['math', 'text']),
            'expected_result' => '12',
            'difficulty' => 'easy',
            'points' => 15,
            'lesson_id' => $lesson3->id,
            'character' => 'lion',
            'story' => 'El león se hace más fuerte.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** 6 × 2 = ?'
        ]);

        // 🐘 MÓDULO 4: El Elefante Sabio (Patrones y Lógica - MEDIO)
        $lesson4 = Lesson::create([
            'title' => '🐘 El Elefante Sabio',
            'description' => 'Aprende patrones con el elefante más inteligente',
            'order' => 4,
            'icon' => '🐘',
            'color' => '#95E1D3'
        ]);

        Exercise::create([
            'title' => 'Video: Lógica Booleana',
            'description' => 'Aprende sobre verdadero y falso',
            'instructions' => 'Mira el video sobre operadores lógicos.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson4->id,
            'character' => 'elephant',
            'story' => 'La lógica booleana es la base de la programación.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Entiende cómo funciona AND, OR y NOT.'
        ]);

        Exercise::create([
            'title' => 'Memoria del Elefante',
            'description' => 'Imprime los números 1, 2, 3 usando un bucle',
            'instructions' => 'Crea un bucle que repita 3 veces e imprima el número de la vuelta.',
            'toolbox' => json_encode(['loops', 'math', 'text', 'variables']),
            'expected_result' => '3',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson4->id,
            'character' => 'elephant',
            'story' => 'El elefante nunca olvida. ¿Puedes repetir su patrón favorito?',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Necesitas un bucle con una variable. Crea una variable que comience en 1, usa un bucle que se repita 3 veces, y en cada vuelta imprime el valor de la variable y auméntala en 1.'
        ]);

        Exercise::create([
            'title' => 'Operador AND',
            'description' => '¿Es verdadero que 5>3 Y 2<4?',
            'instructions' => 'Usa el operador AND (&&) para combinar condiciones.',
            'toolbox' => json_encode(['logic', 'math', 'text']),
            'expected_result' => 'true',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson4->id,
            'character' => 'elephant',
            'story' => 'El elefante quiere verificar DOS condiciones a la vez.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Combina (5 > 3) AND (2 < 4). Ambas deben ser verdaderas.'
        ]);

        Exercise::create([
            'title' => 'Operador OR',
            'description' => '¿Es verdadero que 5<3 O 2<4?',
            'instructions' => 'Usa el operador OR (||).',
            'toolbox' => json_encode(['logic', 'math', 'text']),
            'expected_result' => 'true',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson4->id,
            'character' => 'elephant',
            'story' => 'Con OR, basta que UNA condición sea verdadera.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Combina (5 < 3) OR (2 < 4). Al menos una debe ser verdadera.'
        ]);

        Exercise::create([
            'title' => 'Negación NOT',
            'description' => 'Invierte el valor de verdadero',
            'instructions' => 'Usa el operador NOT (!).',
            'toolbox' => json_encode(['logic', 'text']),
            'expected_result' => 'false',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson4->id,
            'character' => 'elephant',
            'story' => 'El operador NOT invierte verdadero a falso y viceversa.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** NOT(verdadero) = falso. Usa ! para negar.'
        ]);

        Exercise::create([
            'title' => 'Números Pares',
            'description' => 'Imprime solo los números pares del 2 al 10',
            'instructions' => 'Usa un bucle y una condición para filtrar pares.',
            'toolbox' => json_encode(['loops', 'logic', 'math', 'variables', 'text']),
            'expected_result' => '10',
            'difficulty' => 'hard',
            'points' => 30,
            'lesson_id' => $lesson4->id,
            'character' => 'elephant',
            'story' => 'Al elefante le gustan solo los números pares.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Usa un bucle de 1 a 10. En cada vuelta, verifica si el número % 2 == 0 (es par). Si es par, imprímelo.'
        ]);

        Exercise::create([
            'title' => 'Secuencia Fibonacci Simple',
            'description' => 'Genera los primeros 5 números: 1,1,2,3,5',
            'instructions' => 'Usa variables y bucles para generar la secuencia.',
            'toolbox' => json_encode(['loops', 'variables', 'math', 'text']),
            'expected_result' => '5',
            'difficulty' => 'hard',
            'points' => 35,
            'lesson_id' => $lesson4->id,
            'character' => 'elephant',
            'story' => 'El elefante ama los patrones matemáticos especiales.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Necesitas dos variables: a=1, b=1. En cada vuelta: suma = a+b, imprime suma, actualiza a=b y b=suma.'
        ]);

        // 🐰 MÓDULO 5: El Conejo Veloz (Optimización - MEDIO/DIFÍCIL)
        $lesson5 = Lesson::create([
            'title' => '🐰 El Conejo Veloz',
            'description' => 'Carreras y desafíos con el conejo más rápido',
            'order' => 5,
            'icon' => '🐰',
            'color' => '#F38181'
        ]);

        Exercise::create([
            'title' => 'Video: Algoritmos Eficientes',
            'description' => 'Aprende a optimizar tu código',
            'instructions' => 'Mira cómo hacer código más rápido.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson5->id,
            'character' => 'rabbit',
            'story' => 'Un código rápido es mejor. ¡Aprende a optimizar!',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Observa técnicas de optimización.'
        ]);

        Exercise::create([
            'title' => 'Saltos del Conejo',
            'description' => 'El conejo salta 3 metros cada vez. ¿Cuánto en 7 saltos?',
            'instructions' => 'Multiplica 3 × 7.',
            'toolbox' => json_encode(['math', 'text']),
            'expected_result' => '21',
            'difficulty' => 'easy',
            'points' => 15,
            'lesson_id' => $lesson5->id,
            'character' => 'rabbit',
            'story' => 'Cada salto del conejo es de 3 metros.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** 3 metros × 7 saltos = ?'
        ]);

        Exercise::create([
            'title' => 'Carrera de Zanahorias',
            'description' => 'Cuenta hasta 10 zanahorias',
            'instructions' => 'Usa un bucle que repita 10 veces e imprime "zanahoria" cada vez.',
            'toolbox' => json_encode(['loops', 'text']),
            'expected_result' => '10',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson5->id,
            'character' => 'rabbit',
            'story' => '¡Hay 10 zanahorias escondidas! Ayuda al conejo a encontrarlas todas.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '💡 **Pista:** Crea un bucle que se repita exactamente 10 veces. Dentro del bucle, imprime la palabra "zanahoria".'
        ]);

        Exercise::create([
            'title' => 'Números Impares',
            'description' => 'Imprime solo números impares del 1 al 20',
            'instructions' => 'Usa bucle y condición para filtrar impares.',
            'toolbox' => json_encode(['loops', 'logic', 'math', 'variables', 'text']),
            'expected_result' => '19',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson5->id,
            'character' => 'rabbit',
            'story' => 'Al conejo solo le interesan los números impares.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Un número es impar si (n % 2 != 0).'
        ]);

        Exercise::create([
            'title' => 'Cuenta Regresiva',
            'description' => 'Cuenta desde 10 hasta 1 y luego "¡Despegue!"',
            'instructions' => 'Usa un bucle que vaya de 10 a 1.',
            'toolbox' => json_encode(['loops', 'variables', 'math', 'text']),
            'expected_result' => '¡Despegue!',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson5->id,
            'character' => 'rabbit',
            'story' => 'El conejo va a despegar como un cohete.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Variable i=10. Bucle mientras i>=1. Imprime i, luego i--. Al salir, imprime "¡Despegue!".'
        ]);

        Exercise::create([
            'title' => 'Suma Rápida del 1 al 100',
            'description' => 'Suma todos los números del 1 al 100',
            'instructions' => 'Usa un bucle y una variable acumuladora.',
            'toolbox' => json_encode(['loops', 'variables', 'math', 'text']),
            'expected_result' => '5050',
            'difficulty' => 'hard',
            'points' => 35,
            'lesson_id' => $lesson5->id,
            'character' => 'rabbit',
            'story' => 'El conejo necesita sumar muy rápido.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Crea suma=0. En un bucle de 1 a 100, suma += i. Imprime suma al final.'
        ]);

        Exercise::create([
            'title' => 'Tabla de Multiplicar del 5',
            'description' => 'Muestra la tabla del 5 del 1 al 10',
            'instructions' => 'Usa un bucle y multiplica 5 × i',
            'toolbox' => json_encode(['loops', 'variables', 'math', 'text']),
            'expected_result' => '50',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson5->id,
            'character' => 'rabbit',
            'story' => 'El conejo aprende las tablas de multiplicar.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Bucle de 1 a 10. En cada vuelta imprime 5 * i.'
        ]);

        // 🦊 MÓDULO 6: El Zorro Astuto (Arrays - MEDIO/DIFÍCIL)
        $lesson6 = Lesson::create([
            'title' => '🦊 El Zorro Astuto',
            'description' => 'Aprende a trabajar con listas de datos',
            'order' => 6,
            'icon' => '🦊',
            'color' => '#FF8C42'
        ]);

        Exercise::create([
            'title' => 'Video: ¿Qué son los Arrays?',
            'description' => 'Introducción a listas y arrays',
            'instructions' => 'Aprende qué es un array viendo este video.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson6->id,
            'character' => 'fox',
            'story' => 'Los arrays son como cajas con muchos compartimentos.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Entiende cómo funcionan las listas.'
        ]);

        Exercise::create([
            'title' => 'Lista de Frutas',
            'description' => 'Crea una lista con 3 frutas favoritas',
            'instructions' => 'Crea un array: ["manzana", "pera", "uva"].',
            'toolbox' => json_encode(['lists', 'text']),
            'expected_result' => '3',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson6->id,
            'character' => 'fox',
            'story' => 'El zorro quiere guardar sus frutas favoritas.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Crea una lista vacía y agrégale 3 elementos. Imprime la longitud de la lista.'
        ]);

        Exercise::create([
            'title' => 'Acceder al Primer Elemento',
            'description' => 'Obtén el primer elemento de [10, 20, 30]',
            'instructions' => 'Crea el array y accede a la posición 0.',
            'toolbox' => json_encode(['lists', 'math', 'text']),
            'expected_result' => '10',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson6->id,
            'character' => 'fox',
            'story' => 'Los arrays empiezan en la posición 0.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** array[0] te da el primer elemento.'
        ]);

        Exercise::create([
            'title' => 'Recorrer un Array',
            'description' => 'Imprime todos los elementos de [5, 10, 15, 20]',
            'instructions' => 'Usa un bucle para recorrer el array.',
            'toolbox' => json_encode(['lists', 'loops', 'text', 'variables']),
            'expected_result' => '20',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson6->id,
            'character' => 'fox',
            'story' => 'El zorro quiere ver todos sus tesoros.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Usa un bucle con índice i de 0 a longitud-1. Imprime array[i].'
        ]);

        Exercise::create([
            'title' => 'Suma de Array',
            'description' => 'Suma todos los números de [1, 2, 3, 4, 5]',
            'instructions' => 'Recorre el array sumando cada elemento.',
            'toolbox' => json_encode(['lists', 'loops', 'math', 'variables', 'text']),
            'expected_result' => '15',
            'difficulty' => 'hard',
            'points' => 30,
            'lesson_id' => $lesson6->id,
            'character' => 'fox',
            'story' => '¿Cuántos puntos tiene el zorro en total?',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** suma=0. Recorre array. En cada vuelta: suma += array[i].'
        ]);

        Exercise::create([
            'title' => 'Buscar en Array',
            'description' => '¿Está el número 7 en [2, 4, 7, 9]?',
            'instructions' => 'Recorre y busca el 7. Imprime "sí" o "no".',
            'toolbox' => json_encode(['lists', 'loops', 'logic', 'text', 'variables']),
            'expected_result' => 'sí',
            'difficulty' => 'hard',
            'points' => 30,
            'lesson_id' => $lesson6->id,
            'character' => 'fox',
            'story' => 'El zorro busca su número de la suerte.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Recorre el array. Si encuentras 7, imprime "sí" y sal. Si terminas sin encontrarlo, imprime "no".'
        ]);

        Exercise::create([
            'title' => 'Máximo de Array',
            'description' => 'Encuentra el número más grande de [12, 45, 23, 67, 34]',
            'instructions' => 'Recorre el array comparando valores.',
            'toolbox' => json_encode(['lists', 'loops', 'logic', 'math', 'variables', 'text']),
            'expected_result' => '67',
            'difficulty' => 'hard',
            'points' => 35,
            'lesson_id' => $lesson6->id,
            'character' => 'fox',
            'story' => '¿Cuál es el tesoro más valioso del zorro?',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** maximo=array[0]. Recorre desde i=1. Si array[i]>maximo, actualiza maximo.'
        ]);

        // 🐻 MÓDULO 7: El Oso Programador (Funciones - MEDIO/DIFÍCIL)
        $lesson7 = Lesson::create([
            'title' => '🐻 El Oso Programador',
            'description' => 'Aprende a crear y usar funciones',
            'order' => 7,
            'icon' => '🐻',
            'color' => '#A0674B'
        ]);

        Exercise::create([
            'title' => 'Video: ¿Qué son las Funciones?',
            'description' => 'Introducción a funciones',
            'instructions' => 'Aprende por qué las funciones son útiles.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson7->id,
            'character' => 'bear',
            'story' => 'Las funciones son bloques de código reutilizables.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Entiende el concepto de funciones.'
        ]);

        Exercise::create([
            'title' => 'Mi Primera Función',
            'description' => 'Crea una función que salude',
            'instructions' => 'Define función saludar() que imprima "Hola".',
            'toolbox' => json_encode(['functions', 'text']),
            'expected_result' => 'Hola',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson7->id,
            'character' => 'bear',
            'story' => 'El oso quiere crear su primera función.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Define una función llamada "saludar". Dentro, imprime "Hola". Luego llámala.'
        ]);

        Exercise::create([
            'title' => 'Función con Parámetro',
            'description' => 'Función que reciba un nombre y salude',
            'instructions' => 'Crea función saludar(nombre) que imprima "Hola, [nombre]".',
            'toolbox' => json_encode(['functions', 'text', 'variables']),
            'expected_result' => 'Hola, Oso',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson7->id,
            'character' => 'bear',
            'story' => 'Ahora la función debe ser más personalizada.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Define saludar(nombre). Imprime "Hola, " + nombre. Llámala con "Oso".'
        ]);

        Exercise::create([
            'title' => 'Función que Retorna',
            'description' => 'Crea función sumar(a, b) que retorne a+b',
            'instructions' => 'Define la función y retorna el resultado.',
            'toolbox' => json_encode(['functions', 'math', 'text', 'variables']),
            'expected_result' => '8',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson7->id,
            'character' => 'bear',
            'story' => 'Las funciones pueden devolver valores.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Define sumar(a,b). Retorna a+b. Llámala con (3,5) e imprime el resultado.'
        ]);

        Exercise::create([
            'title' => 'Función es Par',
            'description' => 'Crea función esPar(n) que retorne true si n es par',
            'instructions' => 'Usa el operador módulo.',
            'toolbox' => json_encode(['functions', 'logic', 'math', 'text']),
            'expected_result' => 'true',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson7->id,
            'character' => 'bear',
            'story' => 'Verifica si un número es par.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** esPar(n) retorna (n % 2 == 0). Pruébala con 4.'
        ]);

        Exercise::create([
            'title' => 'Función Máximo',
            'description' => 'Crea función max(a,b) que retorne el mayor',
            'instructions' => 'Compara a y b, retorna el mayor.',
            'toolbox' => json_encode(['functions', 'logic', 'math', 'text']),
            'expected_result' => '10',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson7->id,
            'character' => 'bear',
            'story' => 'El oso quiere saber cuál número es mayor.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Si a>b retorna a, sino retorna b. Prueba con (10, 7).'
        ]);

        Exercise::create([
            'title' => 'Función Factorial',
            'description' => 'Calcula el factorial de 5 (5! = 120)',
            'instructions' => 'Crea función factorial(n) recursiva o con bucle.',
            'toolbox' => json_encode(['functions', 'loops', 'math', 'variables', 'text']),
            'expected_result' => '120',
            'difficulty' => 'hard',
            'points' => 35,
            'lesson_id' => $lesson7->id,
            'character' => 'bear',
            'story' => 'El oso te reta a calcular factoriales.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** factorial(n) = n × (n-1) × ... × 1. Usa un bucle: resultado=1, for i de 1 a n: resultado *= i.'
        ]);

        // 🐼 MÓDULO 8: El Panda Creativo (Strings - MEDIO)
        $lesson8 = Lesson::create([
            'title' => '🐼 El Panda Creativo',
            'description' => 'Manipula texto como un experto',
            'order' => 8,
            'icon' => '🐼',
            'color' => '#2D3047'
        ]);

        Exercise::create([
            'title' => 'Video: Trabajando con Texto',
            'description' => 'Aprende operaciones con strings',
            'instructions' => 'Mira cómo manipular cadenas de texto.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson8->id,
            'character' => 'panda',
            'story' => 'El texto es muy importante en programación.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Aprende sobre strings y sus métodos.'
        ]);

        Exercise::create([
            'title' => 'Concatenar Textos',
            'description' => 'Une "Hola" + " " + "Mundo"',
            'instructions' => 'Usa el operador + para unir strings.',
            'toolbox' => json_encode(['text']),
            'expected_result' => 'Hola Mundo',
            'difficulty' => 'easy',
            'points' => 15,
            'lesson_id' => $lesson8->id,
            'character' => 'panda',
            'story' => 'El panda quiere unir palabras.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** "Hola" + " " + "Mundo". Imprime el resultado.'
        ]);

        Exercise::create([
            'title' => 'Longitud de Texto',
            'description' => '¿Cuántos caracteres tiene "Programación"?',
            'instructions' => 'Usa la función length.',
            'toolbox' => json_encode(['text', 'math']),
            'expected_result' => '13',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson8->id,
            'character' => 'panda',
            'story' => 'Cuenta las letras de la palabra.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Crea variable texto="Programación". Imprime texto.length.'
        ]);

        Exercise::create([
            'title' => 'Mayúsculas y Minúsculas',
            'description' => 'Convierte "hola" a mayúsculas',
            'instructions' => 'Usa la función toUpperCase.',
            'toolbox' => json_encode(['text']),
            'expected_result' => 'HOLA',
            'difficulty' => 'medium',
            'points' => 20,
            'lesson_id' => $lesson8->id,
            'character' => 'panda',
            'story' => 'El panda quiere gritar su saludo.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** "hola".toUpperCase(). Imprime el resultado.'
        ]);

        Exercise::create([
            'title' => 'Extraer Substring',
            'description' => 'Obtén los primeros 4 caracteres de "JavaScript"',
            'instructions' => 'Usa substring(0, 4).',
            'toolbox' => json_encode(['text', 'math']),
            'expected_result' => 'Java',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson8->id,
            'character' => 'panda',
            'story' => 'Extrae una parte del texto.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** "JavaScript".substring(0,4) extrae desde posición 0 hasta 4 (sin incluirla).'
        ]);

        Exercise::create([
            'title' => 'Buscar en Texto',
            'description' => '¿"Panda" contiene la letra "a"?',
            'instructions' => 'Usa includes("a").',
            'toolbox' => json_encode(['text', 'logic']),
            'expected_result' => 'true',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson8->id,
            'character' => 'panda',
            'story' => 'Busca si una letra está en la palabra.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** "Panda".includes("a") retorna true o false.'
        ]);

        Exercise::create([
            'title' => 'Reemplazar Texto',
            'description' => 'Cambia "gato" por "panda" en "Me gusta el gato"',
            'instructions' => 'Usa replace("gato", "panda").',
            'toolbox' => json_encode(['text']),
            'expected_result' => 'Me gusta el panda',
            'difficulty' => 'medium',
            'points' => 25,
            'lesson_id' => $lesson8->id,
            'character' => 'panda',
            'story' => 'Reemplaza una palabra por otra.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** "Me gusta el gato".replace("gato", "panda").'
        ]);

        // 🦉 MÓDULO 9: La Lechuza Nocturna (Objetos - DIFÍCIL)
        $lesson9 = Lesson::create([
            'title' => '🦉 La Lechuza Nocturna',
            'description' => 'Descubre el poder de los objetos',
            'order' => 9,
            'icon' => '🦉',
            'color' => '#4A5859'
        ]);

        Exercise::create([
            'title' => 'Video: Introducción a Objetos',
            'description' => '¿Qué son los objetos en programación?',
            'instructions' => 'Aprende sobre objetos y propiedades.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson9->id,
            'character' => 'owl',
            'story' => 'Los objetos agrupan datos relacionados.',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Entiende cómo funcionan los objetos.'
        ]);

        Exercise::create([
            'title' => 'Crear un Objeto Simple',
            'description' => 'Crea objeto lechuza con nombre y edad',
            'instructions' => 'Define {nombre: "Hedwig", edad: 5}.',
            'toolbox' => json_encode(['objects', 'text', 'math']),
            'expected_result' => 'Hedwig',
            'difficulty' => 'hard',
            'points' => 30,
            'lesson_id' => $lesson9->id,
            'character' => 'owl',
            'story' => 'Crea tu primera estructura de datos compleja.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** lechuza = {nombre: "Hedwig", edad: 5}. Imprime lechuza.nombre.'
        ]);

        Exercise::create([
            'title' => 'Acceder a Propiedades',
            'description' => 'Obtén la edad del objeto anterior',
            'instructions' => 'Usa objeto.propiedad.',
            'toolbox' => json_encode(['objects', 'text', 'math']),
            'expected_result' => '5',
            'difficulty' => 'hard',
            'points' => 30,
            'lesson_id' => $lesson9->id,
            'character' => 'owl',
            'story' => 'Accede a los datos dentro del objeto.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** lechuza.edad te da el valor 5.'
        ]);

        Exercise::create([
            'title' => 'Modificar Propiedades',
            'description' => 'Cambia la edad de la lechuza a 6',
            'instructions' => 'Asigna nuevo valor a la propiedad.',
            'toolbox' => json_encode(['objects', 'math', 'text']),
            'expected_result' => '6',
            'difficulty' => 'hard',
            'points' => 30,
            'lesson_id' => $lesson9->id,
            'character' => 'owl',
            'story' => 'La lechuza cumplió años.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** lechuza.edad = 6. Imprime lechuza.edad.'
        ]);

        Exercise::create([
            'title' => 'Objeto con Método',
            'description' => 'Crea objeto con función saludar()',
            'instructions' => 'Define método dentro del objeto.',
            'toolbox' => json_encode(['objects', 'functions', 'text']),
            'expected_result' => 'Hola, soy Hedwig',
            'difficulty' => 'hard',
            'points' => 35,
            'lesson_id' => $lesson9->id,
            'character' => 'owl',
            'story' => 'Los objetos pueden tener funciones.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** lechuza = {nombre: "Hedwig", saludar: function() {...}}. Llama lechuza.saludar().'
        ]);

        Exercise::create([
            'title' => 'Array de Objetos',
            'description' => 'Crea lista de 3 lechuzas',
            'instructions' => 'Array con objetos [{nombre, edad}, ...].',
            'toolbox' => json_encode(['lists', 'objects', 'text', 'math']),
            'expected_result' => '3',
            'difficulty' => 'hard',
            'points' => 35,
            'lesson_id' => $lesson9->id,
            'character' => 'owl',
            'story' => 'Una bandada de lechuzas.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** lechuzas = [{nombre:"A",edad:3}, {nombre:"B",edad:4}, ...]. Imprime lechuzas.length.'
        ]);

        Exercise::create([
            'title' => 'Recorrer Array de Objetos',
            'description' => 'Imprime el nombre de cada lechuza',
            'instructions' => 'Usa bucle para recorrer el array.',
            'toolbox' => json_encode(['lists', 'objects', 'loops', 'text', 'variables']),
            'expected_result' => 'C',
            'difficulty' => 'hard',
            'points' => 35,
            'lesson_id' => $lesson9->id,
            'character' => 'owl',
            'story' => 'Presenta a todas las lechuzas.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** for i de 0 a length-1: imprime lechuzas[i].nombre.'
        ]);

        // 🐢 MÓDULO 10: La Tortuga Sabia (Proyecto Final - DIFÍCIL)
        $lesson10 = Lesson::create([
            'title' => '🐢 La Tortuga Sabia',
            'description' => 'Demuestra todo lo que has aprendido',
            'order' => 10,
            'icon' => '🐢',
            'color' => '#6A994E'
        ]);

        Exercise::create([
            'title' => 'Video Final: Tu Viaje',
            'description' => 'Reflexión sobre lo aprendido',
            'instructions' => 'Mira el mensaje final de la tortuga.',
            'toolbox' => null,
            'expected_result' => null,
            'difficulty' => 'easy',
            'points' => 5,
            'lesson_id' => $lesson10->id,
            'character' => 'turtle',
            'story' => '¡Felicitaciones por llegar hasta aquí!',
            'help_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'help_text' => '📺 Celebra tu logro. Has aprendido mucho.'
        ]);

        Exercise::create([
            'title' => 'Calculadora Básica',
            'description' => 'Crea funciones para +, -, *, /',
            'instructions' => 'Define 4 funciones matemáticas.',
            'toolbox' => json_encode(['functions', 'math', 'text', 'variables']),
            'expected_result' => '20',
            'difficulty' => 'hard',
            'points' => 35,
            'lesson_id' => $lesson10->id,
            'character' => 'turtle',
            'story' => 'La tortuga necesita una calculadora.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Crea sumar(a,b), restar(a,b), multiplicar(a,b), dividir(a,b). Prueba multiplicar(4,5).'
        ]);

        Exercise::create([
            'title' => 'FizzBuzz',
            'description' => 'Del 1 al 15: si múltiplo de 3→Fizz, de 5→Buzz, de ambos→FizzBuzz',
            'instructions' => 'Usa bucle y condiciones.',
            'toolbox' => json_encode(['loops', 'logic', 'math', 'text', 'variables']),
            'expected_result' => 'FizzBuzz',
            'difficulty' => 'hard',
            'points' => 40,
            'lesson_id' => $lesson10->id,
            'character' => 'turtle',
            'story' => 'El famoso desafío FizzBuzz.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Bucle 1-15. Si i%3==0 y i%5==0→FizzBuzz, si i%3==0→Fizz, si i%5==0→Buzz, sino→i.'
        ]);

        Exercise::create([
            'title' => 'Palíndromo',
            'description' => '¿"anilina" se lee igual al revés?',
            'instructions' => 'Verifica si un texto es palíndromo.',
            'toolbox' => json_encode(['text', 'loops', 'logic', 'variables']),
            'expected_result' => 'true',
            'difficulty' => 'hard',
            'points' => 40,
            'lesson_id' => $lesson10->id,
            'character' => 'turtle',
            'story' => 'Palabras que se leen igual al revés.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Compara texto con su reverso. Usa bucle o función reverse.'
        ]);

        Exercise::create([
            'title' => 'Números Primos',
            'description' => '¿Es 17 un número primo?',
            'instructions' => 'Función que verifica si n es primo.',
            'toolbox' => json_encode(['functions', 'loops', 'logic', 'math', 'variables', 'text']),
            'expected_result' => 'true',
            'difficulty' => 'hard',
            'points' => 40,
            'lesson_id' => $lesson10->id,
            'character' => 'turtle',
            'story' => 'Los números primos son especiales.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Primo si solo divisible por 1 y sí mismo. Bucle de 2 a n-1, si n%i==0 no es primo.'
        ]);

        Exercise::create([
            'title' => 'Ordenar Array',
            'description' => 'Ordena [64, 34, 25, 12, 22] de menor a mayor',
            'instructions' => 'Implementa algoritmo de ordenamiento.',
            'toolbox' => json_encode(['lists', 'loops', 'logic', 'math', 'variables', 'text']),
            'expected_result' => '12',
            'difficulty' => 'hard',
            'points' => 40,
            'lesson_id' => $lesson10->id,
            'character' => 'turtle',
            'story' => 'Ordena los números del más pequeño al más grande.',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Usa Bubble Sort. Dos bucles anidados, compara e intercambia si necesario.'
        ]);

        Exercise::create([
            'title' => 'Proyecto Final',
            'description' => 'Sistema de gestión de biblioteca',
            'instructions' => 'Combina arrays, objetos y funciones para gestionar libros.',
            'toolbox' => json_encode(['lists', 'objects', 'functions', 'loops', 'logic', 'text', 'variables', 'math']),
            'expected_result' => 'Sistema completo',
            'difficulty' => 'hard',
            'points' => 50,
            'lesson_id' => $lesson10->id,
            'character' => 'turtle',
            'story' => 'Crea un sistema para agregar, buscar y listar libros. ¡El desafío final!',
            'help_video_url' => null,
            'help_text' => '💡 **Pista:** Crea array de objetos libro {titulo, autor}. Funciones: agregarLibro(), buscarPorAutor(), listarTodos().'
        ]);
    }
}