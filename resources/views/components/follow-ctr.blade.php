@props(['user'])

<div {{ $attributes }} x-data="{
{{-- Returns boolean based on whether I am following the user whose page I am on --}}
following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false'}},
{{-- Returns the number of user following the user whose page I am on --}}
followersCount: {{ $user->followers()->count() }},
{{-- Callable that runs on button click; switches current status of following from true <-> false;
makes a post request to '/follow/{$user->id}' where the user is the user whose page we're on --}}
follow() {
    this.following = !this.following
    axios.post('/follow/{{ $user->id }}')
    .then(res => {
        console.log(res.data)
        this.followersCount = res.data.followersCount
    })
        .catch(err => {
            console.log(err)
        })
    }
}" class="w-[320px] border-l px-8">
{{ $slot }}
</div>