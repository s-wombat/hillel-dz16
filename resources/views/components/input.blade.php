<input {{ $attributes->class([
    'form-control',
])->merge([
    'type' => 'text',
])}} value="@isset($value) {{ $value }} @endisset" />
