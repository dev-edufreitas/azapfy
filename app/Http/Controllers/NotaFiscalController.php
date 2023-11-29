<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NotaFiscal;
use App\Http\Requests\NotaFiscalFormRequest;
use App\Notifications\NotaFiscalNotification;

class NotaFiscalController extends Controller
{


    /**
     * @OA\Get(
     *     path="/api/notas-fiscais",
     *     summary="Lista todas as notas fiscais",
     *     tags={"NotasFiscais"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Operation successful"
     *     )
     * )
     */
    public function index()
    {
        $user = auth()->user();
        $notasFiscais = $user->notasFiscais;
        return response()->json($notasFiscais);
    }

    /**
     * @OA\Post(
     *     path="/api/notas-fiscais",
     *     summary="Cria uma nota fiscal",
     *     tags={"NotasFiscais"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"numero", "valor", "data_emissao", "cnpj_remetente", "nome_remetente", "cnpj_transportador", "nome_transportador"},
     *             @OA\Property(property="numero", type="string", example="123456789", description="Unique 9-character string identifier for the nota fiscal"),
     *             @OA\Property(property="valor", type="number", format="float", example=1000.00, description="Numeric value representing the value of nota fiscal, minimum 0.01"),
     *             @OA\Property(property="data_emissao", type="string", format="date", example="2023-01-01", description="Emission date of the nota fiscal, must be today or a past date"),
     *             @OA\Property(property="cnpj_remetente", type="string", example="04.785.881/0001-54", description="CNPJ of the sender, must be valid"),
     *             @OA\Property(property="nome_remetente", type="string", example="Empresa Exemplo", description="Name of the sender, maximum 100 characters"),
     *             @OA\Property(property="cnpj_transportador", type="string", example="43.231.605/0001-04", description="CNPJ of the transporter, must be valid"),
     *             @OA\Property(property="nome_transportador", type="string", example="Transportadora Exemplo", description="Name of the transporter, maximum 100 characters")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Nota fiscal created successfully"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     )
     * )
     */
    public function store(NotaFiscalFormRequest $request)
    {
        $validatedData = $request->validated();

        $user = auth()->user();

        $notaFiscal = $user->notasFiscais()->create($validatedData);

        $user->notify(new NotaFiscalNotification($notaFiscal));

        return response()->json($notaFiscal, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/notas-fiscais/{id}",
     *     summary="Busca uma nota fiscal especifica",
     *     tags={"NotasFiscais"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="Nota Fiscal ID"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operation successful"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Nota fiscal not found"
     *     )
     * )
     */
    public function show($id)
    {
        $notaFiscal = NotaFiscal::findOrFail($id);
        $this->authorize('view', $notaFiscal);

        return response()->json($notaFiscal);
    }

    /**
     * @OA\Put(
     *     path="/api/notas-fiscais/{id}",
     *     summary="Atualiza parcialemnte uma nota fiscal existente",
     *     tags={"NotasFiscais"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="Nota Fiscal ID"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="numero",
     *                 type="string",
     *                 description="Número da nota fiscal, único, com 9 caracteres",
     *                 example="123456789"
     *             ),
     *             @OA\Property(
     *                 property="valor",
     *                 type="number",
     *                 format="float",
     *                 description="Valor da nota fiscal, mínimo de 0.01",
     *                 example="100.50"
     *             ),
     *             @OA\Property(
     *                 property="data_emissao",
     *                 type="string",
     *                 format="date",
     *                 description="Data de emissão da nota fiscal, não pode ser futura",
     *                 example="2023-01-01"
     *             ),
     *             @OA\Property(
     *                 property="cnpj_remetente",
     *                 type="string",
     *                 description="CNPJ do remetente, válido",
     *                 example="12345678000123"
     *             ),
     *             @OA\Property(
     *                 property="nome_remetente",
     *                 type="string",
     *                 description="Nome do remetente, até 100 caracteres",
     *                 example="Empresa Exemplo S/A"
     *             ),
     *             @OA\Property(
     *                 property="cnpj_transportador",
     *                 type="string",
     *                 description="CNPJ do transportador, válido",
     *                 example="98765432000198"
     *             ),
     *             @OA\Property(
     *                 property="nome_transportador",
     *                 type="string",
     *                 description="Nome do transportador, até 100 caracteres",
     *                 example="Transportadora Exemplo"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Nota fiscal atualizada com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Nota fiscal não encontrada"
     *     )
     * )
     */
    public function update(NotaFiscalFormRequest $request, $id)
    {
        $notaFiscal = NotaFiscal::findOrFail($id);

        $this->authorize('update', $notaFiscal);

        $validatedData = $request->validated();

        $notaFiscal->update($validatedData);

        return response()->json($notaFiscal);
    }


    /**
     * @OA\Delete(
     *     path="/api/notas-fiscais/{id}",
     *     summary="Excluir uma nota fiscal específica",
     *     tags={"NotasFiscais"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="Nota Fiscal ID"
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Nota fiscal deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Nota fiscal not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        $notaFiscal = NotaFiscal::findOrFail($id);
        $this->authorize('delete', $notaFiscal);

        $notaFiscal->delete();

        return response()->json(null, 204);
    }
}
