<div class="hidden sm:flex sm:items-center sm:ml-6">
    <div class="relative">
        <form wire:submit.prevent="search">
            <input type="text" wire:model="query">
        </form>

        @if (!empty($query))
            <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                @foreach ($results as $result) 
                    <div>
                        <a href="/{{ $result->username }}">{{ $result->username }}</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>