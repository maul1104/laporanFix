let LastImage = document.getElementsByClassName('last-img')[0];
let FirstImage = document.getElementsByClassName('first-img')[0];
let Application = document.querySelector('#landing h2');

window.addEventListener('scroll', function () {
  let value = window.scrollY;

  LastImage.style.top = value * 0.3 + 'px';
  FirstImage.style.top = value * 0.3 + 'px';
  Application.style.bottom = value * 1 + 'px';
});
