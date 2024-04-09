<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\UploadFiles;
use Illuminate\Http\Request;


class UploadFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar form csvs
        $request->validate([            
            'csvAntigo' => 'required|mimes:csv,txt|max:2048',
            'csvNovo' => 'required|mimes:csv,txt|max:2048',
        ]);


        if($request->file('csvAntigo')){
            $name_csvAntigo = "csv_antigo.csv";    
            $path = public_path('media/csv/');
            $request->file('csvAntigo')->move($path,$name_csvAntigo);           
        }  

        if($request->file('csvNovo')){
            $name_csvNovo = "csv_novo.csv";    
            $path = public_path('media/csv/');
            $request->file('csvNovo')->move($path,$name_csvNovo);           
        }  

       
        $csv_antigo = public_path('media/csv/csv_antigo.csv');
        $csv_novo = public_path('media/csv/csv_novo.csv');
        $dadosAntigos = ler_csv($csv_antigo);
        $dadosNovos = ler_csv($csv_novo);

        $linhasDadosAntigos = file($csv_antigo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $linhasDadosNovos = file($csv_novo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        //Linhas que aparecem no ficheiro novo que estão no ficheiro antigo
        $linhasDuplicadas = array_intersect($linhasDadosNovos, $linhasDadosAntigos);
        
        // Nome do arquivo que será gerado
        $csv_duplicados = public_path('media/csv/csv_duplicados.csv');

        $arrayLinhasDuplicadas = [];
        foreach($linhasDuplicadas as $linha){
            $result=explode(";",$linha);
            array_push($arrayLinhasDuplicadas, $result);
           
        }
      
        if ($arquivo = fopen($csv_duplicados, 'w')) {
            foreach ($arrayLinhasDuplicadas as $linha) {
                fputcsv($arquivo, $linha, ";");
            }
        
             fclose($arquivo);
        }

        //Linhas que estão ficheiro novo mas não estão ficheiro antigo
        $linhasInseridasNovas = array_diff($linhasDadosNovos, $linhasDadosAntigos);

        // Nome do arquivo que será gerado
        $csv_novosInseridos = public_path('media/csv/csv_novosInseridos.csv');

        $arrayLinhasNovas = [["cnpj", "pdf_file_name", "balance_date" ,"balance_refers_to_date","ativo_total","ativo_circulante", "ativo_nao_circulante", "passivo_total", "passivo_circulante", "passivo_nao_circulante", "patrimonio_liquido", "receita_liquida" ,"lucro_bruto",]];
        foreach($linhasInseridasNovas as $linha){
            $result=explode(";",$linha);
            array_push($arrayLinhasNovas, $result);
           
        }
      
        if ($arquivo = fopen($csv_novosInseridos, 'w')) {
            foreach ($arrayLinhasNovas as $linha) {
                fputcsv($arquivo, $linha, ";");
            }
        
             fclose($arquivo);
        }

        //Linhas que estão não ficheiro antigo mas não estão no novo por isso foram actualizadas 
        $linhasAtuliazadas= array_diff($linhasDadosAntigos, $linhasDadosNovos);  
        
        // Nome do arquivo que será gerado
        $csv_linhas_actualidas = public_path('media/csv/csv_linhas_actualidas.csv');

        $arrayLinhasActualizadas= [["cnpj", "pdf_file_name", "balance_date" ,"balance_refers_to_date","ativo_total","ativo_circulante", "ativo_nao_circulante", "passivo_total", "passivo_circulante", "passivo_nao_circulante", "patrimonio_liquido", "receita_liquida" ,"lucro_bruto",]];
        foreach($linhasAtuliazadas as $linha){
            $result=explode(";",$linha);
            array_push($arrayLinhasActualizadas, $result);
           
        }
      
        if ($arquivo = fopen($csv_linhas_actualidas, 'w')) {
            foreach ($arrayLinhasActualizadas as $linha) {
                fputcsv($arquivo, $linha, ";");
            }
        
             fclose($arquivo);
        }


       return view('output', ['linhasDuplicadas' => $linhasDuplicadas, 'linhasInseridasNovas' => $linhasInseridasNovas, 'linhasAtuliazadas' => $linhasAtuliazadas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UploadFiles $uploadFiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadFiles $uploadFiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UploadFiles $uploadFiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadFiles $uploadFiles)
    {
        //
    }
}
