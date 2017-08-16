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
    
## Alphabet ternary

* 1 <=> 'T'
* 2 <=> 'F'
* 0 <=> 'U' (unknown)

You need to set `alpha_ternary`.  

    protected $casts = [
        'status_type_id' => 'alpha_ternary'
    ];

## Short time

* hh::ii:ss => hh:ii


    protected $casts = [
        'meeting_time' => 'short_time'
    ];
    
    // i.g) 01:02:03 => 01:02
    
License
====
This package is licensed under the MIT License.

Copyright 2017 Sukohi Kuhoh