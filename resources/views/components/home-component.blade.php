<div class="main__container--posts">
    @if (!empty($posts))
        @foreach ($posts as $post)
            @livewire('post-component', ['post' => $post], key($post->id_post))
        @endforeach
        <div 
            x-data="{
                checkScroll() {
                    var isWorking = false ;

                    document.getElementById('main').onscroll = function(ev) {
                        if (Math.round((document.getElementById('main').scrollTop + document.getElementById('main').clientHeight) / document.getElementById('main').scrollHeight * 100) == 100) {
                            if (!isWorking) {
                                @this.call('incrementLoadAmount');
                                isWorking = true ;
                                setTimeout(() => {isWorking = false}, 100);
                            }
                        }
                    };
                }
            }"

            x-init="checkScroll"
        ></div>
    @else
        <h1>{{ __('home.There isnt post') }}</h1>
    @endif
</div>