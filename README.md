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

// EX: The Post model can then use this trait to fetch
// all posts that belong to a user.
$user = User::first();

// REQUIRED: relation, model
$posts = Post::whereHasModel('user', $user)->get();

// OPTIONAL: table, localKey, foreignKey
$posts = Post::whereHasModel('user', $user, 'users', 'user_id', 'id')->get();
```
