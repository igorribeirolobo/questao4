<?php

namespace App\Http\Controllers\Api;

use App\Contato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mockery\Exception;

class ContatoController extends Controller
{
    private $contato;

    public function __construct(Contato $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Busca todos os contatos
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return response()->json($this->contato->paginate(5));
    }


    /**
     * Retorna o contato por id
     *
     * @param Contato $id
     *
     * @return Array Contato
     */
    public function show(Contato $id)
    {
        return $id;
    }

    /**
     * Criar os dados de contato
     *
     * @param Request $request
     *
     * @return Array $retorno
     */
    public function store(Request $request)
    {
        try{
            $dados = $request->all();

            $contatos = $this->contato->create($dados);

            $retorno = array(
                'success' => true,
                'record' => $contatos['id']
            );
        }catch (Exception $e){
            $retorno = array(
              'success' => false,
              'error' => $e->getMessage()
            );
        }

        return response()->json($retorno);
    }

    /**
     * Recurso para edição do contato
     *
     * @param Request $request
     *
     * @return Array $retorno
     */
    public function update(Request $request)
    {
        try{
            $dados = $request->all();

            $contato = $this->contato->find($dados['id']);

            $contato->update($dados);

            $retorno = array(
                'success' => true,
                'record' => $contato['id']
            );
        }catch(Exception $e){
            $retorno = array(
                'success' => false,
                'error' => $e->getMessage()
            );
        }

        return response()->json($retorno);
    }

    /**
     * Recurso para remoção do contato
     *
     * @param Contato $id
     *
     * @return Array $retorno
     */
    public function remove(Contato $id)
    {
        try{

            $id->delete();

            $retorno = array(
                'success' => true,
            );
        }catch (Exception $e){
            $retorno = array(
                'success' => false,
                'error' => $e->getMessage()
            );
        }

        return response()->json($retorno);
    }


}
