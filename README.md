# Twig Debug Bar

A simple [Twig](https://github.com/twigphp/Twig) extension to provide rendering functions for the [PHP Debug Bar](http://github.com/maximebf/php-debugbar).  This extension loads the StandardDebugBar and provides the functions *dbg_message*, *dbg_renderHead*, and *dbg_render* for Twig.

**Requirements:**

* [Twig 2](https://github.com/twigphp/Twig)
* [PHP Debug Bar](https://github.com/maximebf/php-debugbar)

## Installation
```
composer require smtgr14/twig-debugbar
```

## Example

```PHP
$twig = new Twig_Environment(new Twig_Loader_Filesystem('Views'));
$debugbarExtn = $debugbarExtn = new Dougfelton\TwigDebugBar\Extension('/Path'); // Relative assets path to your web directory e.g. /assets/debug/
$twig->addExtension($debugbarExtn);

$debugbar = $debugbarExtn->getDebugBar(); // Returns DebugBar for use with normal debugbar operations.
```

```html
<html>
	<head>
		{{ dbg_renderHead() }}
	</head>
	<body>
        <!-- array dump -->
        {{ dbg_message(array)|raw }}
        <!-- labeled message -->
        {{ dbg_message('Something Wrong', 'error')|raw }}
		{{ dbg_render()|raw }}
	</body>
</html>
```

## Acknowledgement
This extension is a minor update (for compatibility with Twig v2) of Mark Arneman's extension [found here](https://github.com/bearlikelion/twig-debugbar) and the changes made by Doug Felton.  
My work was minimal, and if you find this extension useful the credit goes to Mark and Doug.
All I added was the getDebugBar method to return the object to make the bar useful outside of just the template rendering and message methods.
