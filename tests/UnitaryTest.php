<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class UnitaryTest extends TestCase
{
    private $client;
    private $baseUrl = 'http://localhost:3000/';  // Reemplaza con tu URL base

    public function setUp(): void
    {
        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    /** @test */
    /*     public function testLoginSuccess(): void
        {
            echo "Ejecutando testLoginSuccess...\n";

            $credentials = [
                'email' => 'jefferson.alquinga1998@gmail.com', // Reemplaza con un email válido
                'password' => '123456' // Reemplaza con la contraseña válida
            ];

            $response = $this->client->request('POST', 'login', [
                'form_params' => $credentials
            ]);

            $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para login exitoso.");

            $body = json_decode($response->getBody()->getContents(), true);
            $this->assertArrayHasKey('token', $body, "Error: El token no está presente en la respuesta.");

            echo "TestLoginSuccess - Assertions OK\n";
        } */

    /** @test */

    /*
     * public function testLoginInvalidCredentials(): void
     *  {
     *      echo "Ejecutando testLoginInvalidCredentials...\n";
     *
     *      $credentials = [
     *          'email' => 'jefferson.alquinga1998@gmail.com',
     *          'password' => '1234563'
     *      ];
     *
     *      $response = $this->client->request('POST', 'login', [
     *          'form_params' => $credentials
     *      ]);
     *
     *      $this->assertEquals(401, $response->getStatusCode(), "Error: Código de estado incorrecto para credenciales inválidas.");
     *
     *      echo "TestLoginInvalidCredentials - Assertions OK\n";
     *  }
     */
    // Registro
    /** @test */

    /*
     * public function testRegistroSuccess(): void
     *  {
     *      echo "Ejecutando testRegistroSuccess...\n";
     *
     *      $userData = [
     *          'nombre' => 'Jefferson',
     *          'email' => 'jefferson.alquinga1998@gmail.com', // Reemplaza con un email válido
     *          'password' => '123456'
     *      ];
     *
     *      $response = $this->client->request('POST', 'registro', [
     *          'form_params' => $userData
     *      ]);
     *
     *      $this->assertEquals(201, $response->getStatusCode(), "Error: Código de estado incorrecto para registro exitoso.");
     *
     *      echo "TestRegistroSuccess - Assertions OK\n";
     *  }
     */
    /** @test */
    /*     public function testRegistroEmailExistente(): void
        {
            echo "Ejecutando testRegistroEmailExistente...\n";

            $userData = [
                'nombre' => 'Jeffeson',
                'email' => 'jefferson.alquinga1998@gmail.com', // Reemplaza con un email que ya existe
                'password' => '123456'
            ];

            $response = $this->client->request('POST', 'registro', [
                'form_params' => $userData
            ]);

            $this->assertEquals(400, $response->getStatusCode(), "Error: Código de estado incorrecto para email existente.");

            echo "TestRegistroEmailExistente - Assertions OK\n";
        } */

    // Olvide mi password

    /**
     * @test
     */
    public function testOlvidePassword(): void
    {
        echo "Ejecutando testOlvidePassword...\n";

        $email = 'jefferson.alquinga1998@gmail.com';  // Reemplaza con un email válido

        $response = $this->client->request('POST', 'olvide', [
            'form_params' => ['email' => $email]
        ]);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para recuperar contraseña.');

        echo "TestOlvidePassword - Assertions OK\n";
    }

    // Restablecer password

    /**
     * @test
     */
    public function testRestablecerPassword(): void
    {
        echo "Ejecutando testRestablecerPassword...\n";

        $token = '668fdd6077a9c';  // Reemplaza con un token válido
        $password = 'ContraseñaNueva123';

        $response = $this->client->request('POST', 'reestablecer', [
            'form_params' => ['token' => $token, 'password' => $password]
        ]);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para restablecer contraseña.');

        echo "TestRestablecerPassword - Assertions OK\n";
    }

    // Confirmación de cuenta

    /**
     * @test
     */
    public function testConfirmarCuenta(): void
    {
        echo "Ejecutando testConfirmarCuenta...\n";

        $token = '668fdd6077a9c';  // Reemplaza con un token válido

        $response = $this->client->request('GET', 'confirmar-cuenta?token=' . $token);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para confirmar cuenta.');

        echo "TestConfirmarCuenta - Assertions OK\n";
    }

    // Área de administración

    /**
     * @test
     */
    public function testAdminDashboard(): void
    {
        echo "Ejecutando testAdminDashboard...\n";

        $response = $this->client->request('GET', '/admin/dashboard');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para el dashboard de administrador.');

        echo "TestAdminDashboard - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testAdminPonentes(): void
    {
        echo "Ejecutando testAdminPonentes...\n";

        $response = $this->client->request('GET', '/admin/ponentes');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para la lista de ponentes.');

        echo "TestAdminPonentes - Assertions OK\n";
    }

    // Ponentes (crear, editar, eliminar)
    /** @test */

    /*
     * public function testAdminPonentesCrear(): void
     * {
     *     echo "Ejecutando testAdminPonentesCrear...\n";
     *
     *     $data = [
     *         'nombre' => 'Nombre del Ponente',
     *         'biografia' => 'Biografía del Ponente',
     *         // ... otros datos necesarios para el formulario
     *     ];
     *
     *     $response = $this->client->request('POST', '/admin/ponentes/crear', [
     *         'form_params' => $data
     *     ]);
     *
     *     $this->assertEquals(201, $response->getStatusCode(), "Error: Código de estado incorrecto para crear un ponente.");
     *
     *     echo "TestAdminPonentesCrear - Assertions OK\n";
     * }
     */

    /**
     * @test
     */
    public function testAdminPonentesEditar(): void
    {
        echo "Ejecutando testAdminPonentesEditar...\n";

        $id = 1;  // Reemplaza con un ID de ponente válido
        $data = [
            'nombre' => 'Nombre del Ponente (Actualizado)',
            // ... otros datos necesarios para el formulario
        ];

        $response = $this->client->request('POST', '/admin/ponentes/editar?id=' . $id, [
            'form_params' => $data
        ]);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para editar un ponente.');

        echo "TestAdminPonentesEditar - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testAdminPonentesEliminar(): void
    {
        echo "Ejecutando testAdminPonentesEliminar...\n";

        $id = 1;  // Reemplaza con un ID de ponente válido

        $response = $this->client->request('POST', '/admin/ponentes/eliminar?id=' . $id);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para eliminar un ponente.');

        echo "TestAdminPonentesEliminar - Assertions OK\n";
    }

    // Eventos (crear, editar, eliminar)
    /** @test */
    /*  public function testAdminEventosCrear(): void
     {
         echo "Ejecutando testAdminEventosCrear...\n";

         $data = [
             'nombre' => 'Nombre del Evento',
             'fecha' => '2024-12-31', // Reemplaza con una fecha válida
             // ... otros datos necesarios para el formulario
         ];

         $response = $this->client->request('POST', '/admin/eventos/crear', [
             'form_params' => $data
         ]);

         $this->assertEquals(201, $response->getStatusCode(), "Error: Código de estado incorrecto para crear un evento.");

         echo "TestAdminEventosCrear - Assertions OK\n";
     } */

    /**
     * @test
     */
    public function testAdminEventosEditar(): void
    {
        echo "Ejecutando testAdminEventosEditar...\n";

        $id = 1;  // Reemplaza con un ID de evento válido
        $data = [
            'nombre' => 'Nombre del Evento (Actualizado)',
            // ... otros datos necesarios para el formulario
        ];

        $response = $this->client->request('POST', '/admin/eventos/editar?id=' . $id, [
            'form_params' => $data
        ]);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para editar un evento.');

        echo "TestAdminEventosEditar - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testAdminEventosEliminar(): void
    {
        echo "Ejecutando testAdminEventosEliminar...\n";

        $id = 1;  // Reemplaza con un ID de evento válido

        $response = $this->client->request('POST', '/admin/eventos/eliminar?id=' . $id);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para eliminar un evento.');

        echo "TestAdminEventosEliminar - Assertions OK\n";
    }

    // API para horario
    /** @test */

    /*
     * public function testGetEventosHorarioEndpoint(): void
     * {
     *     echo "Ejecutando testGetEventosHorarioEndpoint...\n";
     *
     *     $response = $this->client->request('GET', '/api/eventos-horario');
     *
     *     $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para obtener el horario de eventos.");
     *
     *     $body = json_decode($response->getBody()->getContents(), true);
     *     $this->assertArrayHasKey('events', $body, "Error: La respuesta no contiene el campo 'events'.");
     *     $this->assertGreaterThanOrEqual(1, count($body['events']), "Error: No se encontraron eventos en el horario.");
     *
     *     echo "TestGetEventosHorarioEndpoint - Assertions OK\n";
     * }
     */
    // API ponentes
    /** @test */
    /*  public function testGetPonentesEndpoint(): void
     {
         echo "Ejecutando testGetPonentesEndpoint...\n";

         $response = $this->client->request('GET', '/api/ponentes');

         $this->assertEquals(200, $response->getStatusCode(), "Error: Código de estado incorrecto para obtener la lista de ponentes.");

         $body = json_decode($response->getBody()->getContents(), true);
         $this->assertGreaterThanOrEqual(1, count($body), "Error: No se encontraron ponentes.");

         echo "TestGetPonentesEndpoint - Assertions OK\n";
     } */

    /**
     * @test
     */
    /* public function testGetPonenteEndpoint(): void
    {
        echo "Ejecutando testGetPonenteEndpoint...\n";

        $id = 1;  // Reemplaza con un ID de ponente válido

        $response = $this->client->request('GET', '/api/ponente?id=' . $id);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para obtener un ponente.');

        $body = json_decode($response->getBody()->getContents(), true);
        $this->assertArrayHasKey('nombre', $body, "Error: La respuesta no contiene el campo 'nombre'.");
        $this->assertArrayHasKey('biografia', $body, "Error: La respuesta no contiene el campo 'biografia'.");

        echo "TestGetPonenteEndpoint - Assertions OK\n";
    }
 */
    // API Registrados

    /**
     * @test
     */
    public function testGetRegistradosEndpoint(): void
    {
        echo "Ejecutando testGetRegistradosEndpoint...\n";

        $response = $this->client->request('GET', '/admin/registrados');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para obtener la lista de registrados.');

        echo "TestGetRegistradosEndpoint - Assertions OK\n";
    }

    // CHAT DOG
    // API Prompts

    /**
     * @test
     */
    public function testGetPromptsEndpoint(): void
    {
        echo "Ejecutando testGetPromptsEndpoint...\n";

        $response = $this->client->request('GET', '/admin/prompts');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para obtener la lista de prompts.');

        echo "TestGetPromptsEndpoint - Assertions OK\n";
    }

    /** @test */

    /*
     * public function testAdminPromptsCrear(): void
     * {
     *     echo "Ejecutando testAdminPromptsCrear...\n";
     *
     *     $data = [
     *         'prompt' => 'Ejemplo de prompt',
     *         // ... otros datos necesarios para el formulario
     *     ];
     *
     *     $response = $this->client->request('POST', '/admin/prompts/crear', [
     *         'form_params' => $data
     *     ]);
     *
     *     $this->assertEquals(201, $response->getStatusCode(), "Error: Código de estado incorrecto para crear un prompt.");
     *
     *     echo "TestAdminPromptsCrear - Assertions OK\n";
     * }
     */

    /**
     * @test
     */
    public function testAdminPromptsEditar(): void
    {
        echo "Ejecutando testAdminPromptsEditar...\n";

        $id = 1;  // Reemplaza con un ID de prompt válido
        $data = [
            'prompt' => 'Ejemplo de prompt (Actualizado)',
            // ... otros datos necesarios para el formulario
        ];

        $response = $this->client->request('POST', '/admin/prompts/editar?id=' . $id, [
            'form_params' => $data
        ]);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para editar un prompt.');

        echo "TestAdminPromptsEditar - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testAdminPromptsEliminar(): void
    {
        echo "Ejecutando testAdminPromptsEliminar...\n";

        $id = 1;  // Reemplaza con un ID de prompt válido

        $response = $this->client->request('POST', '/admin/prompts/eliminar?id=' . $id);

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para eliminar un prompt.');

        echo "TestAdminPromptsEliminar - Assertions OK\n";
    }

    // API Regalos

    /**
     * @test
     *//* 
    public function testGetRegalosEndpoint(): void
    {
        echo "Ejecutando testGetRegalosEndpoint...\n";

        $response = $this->client->request('GET', '/api/regalos');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para obtener la lista de regalos.');

        $body = json_decode($response->getBody()->getContents(), true);
        $this->assertGreaterThanOrEqual(1, count($body), 'Error: No se encontraron regalos.');

        echo "TestGetRegalosEndpoint - Assertions OK\n";
    } */

    // Registro de Usuarios

    /**
     * @test
     */
    public function testFinalizarRegistroCrear(): void
    {
        echo "Ejecutando testFinalizarRegistroCrear...\n";

        $response = $this->client->request('GET', '/finalizar-registro');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para obtener el formulario de registro.');

        echo "TestFinalizarRegistroCrear - Assertions OK\n";
    }

    /** @test */
    /* public function testFinalizarRegistroGratis(): void
    {
        echo "Ejecutando testFinalizarRegistroGratis...\n";

        $formData = [
            'nombre' => 'Nombre del Usuario',
            'email' => 'correo@ejemplo.com',
            // ... otros datos necesarios para el formulario
        ];

        $response = $this->client->request('POST', 'finalizar-registro/gratis', [
            'form_params' => $formData
        ]);

        $this->assertEquals(201, $response->getStatusCode(), "Error: Código de estado incorrecto para finalizar registro gratuito.");

        echo "TestFinalizarRegistroGratis - Assertions OK\n";
    } */

    /** @test */

    /*
     * public function testFinalizarRegistroPagar(): void
     * {
     *     echo "Ejecutando testFinalizarRegistroPagar...\n";
     *
     *     $formData = [
     *         // ... datos del formulario
     *     ];
     *
     *     $response = $this->client->request('POST', 'finalizar-registro/pagar', [
     *         'form_params' => $formData
     *     ]);
     *
     *     $this->assertEquals(302, $response->getStatusCode(), "Error: Código de estado incorrecto para finalizar registro de pago.");
     *     $this->assertStringContainsString('https://www.ejemplo.com', $response->getHeader('Location')[0], "Error: URL de redirección incorrecta.");
     *
     *     echo "TestFinalizarRegistroPagar - Assertions OK\n";
     * }
     */

    /**
     * @test
     */
    public function testFinalizarRegistroConferencias(): void
    {
        echo "Ejecutando testFinalizarRegistroConferencias...\n";

        $response = $this->client->request('GET', 'finalizar-registro/conferencias');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para obtener el formulario de conferencias.');

        echo "TestFinalizarRegistroConferencias - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testBoletoVirtual(): void
    {
        echo "Ejecutando testBoletoVirtual...\n";

        $response = $this->client->request('GET', '/boleto');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para obtener el boleto virtual.');

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

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para la página de inicio.');

        echo "TestIndex - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testChatDog(): void
    {
        echo "Ejecutando testChatDog...\n";

        $response = $this->client->request('GET', '/chat-dog');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para la página de Chat Dog.');

        echo "TestChatDog - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testEvento(): void
    {
        echo "Ejecutando testEvento...\n";

        $response = $this->client->request('GET', '/milenyum-dog');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para la página de evento.');

        echo "TestEvento - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testPaquetes(): void
    {
        echo "Ejecutando testPaquetes...\n";

        $response = $this->client->request('GET', '/paquetes');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para la página de paquetes.');

        echo "TestPaquetes - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testConferencias(): void
    {
        echo "Ejecutando testConferencias...\n";

        $response = $this->client->request('GET', '/conferencias-workshops');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para la página de conferencias.');

        echo "TestConferencias - Assertions OK\n";
    }

    /**
     * @test
     */
    public function testError404(): void
    {
        echo "Ejecutando testError404...\n";

        $response = $this->client->request('GET', '/404');

        $this->assertEquals(200, $response->getStatusCode(), 'Error: Código de estado incorrecto para la página de error.');

        echo "TestError404 - Assertions OK\n";
    }
}
