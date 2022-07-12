# lumite-studios/model-scopes
A trait to add various model scopes.

## Installation
```bash
composer require lumite-studios/model-scopes
```

## Usage
### All Scopes
```php
use LumiteStudios\ModelScopes\ModelScopes;
```

### WhereIsModelScope
```php
use LumiteStudios\ModelScopes\WhereIsModelScope;

class User extends Model {
    use WhereIsModelScope;
}
```
```php
$user = User::first();
$user = User::whereIsModel($user)->first();
```

### WhereHasModelScope
```php
use LumiteStudios\ModelScopes\WhereHasModelScope;

class Post extends Model {
    use WhereHasModelScope;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

class User extends Model {
    use WhereHasModelScope;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
```
```php
$user = User::first();
$posts = Post::whereHasModel('user', $user)->get();

$post = Post::first();
$user = User::whereHasModel('posts', $post)->first();
```
