@props(['color' => 'primary'])

<a {{ $attributes->class([
    "btn btn-{$color}"
])->merge([
    'role' => 'button'
]) }}>
    {{ $slot }}
</a>