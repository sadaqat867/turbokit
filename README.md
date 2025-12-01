  # TurboKit

**TurboKit** is a Laravel package by **GSS Technology**, designed to optimize database operations, caching, bulk inserts, and provide convenient helper methods for your projects. Perfect for handling large datasets efficiently without memory issues.

---

## Features

* **TurboModel:** Optimized Eloquent model with caching and chunked queries.
* **TurboQuery:** Fast query handling with smart caching.
* **CacheLayer:** Easy cache management (remember, forget, flush).
* **Bulk insert:** Efficiently insert large datasets.
* **TurboKit Facade:** Access all features with a single line `use TurboKit;`.
* **Helpers:** Quick success/error response formatting.

---

## Requirements

* PHP >= 8.1
* Laravel >= 10.x

---

## Installation

Using Composer:

```bash
composer require smartcode/turbokit:dev-main
```

If using GitHub directly:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/sadaqat867/turbokit.git"
    }
]
```

Then:

```bash
composer require smartcode/turbokit:dev-main
```

---

## Usage

Import the facade:

```php
use TurboKit;
```

### TurboModel Example:

```php
// Retrieve all records with caching
$users = TurboKit::turboModel(User::class)->turboAll();

// Chunk processing
TurboKit::turboModel(User::class)->turboChunk(1000, function($chunk){
    // process each chunk
});
```

### TurboQuery Example:

```php
$users = TurboKit::turboQuery(User::query()->where('status', 'active'))->cache('active_users');
```

### Cache Helpers:

```php
TurboKit::forgetCache('active_users');
```

### Bulk Insert:

```php
$data = [
    ['name' => 'John', 'phone' => '12345'],
    ['name' => 'Jane', 'phone' => '67890'],
];

TurboKit::insertBulk($data, User::class);
```

### Response Helper:

```php
return TurboKit::message("Data saved successfully!", $data);
```

---

## Contribution

Feel free to fork, submit issues or create pull requests.

---

## License

MIT License

---

**© GSS Technology**

