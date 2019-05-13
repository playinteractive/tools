# Description
Basic tools for website development.

# Install
```bash
$ composer require playinteractive/tools dev-master
```

# Example
```php
use Functions\Tool;

# HTTPS

Tool::https() ? 'https' : 'http';

# Status Code

Tool::statusCode(404);

# Validate Text

Tool::validateText($text, $db = FALSE, $tag = FALSE, $textarea = FALSE, $decoration = TRUE);

# Replace String

Tool::replaceString($string, $separator = FALSE, $allow = FALSE);
```
