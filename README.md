# CustomCast
A Laravel package for custom casts.


Installation
====

Execute composer command.

    composer require sukohi/custom-cast:1.*

Preparation
====

**Simple Way**  

In your model, set `CustomCastTrait` and add `$casts` as usual.

    <?php
    
    namespace App;
    use Sukohi\CustomCast\CustomCastTrait;
    
    class User {
    
        use CustomCastTrait;
        
        protected $casts = [
            'column' => 'CUSTOM-CAST-NAME'
        ];

Now you can use custom casts.

## Alphabet boolean

* true <=> 'T'
* false <=> 'F'

You need to set `alpha_boolean`.  
This might be useful for JavaScript Object key.

    protected $casts = [
        'activated' => 'alpha_boolean'
    ];

License
====
This package is licensed under the MIT License.

Copyright 2017 Sukohi Kuhoh