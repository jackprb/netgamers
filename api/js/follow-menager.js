function unfollow(IDUser){
    axios.get('api-unfollow.php?idN=' +IDUser).then(response=>{
        
    });
    
}

function follow(IDUser){
    axios.get('api-follow.php?idN='+IDUser).then(response=>{
        
    });
    
}

function tetxButtonChanger(IDUser){
    var bottone = document.getElementById("followbutton");
    const userID= IDUser;
    
    if (bottone.innerText === "Follow") {
        follow(userID);
    bottone.innerHTML = "Unfollow";
  } else {
        unfollow(userID);
    bottone.innerText = "Follow";
  }
}