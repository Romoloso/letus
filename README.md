# letus

Obtain invalid url 

# Install

Via Composer 
```
$ composer require romoloso/letus
```

# Usage

```
<?php

require(__DIR__ . '/vendor/autoload.php');

$urls = [
	'http://234234324.com'
];

$scanner = new \Romolo\LetUs\Url\Scanner($urls);

print_r($scanner->getInvalidUrls());
```

# License
The MIT License (MIT). Please see [License File](https://github.com/Romoloso/letus/blob/master/LICENSE) for more information.