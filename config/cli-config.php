<?php
/**
 * User: zhiqiang
 * Date: 18/9/17
 * Time: 09:18
 * Email: 1195775472@qq.com
 * Copyright: zzq
 */

// 如果是生产环境
// if (app()->environment() == 'prod') return;

use App\Services\Doctrine;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$doctrine = new Doctrine();

return ConsoleRunner::createHelperSet($doctrine->em);


