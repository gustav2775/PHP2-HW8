<?php

use app\model\entities\Catalog;
use app\model\repositories\{CatalogRepository};
use PHPUnit\Framework\TestCase;

class CatalogTest extends TestCase
{

    protected static $catalog;

    public static function setUpBeforeClass(): void
    {
        self::$catalog = new Catalog();
    }
    public static function tearDownAfterClass(): void
    {
        self::$catalog = NULL;
    }

    public function testAll()
    {
        $page = '*';
        $catalogAll = (new CatalogRepository)->getAll($page);
        $this->assertNotFalse($catalogAll);
    }

    /** 
     * @dataProvider providerCatalog
     */
    public function testInsert($a, $b, $c)
    {
        $catalog = new Catalog($a, $b, $c);
        self::$catalog = (new CatalogRepository)->insert($catalog);

        (new CatalogRepository)->getOne(self::$catalog->id);
        $this->assertEquals('test', self::$catalog->name_product);
    }

    public function testOne()
    {
        $id = self::$catalog->id;
        $catalogOne = (new CatalogRepository)->getOne($id);
        $this->assertNotFalse($catalogOne);
    }

    /** 
     * @dataProvider providerCatalog
     */
    public function testUpdate($d)
    {
        $oldCatalog = self::$catalog;

        self::$catalog->name_product = $d;
        $newCatalog = (new CatalogRepository)->update(self::$catalog);

        $this->assertEquals($newCatalog, $oldCatalog);
    }
    
    public function testDelete()
    {
        $id = self::$catalog->id;
        (new CatalogRepository)->getOne($id)->delete();

        $catalog = (new CatalogRepository)->getOne($id);
        $this->assertFalse($catalog);
    }


    public function providerCatalog()
    {
        return array(
            array('test', 1, 'description', 'update')
        );
    }
}
