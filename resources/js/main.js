import HeaderNavMore from './components/HeaderNavMore';
import HeaderProfileButton from './components/HeaderProfileButton';
import ScrollToComment from './components/ScrollToComment';
import authBackgroundVideo from './components/authBackgroundVideo';
import LikeClickSound from './components/LikeClickSound';
import GraphsStatisticsLoader from './components/GraphsStatisticsLoader';

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
        console.log('turbolinks');
        components();
    });

    Livewire.on('paginateHome', () => {
        LikeClickSound();
    });

    Livewire.on('graphLoader', props => {
        GraphsStatisticsLoader(props);
    });
}