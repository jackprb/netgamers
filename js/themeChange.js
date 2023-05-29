let themeCheck;
let logoImg;
let logoBig;
let userImg;

window.addEventListener("load", function(){
    themeCheck = document.getElementById('theme-mode');
    logoImg = document.querySelectorAll('.logoImg');
    logoBig = document.querySelectorAll('.logoBig');
    userImg = document.querySelectorAll('.userImg');
    changeTheme();
});

function changeTheme(){
    if (mode !== undefined && mode === 'dark'){
        /*logoImg.forEach(element => {
            element.src = "upload/logos/NetGamers_Logo_White.png";
        });*/
        logoBig.forEach(element => {
            element.src = "upload/logos/NetGamers_Logo_White.png";
        });
        mode = 'light';
    } else {
        /*logoImg.forEach(element => {
            element.src ="upload/logos/NetGamers_Logo.png";
        });*/
        logoBig.forEach(element => {
            element.src ="upload/logos/NetGamers_Logo.png";
        });
        mode = 'dark';
    }
}