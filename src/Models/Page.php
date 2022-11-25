<?php

namespace ToiLaDev\Page\Models;

use ToiLaDev\Models\Base;
use ToiLaDev\Models\Employee;
use ToiLaDev\Traits\CastTrait;
use ToiLaDev\Traits\LogActivityTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Page extends Base {
    use SoftDeletes, CastTrait, LogActivityTrait;

    protected $table = 'pages';

    protected $fillable = ['name', 'title', 'excerpt', 'body', 'owner_id'];

    public function owner()
    {
        return $this->belongsTo(Employee::class, 'owner_id');
    }
}
