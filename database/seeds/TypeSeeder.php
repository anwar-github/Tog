<?php

use Illuminate\Database\Seeder;

/**
 * Class TypeSeeder
 */
class TypeSeeder extends Seeder
{
    /**
     * @var \Tog\User\Type\Repository\TypeRepository $repository
     */
    protected $repository;

    /**
     * @param \Tog\User\Type\Repository\TypeRepository $repository
     */
    public function run(\Tog\User\Type\Repository\TypeRepository $repository)
    {
        $statusAvailable = \Tog\User\Type\TypeContract::STATUS_AVAILABLE;

        foreach ($statusAvailable as $key => $status) {
            $axist = $repository->findWhere([ 'name' => $status ]);

            if (count($axist) == 0) {
                $repository->create([ 'name' => $status ]);
            }
        }
    }
}
