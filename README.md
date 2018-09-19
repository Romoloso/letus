<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Functions
- [Laravel 5.4 passport](https://medium.com/modulr/create-api-authentication-with-passport-of-laravel-5-6-1dc2d400a7f)
- Login and login attempts.
- Login Testing.
- Doctrine mapping and entities.
- [Test adding user](https://medium.com/@jsdecena/simple-tdd-in-laravel-with-11-steps-c475f8b1b214).
- Test register and login

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
### Testing
- 添加自定义内容到`header`  
    - 第一种方式：
    ```
    $this->call('POST', route('users.store'), $data, [], [],['X-CSRF_TOKEN'=>csrf_token()])
    ```
    - 第二种方式：
    ```
    $data = [
                'name' => $this->faker->name,
                'email' => $this->faker->unique()->email,
                'password' => bcrypt(123456),
                '_token' => csrf_token()    // 需要执行 call 方法后才能有值
            ];
    $this->call('POST', route('users.store'), $data)->assertStatus(201)
    ```
- 测试`API`注册登录