import HeaderNavMore from './components/HeaderNavMore';
import HeaderProfileButton from './components/HeaderProfileButton';
import ScrollToComment from './components/ScrollToComment';
import authBackgroundVideo from './components/authBackgroundVideo';

window.onload = () => {
    authBackgroundVideo();
    HeaderProfileButton();
    HeaderNavMore();
    ScrollToComment();
    
    document.addEventListener('turbolinks:load', () => {
        authBackgroundVideo();
        HeaderProfileButton();
        HeaderNavMore();
        ScrollToComment();
    });
}