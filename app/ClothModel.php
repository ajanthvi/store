<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class ClothModel extends Model
{
    protected $table = 'clothes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'product_code', 'short_description', 'cost', 'selling_price', 'brand_id', 'color', 'size'];


    /**
     * Get clothes
     *
     * @return mixed
     * @throws Exception
     */
    public function getClothes()
    {
        try {
            return $this->select(
                'clothes.id as clothId',
                'clothes.name as clothName',
                'product_code',
                'cost',
                'selling_price',
                'brands.name as brandName',
                'color',
                'size')
                ->join('brands', 'clothes.brand_id', '=', 'brands.id')
                ->paginate(5);

        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
