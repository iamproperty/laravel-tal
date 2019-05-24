<?php

namespace IAMProperty\LaravelTal\Engines;

use Illuminate\Contracts\View\Engine;
use PHPTAL;

class TalEngine implements Engine
{
    /**
     * Get the cache path for the compiled views.
     *
     * @var string|null
     */
    private $cachePath;

    /**
     * The TAL output mode.
     *
     * @var int|null
     */
    private $outputMode;

    /**
     * Create a new TAL view engine instance.
     *
     * @param string  $cachePath
     * @param int  $output
     * @return void
     */
    public function __construct(string $cachePath = null, int $output = null)
    {
        $this->cachePath = $cachePath;
        $this->outputMode = $output;
    }

    /**
     * Get the evaluated contents of the view.
     *
     * @param  string  $path
     * @param  array   $data
     * @return string
     */
    public function get($path, array $data = []): string
    {
        $tal = $this->makeTAL($path);

        foreach ($data as $key => $value) {
            // PHPTAL cannot handle context variables that start with an undersore so remove them
            if (strpos($key, '_') !== 0) {
                $tal->set($key, $value);
            }
        }

        return $tal->execute();
    }

    /**
     * Get a new PHPTAL instance.
     *
     * @param  string  $path
     * @return PHPTAL
     */
    protected function makeTAL(string $path): PHPTAL
    {
        $tal = new PHPTAL($path);
        if ($this->cachePath) {
            $tal->setPhpCodeDestination($this->cachePath);
        }
        if ($this->outputMode) {
            $tal->setOutputMode($this->outputMode);
        }

        return $tal;
    }
}
