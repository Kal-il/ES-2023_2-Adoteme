<?php 

use controller\FavoritosController;
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';
class FavoritosControllerTest extends TestCase {
    private $favoritosController;

    protected function setUp(): void
    {
        $this->favoritosController = new FavoritosController();
    }
    public function testAddFavoritos()
    {
        $data = [
            "usuario_id" => 1,
            "gato_id" => 1
        ];

        $this->favoritosController->addFavoritos($data);

        $favoritos = $this->favoritosController->getFavoritos($data);

        $this->assertNotEmpty($favoritos);
    }
}
?>