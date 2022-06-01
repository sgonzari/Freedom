import HeaderNavMore from './components/HeaderNavMore';
import HeaderProfileButton from './components/HeaderProfileButton';
import ScrollToComment from './components/ScrollToComment';
import authBackgroundVideo from './components/authBackgroundVideo';
import LikeClickSound from './components/LikeClickSound';
import GraphsStatisticsLoader from './components/GraphsStatisticsLoader';
import ValidationData from './components/ValidationData';
import ResponsiveModal from './components/ResponsiveModal';
import AutosizeTextArea from './components/AutosizeTextArea';

const components = () => {
    authBackgroundVideo();
    HeaderProfileButton();
    HeaderNavMore();
    ScrollToComment();
    LikeClickSound();
    ValidationData();
    ResponsiveModal();
    AutosizeTextArea();
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
        AutosizeTextArea();
    });

    window.addEventListener('resize', () => {
        ResponsiveModal();
    });
}