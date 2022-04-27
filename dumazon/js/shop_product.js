function linkToCPQ(){

// 連携用URLの生成
var key = '';
if ( document.getElementById('Radio1').checked ){
    key = 'AXEL_TYPE_1';
} 
else if (document.getElementById('Radio2').checked){
    key = 'AXEL_TYPE_2';
}
else if (document.getElementById('Radio3').checked){
    key = 'AXEL_TYPE_0';
}
else if ( document.getElementById('Radio4').checked ){
    key = 'AXEL_STANDARD_1';
} 
else if (document.getElementById('Radio5').checked){
    key = 'AXEL_STANDARD_2';
}
else if (document.getElementById('Radio6').checked){
    key = 'AXEL_STANDARD_0';
}
else if ( document.getElementById('Radio21').checked ){
    key = 'CORP_TYPE_1';
} 
else if (document.getElementById('Radio22').checked){
    key = 'CORP_TYPE_2';
}
else if (document.getElementById('Radio23').checked){
    key = 'CORP_TYPE_0';
}
else if ( document.getElementById('Radio24').checked ){
    key = 'CORP_STANDARD_1';
} 
else if (document.getElementById('Radio25').checked){
    key = 'CORP_STANDARD_2';
}
else if (document.getElementById('Radio26').checked){
    key = 'CORP_STANDARD_0';
}

//const baseURL = "http://localhost:3000/#/index-from-AXEL.html";
const baseURL = "http://localhost:3000/#/index.html";

var rawurlencode = '<?php echo $rawurlencode; ?>';

var targetURL = baseURL + "?s=" + key + "&m=" + rawurlencode;
console.log(targetURL);
// URLの表示
document.getElementById("URL").textContent = targetURL;
// CPQへの遷移
window.open(targetURL, '_blank'); 
}
