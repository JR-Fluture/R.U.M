$("#logoFondo").css("transition","transform 1s ease");
var rotation=0;
for (let index = 0; index < 2; index++) {
    
    $("#logoFondo").css("transform", "rotateY("+rotation+"deg)");
    $("#logoFondo").css("transform-style", "preserve-3d");
    if (index==2) {
        index=0;
        rotation-=90;
    }else{
        rotation+=90;
    }
}
/*
window.onscroll = function() {
    myHeaderSearch();
    myHeaderTable();
};

var headerSearch = $("#myHeaderSearch")[0];
var stickySearch = headerSearch.offsetTop;

function myHeaderSearch() {
    if (window.pageYOffset > stickySearch+65) {
            headerSearch.classList.add("stickySearch");
    } else {
            headerSearch.classList.remove("stickySearch");
    }
}

var headerTable = $("#myHeaderTable")[0];
var stickyTable = headerTable.offsetTop;


function myHeaderTable() {
    if (window.pageYOffset > stickyTable+65) {
            headerTable.classList.add("stickyTable");
    } else {
            headerTable.classList.remove("stickyTable");
    }
}
*/