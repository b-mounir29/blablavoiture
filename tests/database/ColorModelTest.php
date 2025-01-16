<?php

namespace database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\ColorModel;

class ColorModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    protected $migrate = true;

    protected function setUp(): void
    {
        parent::setUp();

        // Désactiver la vérification des clés étrangères
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        // Truncate la table `color` avant chaque test
        $this->db->table('color')->truncate();

        // Réactiver la vérification des clés étrangères
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Désactiver la vérification des clés étrangères
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        // Truncate de table
        $this->db->table('color')->truncate();

        // Réactiver la vérification des clés étrangères
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    public function testInsertColor()
    {
        $model = new ColorModel();
        $data = [
            'name' => 'Red',
        ];
        $insertedId = $model->insert($data);

        // Vérifie qu'un ID valide est retourné
        $this->assertIsInt($insertedId);
        $this->assertGreaterThan(0, $insertedId);

        // Vérifie que la couleur a bien été insérée dans la base de données
        $this->seeInDatabase('color', ['id' => $insertedId, 'name' => 'Red']);
    }

    public function testUpdateColor()
    {
        $model = new ColorModel();
        $data = [
            'name' => 'Blue',
        ];
        $insertedId = $model->insert($data);

        // essayer la  mise à  jour la couleur
        $updateData = ['name' => 'Green'];
        $model->update($insertedId, $updateData);

        // Vérifie que la couleur a bien été mise à jour
        $this->seeInDatabase('color', ['id' => $insertedId, 'name' => 'Green']);
    }

    public function testDeleteColor()
    {
        $model = new ColorModel();
        $data = [
            'name' => 'Yellow',
        ];
        $insertedId = $model->insert($data);

        // Supprime la couleur
        $model->delete($insertedId);

        // Vérifie que la couleur a bien été supprimée de la base de données
        $this->dontSeeInDatabase('color', ['id' => $insertedId]);
    }

    public function testFindAllColors()
    {
        $model = new ColorModel();
        $data1 = ['name' => 'Black'];
        $data2 = ['name' => 'White'];

        $model->insert($data1);
        $model->insert($data2);

        // Récupère toutes les couleurs
        $colors = $model->findAll();

        // Vérifie qu'il y a bien deux couleurs dans le tableau retourné
        $this->assertCount(2, $colors);
        $this->assertEquals('Black', $colors[0]['name']);
        $this->assertEquals('White', $colors[1]['name']);
    }

    public function testFindColorById()
    {
        $model = new ColorModel();
        $data = ['name' => 'Purple'];
        $insertedId = $model->insert($data);

        // Récupère la couleur par son ID
        $color = $model->find($insertedId);

        // Vérifie que la couleur correspond bien
        $this->assertEquals('Purple', $color['name']);
    }
}