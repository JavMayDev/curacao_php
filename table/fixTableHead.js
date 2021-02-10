var tableHead = document.getElementById('table-head');
document.getElementById('table-scrollable').onscroll = function (event) {
    tableHead.style.transform = 'translateY(' + event.target.scrollTop + 'px)';
};
