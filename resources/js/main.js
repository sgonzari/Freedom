import HeaderNavMore from './components/HeaderNavMore';
import HeaderProfileButton from './components/HeaderProfileButton';
import ScrollToComment from './components/ScrollToComment';
import authBackgroundVideo from './components/authBackgroundVideo';
import LikeClickSound from './components/LikeClickSound';

const components = () => {
    authBackgroundVideo();
    HeaderProfileButton();
    HeaderNavMore();
    ScrollToComment();
    LikeClickSound();

};

window.onload = () => {
    components();
    
    document.addEventListener('turbolinks:load', () => {
        components();
    });

    Livewire.on('paginateHome', () => {
        LikeClickSound();
    });
}