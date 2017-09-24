# e瞳统一开发包

## 安装

```bash
composer require ganlvtech/eeyes-common
```

## 使用

```php
<?php
require './vendor/autoload.php';

\Eeyes\Common\EeyesCommon::config([
    'API_URL' => 'https://api.eeyes.net',
    'API_TOKEN' => 'secret',
    'IMG_URL' => 'https://img.eeyes.net',
]);

$result = \Eeyes\Common\Api\Eeyes\Permission::username('username', 'permission');
var_dump($result);

$result = \Eeyes\Common\Api\Eeyes\Permission::token('token', 'permission');
var_dump($result);

$result = \Eeyes\Common\Api\Eeyes\Notification::dingTalk('Test message');
var_dump($result);

echo \Eeyes\Common\Img\View::footer();
?>
```

## LICENSE

    The MIT License (MIT)
    
    Copyright (c) 2017 eeyes.net
    
    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:
    
    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.
