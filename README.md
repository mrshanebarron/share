# Share

Social sharing buttons for Laravel applications. Supports Twitter, Facebook, LinkedIn, Email, WhatsApp, and Telegram. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/share
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-share
    url="https://example.com/article"
    title="Check out this article!"
/>
```

### Custom Networks

```blade
<livewire:sb-share
    :networks="['twitter', 'facebook', 'linkedin', 'whatsapp']"
    url="https://example.com"
    title="Share this!"
/>
```

### With Description Text

```blade
<livewire:sb-share
    url="https://example.com"
    title="Amazing Article"
    text="I found this really helpful article about Laravel components."
/>
```

### Sizes

```blade
<livewire:sb-share :networks="$networks" size="sm" />
<livewire:sb-share :networks="$networks" size="md" />
<livewire:sb-share :networks="$networks" size="lg" />
```

### Styles

```blade
<!-- Button style (default) -->
<livewire:sb-share style="buttons" />

<!-- Icon only -->
<livewire:sb-share style="icons" />

<!-- Compact -->
<livewire:sb-share style="compact" />
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `url` | string | current URL | URL to share |
| `title` | string | `''` | Share title/headline |
| `text` | string | `''` | Share description text |
| `networks` | array | `['twitter', 'facebook', 'linkedin', 'email']` | Networks to display |
| `size` | string | `'md'` | Size: `sm`, `md`, `lg` |
| `style` | string | `'buttons'` | Display style: `buttons`, `icons`, `compact` |

### Available Networks

- `twitter` - Twitter/X
- `facebook` - Facebook
- `linkedin` - LinkedIn
- `email` - Email (mailto:)
- `whatsapp` - WhatsApp
- `telegram` - Telegram

## Vue 3 Usage

### Setup

```javascript
import { SbShare } from './vendor/sb-share';
app.component('SbShare', SbShare);
```

### Basic Usage

```vue
<template>
  <SbShare
    url="https://example.com/article"
    title="Great Article!"
  />
</template>
```

### Custom Configuration

```vue
<template>
  <SbShare
    :networks="['twitter', 'facebook', 'whatsapp']"
    url="https://example.com"
    title="Check this out!"
    text="I found something amazing."
    size="lg"
  />
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `url` | String | `window.location.href` | URL to share |
| `title` | String | `''` | Share title |
| `text` | String | `''` | Share description |
| `networks` | Array | `['twitter', 'facebook', 'linkedin', 'email']` | Networks |
| `size` | String | `'md'` | Button size |
| `style` | String | `'buttons'` | Display style |

## Events

### Livewire

```blade
<livewire:sb-share @shared="handleShare" />
```

### Vue

```vue
<SbShare @shared="handleShare" />
```

The event includes the network name that was clicked.

## Styling

Each social network has its brand color:
- **Twitter**: Blue (#1DA1F2)
- **Facebook**: Blue (#1877F2)
- **LinkedIn**: Blue (#0A66C2)
- **WhatsApp**: Green (#25D366)
- **Telegram**: Blue (#0088CC)
- **Email**: Gray

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
