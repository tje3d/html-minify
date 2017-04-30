<?php
namespace Tje3d\HtmlMinify;

use Illuminate\View\Compilers\BladeCompiler;

class HtmlMinifyCompiler extends BladeCompiler
{
    public function __construct($config, $files, $cachePath)
    {
        parent::__construct($files, $cachePath);

        // Add Minify to the list of compilers
        if ($config['enabled'] === true) {
            $this->compilers[] = 'Minify';
        }
    }

    /**
     * Compress the HTML output before saving it
     *
     * @param string $value the contents of the view file
     *
     * @return string
     */
    protected function compileMinify($value)
    {
        $replace = [
            "/<\?php/"                  => '<?php ',
            "/\n([\S])/"                => ' $1',
            "/\r/"                      => '',
            "/\n/"                      => '',
            "/\t/"                      => ' ',
            "/ +/"                      => ' ',
            "/>\s</"                    => '><',
            '/<!--[^\[](.*?)[^\]]-->/s' => ''
        ];

        return preg_replace(
            array_keys($replace), array_values($replace), $value
        );
    }
}
