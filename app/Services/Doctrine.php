<?php
namespace App\Services;

/**
 * Class Doctrine
 *
 * @package Config
 */
class Doctrine
{

    /**
     * Doctrine实体管理器
     *
     * @var \Doctrine\ORM\EntityManager|null
     */
    public $em = null;

    /**
     * Doctrine constructor.
     */
    public function __construct()
    {
        if (! defined('THIRD_PATH')) {
            define('THIRD_PATH', rtrim(dirname(dirname(__DIR__)), '/') . DIRECTORY_SEPARATOR);
        }

        // 加载Doctrine的一些类
        $doctrineClassLoader = new \Doctrine\Common\ClassLoader('Doctrine',  THIRD_PATH . 'Doctrine');
        $doctrineClassLoader->register();

        // 加载Symfony2的帮助类
        $symfonyClassLoader = new \Doctrine\Common\ClassLoader('Symfony', THIRD_PATH . 'Doctrine');
        $symfonyClassLoader->register();

        // 加载实体
        $entityClassLoader = new \Doctrine\Common\ClassLoader('Entity', THIRD_PATH . 'Doctrine/Entity');
        $entityClassLoader->register();

        // 加载代理实体
        $proxyClassLoader = new \Doctrine\Common\ClassLoader('Proxies', THIRD_PATH . 'Doctrine/Entity');
        $proxyClassLoader->register();

        // 设置一些配置
        $config = new \Doctrine\ORM\Configuration;
        $cache  = new \Doctrine\Common\Cache\ArrayCache;
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // 设置代理配置
        $config->setProxyDir(THIRD_PATH . 'Doctrine/Proxies');
        $config->setProxyNamespace('Proxies');

        // 在开发模式下，自动生成代理类
        $config->setAutoGenerateProxyClasses(true);

        // 设置注解驱动
        $yamlDriver = new \Doctrine\ORM\Mapping\Driver\YamlDriver(THIRD_PATH . 'Doctrine/Mappings');
        $config->setMetadataDriverImpl($yamlDriver);

        $logger = new \Doctrine\DBAL\Logging\EchoSQLLogger;
        $config->setSQLLogger($logger);

        // 读取数据库配置
        // $db  = config('database.default');
        //$con = Config::get('database');
        $con = [
            'driver' => 'pdo_mysql',
            'host' => '127.0.0.1',
            'database' => 'meow',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8mb4',
        ];

        // 数据库连接信息
        $connectionOptions = [
            'driver'   => $con['driver'],
            'host'     => $con['host'],
            'dbname'   => $con['database'],
            'user'     => $con['username'],
            'password' => $con['password'],
            'charset'  => $con['charset'],
        ];
        // 创建实体管理器
        $em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);
        // 将实体管理器保存为一个成员，在控制器中使用
        $this->em = $em;

        // 设置 Entity 的命名空间(这里很重要，不然找不到文件）
        $driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver($em->getConnection()->getSchemaManager());
        $driver->setNamespace('Entity\\');
        $em->getConfiguration()->setMetadataDriverImpl($driver);

    }

    public function getEntityManager()
    {
        return $this->em;
    }
}