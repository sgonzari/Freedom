import HeaderNavMore from './components/HeaderNavMore';
import HeaderProfileButton from './components/HeaderProfileButton';

window.onload = () => {
    HeaderProfileButton();
    HeaderNavMore();
    
    document.addEventListener('turbolinks:load', () => {
        HeaderProfileButton();
        HeaderNavMore();
    });
}