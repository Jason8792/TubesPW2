function updatebahanbakar(id) {
    window.location = "?navito=bahan_bakar_update&idbahan=" + id;
}
function updatekaryawan(id){
    window.location= "?navito=updatekaryawan&idkaryawan=" + id;
}
function deletekaryawan(id){
    let confirm  = window.confirm("Are you sure want to delete ?");
    if(confirm){
        window.location="?navito=editkaryawan&cmd=del&idkaryawan=" + id;
    }
}
function updatemember(id){
    window.location="?navito=member_update&idmember="+id;
}
function deletemember(id){
    let confirm = window.confirm("Are you sure want to delete ?");
    if(confirm){
        window.location="?navito=editmember&cmd=del&idmember=" + id;
    }
}
