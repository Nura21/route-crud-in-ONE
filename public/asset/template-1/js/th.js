var time = new Date(),
    yth = 2022, yyy = String(time.getFullYear()), mm = String(time.getMonth()).padStart(2, "0"),
    mth = 06, dd = String(time.getDate()).padStart(2, "0"), mt = String(time.getMinutes()).padStart(2, "0"),
    dth = 30, hr = String(time.getHours()).padStart(2, "0"), sc = String(time.getSeconds()).padStart(2, "0");

var version1 = "th" + yyy + yth + mm + mth + dd + dth + hr + mt + sc;
var version2 = "th" + yyy + yth + mm + mth + dd + dth + hr + sc + mt;
var version3 = "th" + yyy + yth + mm + mth + dd + dth + sc + mt + sc;

document.querySelector("link[href='{{ asset('asset/template-1/css/th-format.css') }}']").href = "{{ asset('asset/css/th-format.css') }}?v=" + version1;
document.querySelector("link[href='{{ asset('asset/template-1/css/th-style.css') }}']").href = "{{ asset('asset/css/th-style.css') }}?v=" + version3;
document.querySelector("script[src='{{ asset('asset/template-1/js/th.js') }}']").src = "{{ asset('asset/css/th-format.css') }}?v=" + version2;

var swiper = new Swiper(".thumbnail", {
  loop: true,
  spaceBetween: 15,
  slidesPerView: 3,
  freeMode: true,
  watchSlidesProgress: true,
});

var swiper2 = new Swiper(".gallery", {
  loop: true,
  
  spaceBetween: 1,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});

var btnVolume = document.getElementById("btn-volume"), 
icn = document.getElementById("icon"),
song = document.getElementById("music");

btnVolume.onclick = function() {
  if (icn.className == "volume-on") {
    icn.className = "volume-off";
    song.pause();

  } else {
    icn.className = "volume-on";
    song.play();
  }
}

var modal = document.getElementById("modal-window"), 
openModal = document.getElementById("btn-modal"), 
exitModal = document.getElementById("btn-close"),
mBody = document.getElementById("myBody"); 
mBody.style.backgroundImage = "url('{{ asset('asset/template-1/img/background/bg-1.png') }}')";

modal.classList.add("shadow","showModal");
mBody.style.overflow = "hidden";


exitModal.onclick = function() {
   if (modal.className == "shadow","showModal") {
    mBody.style.overflow = "auto";
    song.play();
    modal.classList.remove("showModal");
    modal.classList.add("hideModal");
  }
}