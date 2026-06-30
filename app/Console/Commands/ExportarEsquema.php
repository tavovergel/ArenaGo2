<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ExportarEsquema extends Command
{
    protected $signature = 'make:diagrama';
    protected $description = 'Genera texto plano para PlantUML';

    public function handle()
    {
        // Estructura manual basada en tus modelos de ArenaGo
        $plantUML = "@startuml\n\n";
        $plantUML .= "entity \"users\" {\n  * id : bigint\n  --\n  name : varchar\n  email : varchar\n}\n\n";
        $plantUML .= "entity \"escenarios\" {\n  * id_escenario : bigint\n  --\n  nombre_escenario : varchar\n  descripcion : text\n  municipio : varchar\n  banos : enum(Si,No)\n  user_id : bigint\n}\n\n";
        $plantUML .= "users ||--o{ escenarios : \"crea\"\n\n";
        $plantUML .= "@enduml";

        File::put(base_path('esquema_plantuml.txt'), $plantUML);
        $this->info('¡Archivo esquema_plantuml.txt generado con éxito en la raíz!');
    }
}