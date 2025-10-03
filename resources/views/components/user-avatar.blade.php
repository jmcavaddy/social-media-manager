@props(['user', 'size' => 'w-12 h-12'])

@if($user->image)
    <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
@else
    <img src="https://www.citypng.com/public/uploads/preview/hd-man-user-illustration-icon-transparent-png-701751694974843ybexneueic.png" alt="stock avatar" class="{{ $size }} rounded-full">
@endif