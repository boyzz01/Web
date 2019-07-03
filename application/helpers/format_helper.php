<?php


function format_status($status){
    if($status == "1"){
        return "Proses";
    } else if($status == "2"){
        return "Belum Ditanggapi";
    }else if($status == "3"){
        return "Sudah Ditangani";
    }else{
        return "Proses";
    }

    return "-";
}

function format_publish($publish){
    if($publish == "0"){
        return "private";
    }else if($publish == "1"){
        return "public";
    }
    return "-";
}