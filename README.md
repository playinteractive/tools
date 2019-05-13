# Description
Basic tools for website development.

# Install
```bash
$ composer require playinteractive/tools dev-master
```

# Example
```php
$db = new mysqli_connect($username, $password, $database, array('offset' => date('P')));

# Status Code

Functions\Tool::statusCode(404);

# HTTPS

Functions\Tool::https() ? 'https' : 'http';

# Replace String

Functions\Tool::replaceString($string, $separator = FALSE, $allow = FALSE);

# Validate Text

Functions\Tool::validateText($text, $db = FALSE, $tag = FALSE, $textarea = FALSE, $decoration = TRUE);
```
# Options
```php
$options = [

'host' => 'localhost',
'port' => 3306,
'persistent' => FALSE,
'charset' => 'utf8mb4',
'offset' => '+00:00'

];
```
