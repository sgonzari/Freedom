const responsiveProfileOption = (props) => {
    if(window.matchMedia("(max-width: 1021px)").matches) {
        if(window.matchMedia("(min-width: 722px)").matches) {
            props.style.left = (150.328 - ((1021 - window.innerWidth) * 0.5)) + 'px';
        } else {
            props.style.left = 12 + 'px';
        }
    } else if(window.matchMedia("(max-width: 1111px)").matches) {
        props.style.left = (55 - ((1111 - window.innerWidth) * 0.5)) + 'px';
    } else if(window.matchMedia("(max-width: 1298px)").matches) {
        props.style.left = (113.5 - ((1298 - window.innerWidth) * 0.5)) + 'px';
    } else if(window.matchMedia("(max-width: 1306px)").matches){
        props.style.left = (24 - ((1306 - window.innerWidth) * 0.5)) + 'px';
    } else {
        props.style.left = (306.5 - ((1920 - window.innerWidth) * 0.5)) + 'px';
    }
};

const ResponsiveModal = () => {
    const profileOption = document.getElementById('profileOptionModal');
    const navMore = document.getElementById("navMoreModal");

    if (profileOption) {
        responsiveProfileOption(profileOption);
    }
    if (navMore) {
        responsiveProfileOption(navMore);
    }
};

export default ResponsiveModal;