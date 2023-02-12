<?php

namespace App\Extensions\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Support\Arrayable;

class User implements Authenticatable, Arrayable
{
    protected array $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->update($attributes);
    }

    public function destroy(): void
    {
        cache()->forget('proxy.user');
    }

    public static function make($args)
    {
        $args = is_array($args) ? $args : func_get_args();

        return new static($args);
    }

    public static function restore(): ?User
    {
        return User::make(cache('proxy.user', []));
    }

    /**
     * Update a property of this user, or add it if's missing.
     */
    public function update(array $data)
    {
        $this->attributes = $data + $this->attributes;

        cache(['proxy.user' => $this->attributes]);

        return $this;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->update([ $this->getRememberTokenName() => $value ]);
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Proxy attribute reads to the @attributes property keys.
     */
    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function toArray()
    {
        return [
            'id'              => $this->attributes['id'] ?? null,
            'name'            =>  $this->attributes['name'] ?? null,
            'email'           => $this->attributes['email'] ?? null,
            'activeCourse_id' => $this->attributes['activeCourse_id'] ?? null,
        ];
    }
}
