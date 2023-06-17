let themeCheck;
let logoBig;
let userImg;

window.addEventListener("load", function(){
    themeCheck = document.getElementById('theme-mode');
    logoBig = document.querySelectorAll('.logoBig');
    userImg = document.querySelectorAll('.userImg');
    changeTheme();
});

function changeTheme(){
    if (mode !== undefined && mode === 'dark'){
        logoBig.forEach(element => {
            element.src = "upload/logos/NetGamers_Logo_White.png";
        });
        mode = 'light';
    } else {
        logoBig.forEach(element => {
            element.src ="upload/logos/NetGamers_Logo.png";
        });
        mode = 'dark';
    }
}