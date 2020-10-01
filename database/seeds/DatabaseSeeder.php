 <?php

use Illuminate\Database\Seeder;
use App\Models\Financeiro\Historico;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AclTableSeeder::class);

        $this->insertFileQuery(__DIR__ . '/pais.sql');
        $this->insertFileQuery(__DIR__ . '/estados.sql');
        $this->insertFileQuery(__DIR__ . '/cidades.sql');

        Historico::create([
            'nome'=> 'Deposito para ',
            'tipo' => 'C'
        ]);
        Historico::create([
            'nome'=> 'Rendimento ',
            'tipo' => 'C'
        ]);
        Historico::create([
            'nome'=> 'Resgate Rendimento ',
            'tipo' => 'C'
        ]);
        Historico::create([
            'nome'=> 'Resgate Total Aplic. ',
            'tipo' => 'C'
        ]);
        Historico::create([
            'nome'=> 'Resgate Parcial Aplic. ',
            'tipo' => 'C'
        ]);
        Historico::create([
            'nome'=> 'Transf. Aplic. ',
            'tipo' => 'D'
        ]);
        Historico::create([
            'nome'=> 'Automat. Aplic.',
            'tipo' => 'D'
        ]);
        Historico::create([
            'nome'=> 'Saque ',
            'tipo' => 'D'
        ]);
        Historico::create([
            'nome'=> 'Transf. Usuario ',
            'tipo' => 'D'
        ]);
    }

    /**
     *  Rum insert sql
     * @param $filePath
     *
     */
    function insertFileQuery($filePath) {
        // Abre o arquivo
        $file = fopen($filePath, 'a+');

        // Percorre todas as linhas do arquivo
        while (!feof($file)) {
            // Pega o resultado da linha atual
            $result = fgets($file, 4096);
            DB::insert($result);
        }

        // Fecha o arquivo aberto
        fclose($file);
    }
}
