<?php

declare(strict_types=1);

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineOrmContext extends BaseContext
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * {@inheritdoc}
     */
    protected function initialize()
    {
        $paths = [__DIR__.'/../../../examples/entities']; // meh.
        $isDevMode = true;

        // the connection configuration
        $dbParams = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__.'/../../../examples/rulerz.db', // meh.
        ];

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        $this->entityManager = EntityManager::create($dbParams, $config);
    }

    /**
     * {@inheritdoc}
     */
    protected function getCompilationTarget()
    {
        return new \RulerZ\Target\DoctrineORM\DoctrineORM();
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultDataset()
    {
        return $this->entityManager
            ->createQueryBuilder()
            ->select('p')
            ->from('Entity\Doctrine\Player', 'p');
    }

    /**
     * @When I use the query builder dataset
     */
    public function iUseTheQueryBuilderDataset()
    {
        $this->dataset = $this->getDefaultDataset();
    }
}
