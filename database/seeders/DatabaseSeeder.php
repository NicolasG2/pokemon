<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // Inserir tipos na tabela 'tipos'
        $tiposData = [
            [
                "nome" => "Normal",
                "descricao" => "Vantagem: Nenhum. Desvantagem: Lutador. Imune: Fantasma",
                "foto" => null
            ],
            [
                "nome" => "Planta",
                "descricao" => "Vantagem: Terra, Pedra, Água. Desvantagem:Inseto, Fogo, Voador, Gelo, Venenoso. Imune: Nenhum.",
                "foto" => null
            ],
            [
                "nome" => "Fogo",
                "descricao" => "Vantagem: Inseto, Planta, Gelo, Aço. Desvantagem: Pedra, Terra, Água. Imune: Nenhum",
                "foto" => null
            ],
             [
                "nome" => "Água",
                "descricao" => "Vantagem: Fogo, Terra, Pedra. Desvantagem: Elétrico, Planta. Imune: Nenhum",
                "foto" => null
            ],
             [
                "nome" => "Elétrico",
                "descricao" => "Vantagem: Água, Voador. Desvantagem: Terra. Imune: Nenhum",
                "foto" => null
            ],
             [
                "nome" => "Voador",
                "descricao" => "Vantagem: Inseto, Lutador, Planta. Desvantagem: Elétrico, Gelo, Pedra. Imune: Terra",
                "foto" => null
            ],
            [
                "nome" => "Gelo",
                "descricao" => "Vantagem: Dragão, Voador, Planta, Terra. Desvantagem: Lutador, Fogo, Pedra, Aço. Imune: Nenhum",
                "foto" => null
            ],
             [
                "nome" => "Pedra",
                "descricao" => "Vantagem: Inseto, Fogo, Voador, Gelo. Desvantagem: Lutador, Planta, Terra, Aço, Água. Imune: Nenhum",
                "foto" => null
            ],
             [
                "nome" => "Terra",
                "descricao" => "Vantagem: Elétrico, Fogo, Venenoso, Pedra, Aço. Desvantagem: Gelo, Planta, Água. Imune: Elétrico",
                "foto" => null
            ],
             [
                "nome" => "Aço",
                "descricao" => "Vantagem: Fada, Gelo, Pedra. Desvantagem: Lutador, Fogo, Terra. Imune: Venenoso",
                "foto" => null
            ],
             [
                "nome" => "Lutador",
                "descricao" => "Vantagem: Sombrio, Gelo, Normal, Pedra, Aço. Desvantagem: Fada, Voador, Psíquico. Imune: Nenhum",
                "foto" => null
            ],
             [
                "nome" => "Sombrio",
                "descricao" => "Vantagem: Fantasma, Psíquico. Desvantagem: Inseto, Fada, Lutador. Imune: Psíquico",
                "foto" => null
            ],
             [
                "nome" => "Psíquico",
                "descricao" => "Vantagem: Lutador, Venenoso. Desvantagem: Sombrio, Inseto, Fantasma. Imune: Nenhum",
                "foto" => null
            ],
             [
                "nome" => "Venenoso",
                "descricao" => "Vantagem: Planta, Fada. Desvantagem: Terra, Psíquico. Imune: Nenhum",
                "foto" => null
            ],
             [
                "nome" => "Inseto",
                "descricao" => "Vantagem: Sombrio, Planta, Psíquico. Desvantagem: Pedra, Fogo, Voador. Imune: Nenhum",
                "foto" => null
            ],
             [
                "nome" => "Fada",
                "descricao" => "Vantagem: Sombrio, Dragão Lutador. Desvantagem: Aço, Venenoso. Imune: Dragão",
                "foto" => null
            ],
             [
                "nome" => "Fantasma",
                "descricao" => "Vantagem: Fantasma, Psíquico. Desvantagem: Sombrio, Fantasma. Imune: Normal, Lutador",
                "foto" => null
            ],
             [
                "nome" => "Dragão",
                "descricao" => "Vantagem: Dragão. Desvantagem: Dragão, Fada, Gelo. Imune: Nenhum",
                "foto" => null
            ]
        ];

        // Inserir dados na tabela 'tipos' e obter os IDs correspondentes
        $tipoIds = [];
        foreach ($tiposData as $tipo) {
            $tipoIds[] = DB::table('tipos')->insertGetId($tipo);
        }

        // Inserir pokemons na tabela 'pokemons' com referências às chaves estrangeiras
        $pokemonsData = [
            [
                "nome" => "Furret",
                "descricao" => "Furret has a very slim build. When under attack, it can slickly squirm through narrow spaces and get away. In spite of its short limbs, this Pokémon is very nimble and fleet.",
                "tipo1" => $tipoIds[0],  
                "tipo2" => null,
                "foto" => null
            ],
            [
                "nome" => "Victreebel",
                "descricao" => "Lures prey with the sweet aroma of honey. Swallowed whole, the prey is dissolved in a day, bones and all.",
                "tipo1" => $tipoIds[1],  
                "tipo2" => $tipoIds[13],
                "foto" => null
            ],
            [
                "nome" => "Typhlosion",
                "descricao" => "It attacks using blasts of fire. It creates heat shimmers with intense fire to hide itself.",
                "tipo1" => $tipoIds[2],  
                "tipo2" => null,
                "foto" => null
            ],
            [
                "nome" => "Mantine",
                "descricao" => "If it builds up enough speed swimming, it can jump out above the waves and glide for over 300 feet.",
                "tipo1" => $tipoIds[3],  
                "tipo2" => $tipoIds[5],
                "foto" => null
            ],
            [
                "nome" => "Lanturn",
                "descricao" => "The light it emits is so bright that it can illuminate the sea’s surface from a depth of over three miles.",
                "tipo1" => $tipoIds[4],  
                "tipo2" => $tipoIds[3],
                "foto" => null
            ],
            [
                "nome" => "Honchkrow",
                "descricao" => "It is merciless by nature. It is said that it never forgives the mistakes of its Murkrow followers.",
                "tipo1" => $tipoIds[5],  
                "tipo2" => $tipoIds[11],
                "foto" => null
            ],
            [
                "nome" => "Abomasnow",
                "descricao" => "It lives a quiet life on mountains that are perpetually covered in snow. It hides itself by whipping up blizzards.",
                "tipo1" => $tipoIds[6],  
                "tipo2" => $tipoIds[1],
                "foto" => null
            ],
            [
                "nome" => "Tyranitar",
                "descricao" => "Extremely strong, it can change the landscape. It is so insolent that it does not care about others.",
                "tipo1" => $tipoIds[7],  
                "tipo2" => $tipoIds[11],
                "foto" => null
            ],
            [
                "nome" => "Excadrill",
                "descricao" => "It is not uncommon for tunnels that appear to have formed naturally to actually be a result of Excadrill’s rampant digging.",
                "tipo1" => $tipoIds[8],  
                "tipo2" => $tipoIds[9],
                "foto" => null
            ],
            [
                "nome" => "Mawile",
                "descricao" => "It uses its docile-looking face to lull foes into complacency, then bites with its huge, relentless jaws.",
                "tipo1" => $tipoIds[9],  
                "tipo2" => $tipoIds[15],
                "foto" => null
            ],
            [
                "nome" => "Sirfetch’d",
                "descricao" => "Only Farfetch’d that have survived many battles can attain this evolution. When this Pokémon’s leek withers, it will retire from combat.",
                "tipo1" => $tipoIds[10],  
                "tipo2" => null,
                "foto" => null
            ],
            [
                "nome" => "Overqwil",
                "descricao" => "Its lancelike spikes and savage temperament have earned it the nickname sea fiend. It slurps up poison to nourish itself.",
                "tipo1" => $tipoIds[11],  
                "tipo2" => $tipoIds[13],
                "foto" => null
            ],
            [
                "nome" => "Reuniclus",
                "descricao" => "While it could use its psychic abilities in battle, this Pokémon prefers to swing its powerful arms around to beat opponents into submission.",
                "tipo1" => $tipoIds[12],  
                "tipo2" => null,
                "foto" => null,
            ],
            [
                "nome" => "Dragalge",
                "descricao" => "Using a liquid poison, Dragalge indiscriminately attacks anything that wanders into its territory. This poison can corrode the undersides of boats.",
                "tipo1" => $tipoIds[13],  
                "tipo2" => $tipoIds[17],
                "foto" => null
            ],
            [
                "nome" => "Centiskorch",
                "descricao" => "When it heats up, its body temperature reaches about 1,500 degrees Fahrenheit. It lashes its body like a whip and launches itself at enemies.",
                "tipo1" => $tipoIds[14],  
                "tipo2" => $tipoIds[2],
                "foto" => null
            ],
            [
                "nome" => "Mimikyu",
                "descricao" => "This Pokémon lives in dark places untouched by sunlight. When it appears before humans, it hides itself under a cloth that resembles a Pikachu.",
                "tipo1" => $tipoIds[15],  
                "tipo2" => $tipoIds[16],
                "foto" => null
            ],
            [
                "nome" => "Dhelmise",
                "descricao" => "After a piece of seaweed merged with debris from a sunken ship, it was reborn as this ghost Pokémon.",
                "tipo1" => $tipoIds[16],  
                "tipo2" => $tipoIds[1],
                "foto" => null
            ],
            [
                "nome" => "Dragapult",
                "descricao" => "Dragapult can make its whole body transparent by clearing its mind and focusing. Even the Dreepy in Dragapult’s horns become invisible.",
                "tipo1" => $tipoIds[17],  
                "tipo2" => $tipoIds[16],
                "foto" => null
            ]
        ];
        
        DB::table('pokemons')->insert($pokemonsData);
    }
}
