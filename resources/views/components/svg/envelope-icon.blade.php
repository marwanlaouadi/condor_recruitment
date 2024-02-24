@props(['height' => 24, 'width' => 24, 'stroke' => 'var(--primary-500)'])

<svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none"
    xmlns="http://www.w3.org/2000/svg">
    <path d="M21 5.25L12 13.5L3 5.25" stroke="{{ $stroke }}" stroke-width="1.5" stroke-linecap="round"
        stroke-linejoin="round" />
    <path
        d="M3 5.25H21V18C21 18.1989 20.921 18.3897 20.7803 18.5303C20.6397 18.671 20.4489 18.75 20.25 18.75H3.75C3.55109 18.75 3.36032 18.671 3.21967 18.5303C3.07902 18.3897 3 18.1989 3 18V5.25Z"
        stroke="{{ $stroke }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M10.3628 12L3.23047 18.538" stroke="{{ $stroke }}" stroke-width="1.5" stroke-linecap="round"
        stroke-linejoin="round" />
    <path d="M20.7692 18.5381L13.6367 12" stroke="{{ $stroke }}" stroke-width="1.5" stroke-linecap="round"
        stroke-linejoin="round" />
</svg>
