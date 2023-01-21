let footerHeartIcon = document.querySelector('.footer-heart-icon');

const DOCUMENT_COLORS = ["#87ceeb", "#173554"];

function changeHeartIconColor() {
    let randomColor = Math.floor(Math.random() * DOCUMENT_COLORS.length);
    footerHeartIcon.style.color = DOCUMENT_COLORS[randomColor];
}

setInterval(changeHeartIconColor, 450);
