var count = 0;
var likeButtonState = false;
var likeCount = document.getElementById("likeCount");


function toggleLike() {
  if (likeButtonState == false) {
    count++;
    likeButtonState = true;
    likeButton.src="like-filled.png";
  } else {
    count--;
    likeButtonState = false;
    likeButton.src="like.png";
  }
  likeCount.innerHTML = count;
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.querySelector(".navbar").classList.add("scrolled");
  } else {
    document.querySelector(".navbar").classList.remove("scrolled");
  }
}
