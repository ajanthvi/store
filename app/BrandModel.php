<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $table = 'brands';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    /**
     *Get Brands
     * @return mixed
     * @throws Exception
     */
    public function getBrands()
    {
        try {
            return $this->select('id as brandId', 'name')->get();

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     *Get Brand name
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getBrandName($id)
    {
        try {
            return $this->select('name')->where('id', $id)->first();

        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
