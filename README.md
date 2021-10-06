# lumite-studios/where-has-model-scope

A trait to add a `whereHasModel` scope to a model.

## Documentation

### Installation

```bash
composer require lumite-studios/where-has-model-scope
```

### Usage

```php
$user = User::first();

$posts = Post::whereHasModel('user', $user)->get();

// OPTIONAL: table, column
$posts = Post::whereHasModel('user', $user, 'users', 'id')->get();
```
