<?php

namespace Tsubasarcs\Privacier\Services;

use Illuminate\Database\Eloquent\Model;

class PrivacyService
{
    protected $model;

    public function __construct()
    {
        $this->model = config('privacy.models.class_name');
    }

    public function updateOrCreate(string $attribute, array $values): Model
    {
        return $this->model::updateOrCreate([config('privacy.models.names.update_attribute') => $attribute], $values);
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
        return $this->model::where(config('privacy.models.names.store_column'), $attribute)->exists();
    }
}