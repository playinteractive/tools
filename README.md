# Description
Basic tools for website development.

# Install
```bash
$ composer require playinteractive/tools dev-master
```

# Example
```php
use Functions\Tool;

# Status Code

Tool::statusCode(404);

# HTTPS

Tool::https() ? 'https' : 'http';

# Replace String

Tool::replaceString($string, $separator = FALSE, $allow = FALSE);

# Validate Text

Tool::validateText($text, $db = FALSE, $tag = FALSE, $textarea = FALSE, $decoration = TRUE);
```
