<?php

namespace App\View\Compilers;

use Illuminate\View\Compilers\BladeCompiler;

/**
 * Workaround BladeCompiler for Docker Desktop on Windows.
 *
 * The default Blade compiler calls `touch($compiledPath, $lastModified + 1)`
 * on cache hits to bump the compiled view's mtime. Docker Desktop mounts
 * the project directory via virtiofs/9P with `dirsync`, which rejects
 * `utimensat()` with an arbitrary timestamp and throws
 * "Utime failed: Operation not permitted".
 *
 * That touch is purely an optimization to skip the lastModified comparison
 * on the next render — content-based hashing above it already guarantees
 * correctness. We simply skip the touch.
 */
class DockerSafeBladeCompiler extends BladeCompiler
{
    public function compile($path = null)
    {
        if ($path) {
            $this->setPath($path);
        }

        if (is_null($this->cachePath)) {
            return;
        }

        $contents = $this->compileString($this->files->get($this->getPath()));

        if (! empty($this->getPath())) {
            $contents = $this->appendFilePath($contents);
        }

        $this->ensureCompiledDirectoryExists(
            $compiledPath = $this->getCompiledPath($this->getPath())
        );

        if (! $this->files->exists($compiledPath)) {
            $this->files->replace($compiledPath, $contents);

            return;
        }

        $compiledHash = $this->files->hash($compiledPath, 'xxh128');

        if ($compiledHash !== hash('xxh128', $contents)) {
            $this->files->replace($compiledPath, $contents);

            return;
        }

        // Cache hit: original parent code would do
        //   touch($compiledPath, $lastModified + 1);
        // here. We skip it — see class docblock for why.
    }
}
