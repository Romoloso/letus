<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Functions
- Laravel 5.4 passport
- Login and login attempts.
- Login Testing.
- Doctrine mapping and entities.

## 命令行工具

 ```
 php artisan list
 ```

### Doctrine

```
# 数据表转 yml 映射文件(已支持字段注释直接转化为yml文件)
vendor\bin\doctrine orm:convert-mapping --from-database yml Doctrine/Mappings --force.
# 生成 Entity 文件
vendor\bin\doctrine orm:generate-entities Doctrine
# 查看 更新SQL
vendor\bin\doctrine orm:schema-tool:update --dump-sql
# 执行更新
vendor\bin\doctrine orm:schema-tool:update --force
```
