<?php

namespace App\Repositories;

interface ClothRepositoryInterface
{
    public function getClothes();

    public function getBrands();

    public function createClothes($data);
}