import HeaderNavMore from './components/HeaderNavMore';
import HeaderProfileButton from './components/HeaderProfileButton';
import ScrollToComment from './components/ScrollToComment';

window.onload = () => {
    HeaderProfileButton();
    HeaderNavMore();
    ScrollToComment();
    
    document.addEventListener('turbolinks:load', () => {
        HeaderProfileButton();
        HeaderNavMore();
        ScrollToComment();
    });
}