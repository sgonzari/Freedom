import HeaderNavMore from './components/HeaderNavMore';
import HeaderProfileButton from './components/HeaderProfileButton';
import ScrollToComment from './components/ScrollToComment';
import authBackgroundVideo from './components/authBackgroundVideo';
import LikeClickSound from './components/LikeClickSound';
import GraphsStatisticsLoader from './components/GraphsStatisticsLoader';
import ValidationData from './components/ValidationData';

const components = () => {
    authBackgroundVideo();
    HeaderProfileButton();
    HeaderNavMore();
    ScrollToComment();
    LikeClickSound();
    ValidationData();
};

window.onload = () => {
    components();
    
    document.addEventListener('turbolinks:load', () => {
        components();
    });

    Livewire.on('paginateHome', () => {
        LikeClickSound();
    });

    Livewire.on('validateProfileEdit', () => {
        ValidationData();
    });

    Livewire.on('graphLoader', props => {
        GraphsStatisticsLoader(props);
    });
}