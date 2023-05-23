window.addEventListener("load", function(){
    let themeCheck = document.getElementById('theme-mode');
    let logoImg = document.getElementById('logoImg');
    let logoBig = document.getElementById('logoBig');
    changeTheme();
  });

  function changeTheme(){
    if (mode !== undefined && mode === 'dark'){
      //logoImg.src = "upload/logos/NetGamers_Logo_White.png";
      logoBig.src = "upload/logos/NetGamers_Logo_White.png";
      mode = 'light';
    } else {
      //logoImg.src = "upload/logos/NetGamers_Logo.png";
      logoBig.src = "upload/logos/NetGamers_Logo.png";
      mode = 'dark';
    }

    if (themeCheck.checked == true){ //dark theme
      //logoImg.src = "upload/logos/NetGamers_Logo_White.png";
    } else { //light theme
      //logoImg.src = "upload/logos/NetGamers_Logo.png";        
    }
  }