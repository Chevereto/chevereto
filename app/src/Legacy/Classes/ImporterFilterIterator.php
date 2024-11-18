<?php

/*
 * This file is part of Chevereto.
 *
 * (c) Rodolfo Berrios <rodolfo@chevereto.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chevereto\Legacy\Classes;

use FilterIterator;

class ImporterFilterIterator extends FilterIterator
{
    protected $fileinfo;

    public function accept(): bool
    {
        $this->fileinfo = $this->getInnerIterator()->current();
        if ($this->fileinfo->isFile() && (preg_match(Import::imageExtensionsRegex(), (string) $this->fileinfo) == false || $this->filterAssets())) {
            return false;
        }

        return !($this->fileinfo->isDir() && $this->filterAssets());
    }

    protected function filterAssets()
    {
        return $this->fileinfo->getBasename() == '.assets' || basename($this->fileinfo->getPath()) == '.assets';
    }
}
