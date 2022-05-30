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

    window.addEventListener('resize', () => {
        if(window.matchMedia("(max-width: 1021px)").matches) {
            if(window.matchMedia("(min-width: 720px)").matches) {
                document.getElementById('profileOptionModal').style.left = (117.328 - ((1021 - window.innerWidth) * 0.328)) + 'px';
            } else {
                document.getElementById('profileOptionModal').style.left = 12 + 'px';
            }
        } else if(window.matchMedia("(max-width: 1111px)").matches) {
            document.getElementById('profileOptionModal').style.left = (55 - ((1111 - window.innerWidth) * 0.5)) + 'px';
        } else if(window.matchMedia("(max-width: 1298px)").matches) {
            document.getElementById('profileOptionModal').style.left = (113.5 - ((1298 - window.innerWidth) * 0.5)) + 'px';
        } else if(window.matchMedia("(max-width: 1306px)").matches){
            document.getElementById('profileOptionModal').style.left = (24 - ((1306 - window.innerWidth) * 0.5)) + 'px';
        } else {
            document.getElementById('profileOptionModal').style.left = (306.5 - ((1920 - window.innerWidth) * 0.5)) + 'px';
        }
    });
}