<?php

declare(strict_types=1);

use BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types\AuthorNameType;
use BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types\EmailAddressType;
use BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types\IsbnType;
use BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types\PublisherNameType;
use BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types\PublisherPhoneType;
use BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types\TimestampType;
use BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types\TitleType;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container): void {
    $container->extension(
        namespace: 'doctrine',
        config: [
            'dbal' => [
                'override_url' => true,
                'url' => '%env(resolve:DATABASE_URL)%',
                'types' => [
                    'timestamp' => TimestampType::class,
                    'email_address' => EmailAddressType::class,
                    'author_name' => AuthorNameType::class,
                    'publisher_name' => PublisherNameType::class,
                    'publisher_phone' => PublisherPhoneType::class,
                    'isbn' => IsbnType::class,
                    'title' => TitleType::class,
                ],
            ],
            'orm' => [
                'auto_generate_proxy_classes' => true,
                'naming_strategy' => 'doctrine.orm.naming_strategy.underscore_number_aware',
                'auto_mapping' => true,
                'mappings' => [
                    'Domain' => [
                        'is_bundle' => false,
                        'type' => 'annotation',
                        'dir' => '%kernel.project_dir%/src/Domain',
                        'prefix' => 'BookShop\\Domain',
                        'alias' => 'Domain',
                    ],
                    'EventStore' => [
                        'is_bundle' => false,
                        'type' => 'annotation',
                        'dir' => '%kernel.project_dir%/src/Infrastructure/Adapters/Doctrine/EventStore',
                        'prefix' => 'BookShop\\Infrastructure\\Adapters\\Doctrine\\EventStore',
                        'alias' => 'EventStore',
                    ],
                ],
            ],
        ],
    );
};
