<?php

namespace Tsubasarcs\Privacier\Services;

use Illuminate\Database\Eloquent\Model;

class PrivacyService
{
    protected $model;

    public function __construct()
    {
        $this->model = config('privacy.model');
    }

    public function updateOrCreate(array $attributes, string $whereData): Model
    {
        return $this->model::updateOrCreate([config('privacy.update_guidelines_column') => $whereData], $attributes);
    }

    public function existUid(string $uid): bool
    {
        return $this->model::whereUid($uid)->exists();
    }

    public function doesNotExistUid(string $uid): bool
    {
        return !$this->existUid($uid);
    }

    public function exists(string $attribute): bool
    {
        return $this->model::where(config('privacy.column'), $attribute)->exists();
    }
}