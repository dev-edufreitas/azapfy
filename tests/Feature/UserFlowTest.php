<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\NotaFiscal;

class UserFlowTest extends TestCase
{
    use RefreshDatabase;

    public function testUserRegistrationAndCRUD()
    {
        //Registro
        $this->postJson('api/register', [
            "name" => "SeniorAzapfy",
            "email" => "email@emailteste.com",
            "password" => "azapfy",
        ])->assertStatus(201);
        
        //Login
        $response = $this->postJson('api/login', [
            "email" => "email@emailteste.com",
            "password" => "azapfy",
        ]);
        $response->assertStatus(200);
        $token = $response->json('token');

        //CRUD
        //Create
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('api/notas-fiscais', [
            "numero" => "536987412",
            "valor" => 1000.00,
            "data_emissao" => "2023-03-01",
            "cnpj_remetente" => "04.785.881/0001-54",
            "nome_remetente" => "Empresa Remetente Ltda",
            "cnpj_transportador" => "43.231.605/0001-04",
            "nome_transportador" => "Transportadora Transporta Tudo S.A"
        ]);
        $response->assertStatus(201);
        $notaFiscalId = $response->json('id');

        //Read
        $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson("api/notas-fiscais/{$notaFiscalId}")->assertStatus(200);

        //Update
        $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("api/notas-fiscais/{$notaFiscalId}", [
            "numero" => "536987413",
            "valor" => 1200.00,
            "data_emissao" => "2023-03-01",
            "cnpj_remetente" => "04.785.881/0001-54",
            "nome_remetente" => "Empresa Remetente Ltda",
            "cnpj_transportador" => "43.231.605/0001-04",
            "nome_transportador" => "Transportadora Transporta Tudo LTDA"
        ])->assertStatus(200);

        //Delete
        $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("api/notas-fiscais/{$notaFiscalId}")->assertStatus(204);
    }
}
