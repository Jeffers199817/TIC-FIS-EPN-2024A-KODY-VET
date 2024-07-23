<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class IntegrationTest extends TestCase
{
    private $client;
    private $baseUrl = 'http://localhost:3000/'; // Reemplaza con tu URL base

    public function setUp(): void
    {
        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    /**
     * @test
     */
    public function testOlvidePasswordYRestablecer(): void
    {
        echo "Ejecutando testOlvidePasswordYRestablecer...\n"; 

        // 1. Solicitar un nuevo token de restablecimiento de contraseña
        $email = 'nuevousuario@ejemplo.com'; // Reemplaza con un email válido
        $response = $this->client->request('POST', 'olvide', [
            'form_params' => ['email' => $email]
        ]);

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para recuperar contraseña.");

        // 2.  Restablecer la contraseña con el token 
        $token = 'tu_token'; // Reemplaza con un token válido que se obtiene de la respuesta anterior
        $password = 'ContraseñaNueva123';

        $response = $this->client->request('POST', 'reestablecer', [
            'form_params' => ['token' => $token, 'password' => $password]
        ]);

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para restablecer contraseña.");

        echo "TestOlvidePasswordYRestablecer - Assertions OK\n"; 
    }
   

    /**
     * @test
     */
    /* public function testComprarPaquete(): void
    {
        echo "Ejecutando testComprarPaquete...\n"; 

        // ... (código para simular un usuario que ya ha iniciado sesión)

        // 1. Obtener información del paquete
        $response = $this->client->request('GET', '/paquetes');
        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para obtener paquetes.");
        // ... (extraer el ID del paquete que quieres comprar)

        // 2. Simular una compra
        $response = $this->client->request('POST', '/finalizar-registro/pagar', [
            'form_params' => [
                'paquete_id' => $paqueteId,
                // ... otros datos del formulario
            ]
        ]);

        // 3. Verificar el estado de la compra (puede depender de tu API)
        $this->assertEquals(302, $response->getStatusCode(), "Error: Código de estado incorrecto para compra.");
        // ... (assertions para verificar el estado de la compra, por ejemplo, si se ha redirigido correctamente)

        echo "TestComprarPaquete - Assertions OK\n"; 
    }
     */
    /**
     * @test
     */
    public function testFinalizarRegistroConferencias(): void
    {
        echo "Ejecutando testFinalizarRegistroConferencias...\n"; 

        $response = $this->client->request('GET', 'finalizar-registro/conferencias');

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para obtener el formulario de conferencias.");

        echo "TestFinalizarRegistroConferencias - Assertions OK\n"; 
    }

    /**
     * @test
     */
    public function testBoletoVirtual(): void
    {
        echo "Ejecutando testBoletoVirtual...\n"; 

        $response = $this->client->request('GET', '/boleto');

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para obtener el boleto virtual.");

        echo "TestBoletoVirtual - Assertions OK\n"; 
    }

    // Área Pública
    /**
     * @test
     */
    public function testIndex(): void
    {
        echo "Ejecutando testIndex...\n"; 

        $response = $this->client->request('GET', '/');

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para la página de inicio.");

        echo "TestIndex - Assertions OK\n"; 
    }

    /**
     * @test
     */
    public function testChatDog(): void
    {
        echo "Ejecutando testChatDog...\n"; 

        $response = $this->client->request('GET', '/chat-dog');

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para la página de Chat Dog.");

        echo "TestChatDog - Assertions OK\n"; 
    }

    /**
     * @test
     */
    public function testEvento(): void
    {
        echo "Ejecutando testEvento...\n"; 

        $response = $this->client->request('GET', '/milenyum-dog');

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para la página de evento.");

        echo "TestEvento - Assertions OK\n"; 
    }

    /**
     * @test
     */
    public function testPaquetes(): void
    {
        echo "Ejecutando testPaquetes...\n"; 

        $response = $this->client->request('GET', '/paquetes');

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para la página de paquetes.");

        echo "TestPaquetes - Assertions OK\n"; 
    }

    /**
     * @test
     */
    public function testConferencias(): void
    {
        echo "Ejecutando testConferencias...\n"; 

        $response = $this->client->request('GET', '/conferencias-workshops');

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para la página de conferencias.");

        echo "TestConferencias - Assertions OK\n"; 
    }

    /**
     * @test
     */
    public function testError404(): void
    {
        echo "Ejecutando testError404...\n"; 

        $response = $this->client->request('GET', '/404');

        $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para la página de error.");

        echo "TestError404 - Assertions OK\n"; 
    }
}