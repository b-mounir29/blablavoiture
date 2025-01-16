<?php

namespace database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\BrandModel;

class BrandModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    protected $migrate = true;

    protected function setUp(): void
    {
        parent::setUp();

        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        $this->db->table('CarBrand')->truncate();

        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        // Vider la table
        $this->db->table('CarBrand')->truncate();

        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    public function testInsertBrand()
    {
        $model = new BrandModel();
        $data = [
            'name' => 'Toyota',
        ];

        $result = $model->insertBrand($data);
        $this->assertIsInt($result); // Vérifie que l'ID retourné est un entier
        $this->assertGreaterThan(0, $result); // Vérifie que l'ID est supérieur à 0

        // Vérifie que la marque a été insérée dans la base de données
        $this->seeInDatabase('CarBrand', ['name' => 'Toyota']);
    }

    public function testGetBrand()
    {
        $model = new BrandModel();
        $data = [
            'name' => 'Honda',
        ];
        $id = $model->insertBrand($data);

        $brand = $model->getBrand($id);
        $this->assertIsArray($brand);
        $this->assertEquals('Honda', $brand['name']);
    }

    public function testDeleteBrand()
    {
        $model = new BrandModel();
        $data = [
            'name' => 'Ford',
        ];
        $id = $model->insertBrand($data);

        $deleted = $model->deleteBrand($id);
        $this->assertTrue($deleted); // Vérifie que la suppression retourne true

        // Vérifie que la marque a été supprimée de la base de données
        $this->dontSeeInDatabase('CarBrand', ['id' => $id]);
    }

    public function testGetPaginated()
    {
        $model = new BrandModel();

        $model->insertBrand(['name' => 'BMW']);
        $model->insertBrand(['name' => 'Audi']);
        $model->insertBrand(['name' => 'Mercedes']);

        $brands = $model->getPaginated(0, 2, null, 'name', 'ASC');

        $this->assertCount(2, $brands); // Vérifie que la pagination retourne 2 résultats
        $this->assertEquals('Audi', $brands[0]['Marque']); // Vérifie que le tri est correct
    }

    public function testGetTotal()
    {
        $model = new BrandModel();

        $model->insertBrand(['name' => 'Peugeot']);
        $model->insertBrand(['name' => 'Citroën']);

        $total = $model->getTotal();
        $this->assertEquals(2, $total);
    }

    public function testGetFiltered()
    {
        $model = new BrandModel();

        $model->insertBrand(['name' => 'Renault']);
        $model->insertBrand(['name' => 'Dacia']);

        $filtered = $model->getFiltered('Renault');
        $this->assertEquals(1, $filtered);
    }
}