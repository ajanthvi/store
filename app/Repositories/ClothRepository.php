<?php

namespace App\Repositories;

use App\BrandModel;
use App\ClothModel;
use Exception;
use Illuminate\Support\Facades\DB;

class ClothRepository implements ClothRepositoryInterface
{

    private $clothModel;
    private $brandModel;

    /**
     * ClothRepository constructor.
     * @param ClothModel $clothModel
     * @param BrandModel $brandModel
     */
    public function __construct(ClothModel $clothModel, BrandModel $brandModel)
    {
        $this->clothModel = $clothModel;
        $this->brandModel = $brandModel;
    }

    /**
     * Get clothes
     *
     * @return mixed
     */
    public function getClothes()
    {
        return $this->clothModel->getClothes();
    }

    /**
     * Get brands
     *
     * @return mixed
     */
    public function getBrands()
    {
        return $this->brandModel->getBrands();
    }

    /**
     * Create clothes
     *
     * @param $data
     * @return bool
     * @throws Exception
     */
    public function createClothes($data)
    {
        try {
            DB::beginTransaction();

            $brandId = $data['brand_id'];

            $brand = $this->brandModel->getBrandName($brandId);

            switch ($brand->name) {
                case "Adidas":
                    $data['selling_price'] = ((int)$data['cost'] + (int)$data['cost'] * (15 / 100));
                    break;
                case "Nike":
                    $data['selling_price'] = ((int)$data['cost'] + (int)$data['cost'] * (15 / 100) + 100);
                    break;
                default:
                    $data['selling_price'] = ((int)$data['cost'] + (int)$data['cost'] * (10 / 100));
            }

            $dataArray ['name'] = $data['name'];
            $dataArray ['short_description'] = $data['short_description'];
            $dataArray ['product_code'] = $data['product_code'];
            $dataArray ['cost'] = $data['cost'];
            $dataArray ['selling_price'] = $data['selling_price'];
            $dataArray ['brand_id'] = $data['brand_id'];
            $dataArray ['color'] = $data['color'];
            $dataArray ['size'] = $data['size'];

            // Create level table record
            $level = $this->clothModel->create(array_only($dataArray, ['name', 'product_code', 'short_description', 'cost', 'selling_price', 'brand_id', 'color', 'size']));
            $level->save();

            DB::commit();
            return true;
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    /**
     * Delete cloth
     *
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function deleteCloth($id)
    {
        try {
            $cloth = $this->clothModel->find($id);
            $cloth->delete();

            return false;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}