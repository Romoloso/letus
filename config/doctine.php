<?php
/**
 * User: zhiqiang
 * Date: 18/9/17
 * Time: 09:18
 * Email: 1195775472@qq.com
 * Copyright: zzq
 */
namespace Config;

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
        // 加载Doctrine的一些类
        $doctrineClassLoader = new \Doctrine\Common\ClassLoader('Doctrine',  app_path('ThirdParty/Doctrine/'));
        $doctrineClassLoader->register();

        // 加载Symfony2的帮助类
        $symfonyClassLoader = new \Doctrine\Common\ClassLoader('Symfony', app_path('ThirdParty/Doctrine'));
        $symfonyClassLoader->register();

        // 加载实体
        $entityClassLoader = new \Doctrine\Common\ClassLoader('Entity', app_path('ThirdParty/Doctrine/Entity'));
        $entityClassLoader->register();

        // 加载代理实体
        $proxyClassLoader = new \Doctrine\Common\ClassLoader('Proxies', app_path('ThirdParty/Doctrine/Entity'));
        $proxyClassLoader->register();

        // 设置一些配置
        $config = new \Doctrine\ORM\Configuration;
        $cache  = new \Doctrine\Common\Cache\ArrayCache;
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // 设置代理配置
        $config->setProxyDir(app_path('ThirdParty/Proxies'));
        $config->setProxyNamespace('Proxies');

        // 在开发模式下，自动生成代理类
        $config->setAutoGenerateProxyClasses(app()->environment() == 'local');

        // 设置注解驱动
        $yamlDriver = new \Doctrine\ORM\Mapping\Driver\YamlDriver(app_path('ThirdParty/Doctrine/Mappings'));
        $config->setMetadataDriverImpl($yamlDriver);

        // 读取数据库配置
        $db  = config('database.default');
        $con = config('database.connections')[$db];

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
        // 将实体管理器保存为一个成员，在YP的控制器中使用
        $this->em = $em;
    }
}
