import HeaderNavMore from './components/HeaderNavMore';
import HeaderProfileButton from './components/HeaderProfileButton';
import ScrollToComment from './components/ScrollToComment';
import AuthBackgroundVideo from './components/AuthBackgroundVideo';
import LikeClickSound from './components/LikeClickSound';
import GraphsStatisticsLoader from './components/GraphsStatisticsLoader';
import ValidationData from './components/ValidationData';
import ResponsiveModal from './components/ResponsiveModal';
import AutosizeTextarea from './components/AutosizeTextarea';

const components = () => {
    AuthBackgroundVideo();
    HeaderProfileButton();
    HeaderNavMore();
    ScrollToComment();
    LikeClickSound();
    ValidationData();
    ResponsiveModal();
    AutosizeTextarea();
};

window.onload = () => {
    components();
    
    document.addEventListener('turbolinks:load', () => {
        components();
    });

    Livewire.on('likeSound', () => {
        LikeClickSound();
    });

    Livewire.on('validateProfileEdit', () => {
        ValidationData();
    });

    Livewire.on('graphLoader', props => {
        GraphsStatisticsLoader(props);
    });

    Livewire.on('AutoresizeTextarea', () => {
        AutosizeTextarea();
    });

    window.addEventListener('resize', () => {
        ResponsiveModal();
    });
}