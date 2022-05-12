const HeaderProfileButton = () => {
    var modal = document.getElementById("profileOptions");
    var btn = document.getElementById('profileButton');

    btn.onclick = function () {
        modal.style.display = "block";
    }
    window.onclick = function (event) {
        console.log(event.target) ;
        console.log(modal) ;
        console.log("-----------------");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

export default HeaderProfileButton;