<?php

namespace LumiteStudios\ModelScopes;

use LumiteStudios\ModelScopes\WhereIsModelScope;
use LumiteStudios\ModelScopes\WhereHasModelScope;
use LumiteStudios\ModelScopes\WhereBelongsToModelScope;

trait ModelScopes
{
    use WhereHasModelScope,
        WhereIsModelScope;
}
