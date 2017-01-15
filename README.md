# Twig Debug Bar

A simple [Twig](https://github.com/fabpot/Twig) extension to provide rendering functions for the [PHP Debug Bar](http://github.com/maximebf/php-debugbar).  This extension loads the StandardDebugBar and provides the functions *dbg_message*, *dbg_renderHead*, and *dbg_render* for Twig.

**Requirements:**

* [Twig 2](https://github.com/twigphp/Twig)
* [PHP Debug Bar](https://github.com/maximebf/php-debugbar)

## Installation
```
"require": {
	"dougfelton/twig-debugbar": "dev-master",
}
```

## Example

```PHP
$twig = new Twig_Environment(new Twig_Loader_Filesystem('Views'));
$twig->addExtension(new Dougfelton\TwigDebugBar\Extension('/Path')); // Relative assets path to your web directory e.g. /assets/debug/
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
This extension is a minor update (for compatibility with Twig v2) of Mark Arneman's extension [found here](https://github.com/bearlikelion/twig-debugbar).  My work was minimal, and if you find this extension useful the credit goes to Mark.
