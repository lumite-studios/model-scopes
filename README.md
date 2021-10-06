# lumite-studios/where-has-model-scope

A trait to add a `whereHasModel` scope to a model.

## Documentation

### Installation

```bash
composer require lumite-studios/where-has-model-scope
```

### Usage

```php
// Within the Post class
use LumiteStudios\WhereHasModelScope\WhereHasModelScopeTrait;

class Post extends Model {
	use WhereHasModelScopeTrait;
}

// The Post model can then use this trait to fetch
// all posts that belong to a user.
$user = User::first();
$posts = Post::whereHasModel('user', $user)->get();

// OPTIONAL: table, column
$posts = Post::whereHasModel('user', $user, 'users', 'id')->get();
```
