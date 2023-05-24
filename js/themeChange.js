let themeCheck;
let logoImg;
let logoBig;
let userImg;

window.addEventListener("load", function(){
    themeCheck = document.getElementById('theme-mode');
    logoImg = document.getElementById('logoImg');
    logoBig = document.getElementById('logoBig');
    userImg = document.getElementById('userImg');
    changeTheme();
});

function changeTheme(){
    if (mode !== undefined && mode === 'dark'){
        //logoImg.src = "upload/logos/NetGamers_Logo_White.png";
        logoBig.src = "upload/logos/NetGamers_Logo_White.png";
        userImg.src = "upload/userImages/default_white.png";
        mode = 'light';
    } else {
        //logoImg.src = "upload/logos/NetGamers_Logo.png";
        logoBig.src = "upload/logos/NetGamers_Logo.png";
        userImg.src = "upload/userImages/default.png";
        mode = 'dark';
    }
}