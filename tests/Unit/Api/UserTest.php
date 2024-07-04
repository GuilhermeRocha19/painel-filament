<?php declare(strict_types=1);

namespace Tests\Unit\Api;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_existe_usuarios_na_listagem(): void
    {
        $limit = 2;
        $endpoint = sprintf('/user/{user}/show', $limit);

        $response = $this->get($endpoint);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);

        $data = $response->json('data');
        // Garante que é uma matriz
        $this->assertIsArray($data);
        // Garante que é verdadeiro quando existir apenas 2 registros
        $this->assertTrue(count($data) === 2);

        foreach ($data as $datum) {
            $this->assertIsString($datum['name']);
            $this->assertTrue(filter_var($datum['email'], FILTER_VALIDATE_EMAIL));
            $this->assertTrue(!isset($datum['password']));
        }
    }

    public function test_procura_usuario_por_id(): void
    {
        // colocar um ID de um usuário válido no database
        $id = 1;
        $endpoint = sprintf('api/user/%s/show', $id);

        $response = $this->get($endpoint);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);

        $data = $response->json('data');
        $this->assertIsArray($data);

        $this->assertIsString($data['name']);
        // $this->assertTrue(filter_var($data['email'], FILTER_VALIDATE_EMAIL));
        $this->assertTrue(!isset($data['password']));
    }

    public function test_usuario_nao_encontrado(): void
    {
        $id = Str::uuid()->toString();
        $endpoint = sprintf('/api/user/%s/show', $id);

        $response = $this->get($endpoint);
        // dd($response->getStatusCode());
        // $response->dd();

        // $response->assertStatus(404);
        $this->assertTrue($response->getStatusCode() === 404 );
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);

        $data = $response->json('data');
        $this->assertEmpty($data);
    }


    public function test_cria_novo_usuario(): void
    {
        $fake = Factory::create();
        $password = "123";

        $data = [
            'name' => $fake->name,
            'email' => $fake->email,
            'password' => $password,
            'password_confirmation' => $password,
            'group' => 'ADMIN'
        ];

        // dd($data);

        $endpoint = 'api/user/store';
        $response = $this->postJson($endpoint, $data);


        $response->assertStatus(201);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);
    }

    public function test_email_unico(): void
    {
        $fake = Factory::create();
        $email = 'teste_email_unico@gmail.com';
        // User::whereEmail($email)->delete();
        User::truncate();
        
        $password = "senha123";
        $data = [
            'name' => $fake->name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
            'group' => 'ADMIN'
        ];

        $endpoint = '/api/user/store';
        $response = $this->postJson($endpoint, $data);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);

        $response = $this->postJson($endpoint, $data);
        $response->assertStatus(422);
    }


}
