<script>
const hu="<?=file_location('admin_url','')?>";var adar="<?=file_location('admin_ajax_url','')?>";
function loading(s='Loading',t='id',i='sbtn'){let vl= "<span class='j-spinner-border j-spinner-border-sm j-text-color4'style='margin-right:7px;'></span>"+s;if(t==='id'){$('#'+i).html(vl);$('#'+i).prop('disabled',true);}else if(t==='class'){$('.'+i).html(vl);}$('.'+i).prop('disabled',true);}
function r_b(s='Submit',t='id',i='sbtn'){if(t==='id'){$('#'+i).html(s);$('#'+i).prop('disabled',false);}else if(t==='class'){$('.'+i).html(s);$('.'+i).prop('disabled',false);}}
function r_m(s){if(s.length>0){s=s;}else{s='Error running request';}return "<span class='j-center j-wrap j-text-color4 alert j-color1 j-bolder j-container j-padding j-round j-fixalert'id='thealert'>"+s+"</span>";}
function r_m2(s){if(s.length>0){s=s;}else{s='Sorry!!!<br>Error occurred while runing request, please try again later or reload page';}var err="<div id='return_message_modal'class='j-modal'><div class='j-card-4 j-modal-content j-color4 j-bolder'style='margin-top:200px;'><div class='j-padding'>"+s+"</div><center class='j-padding'><div class='j-clickable j-text-color1 j-round j-border-2 j-border-color1 j-padding'style='width:100%'onclick=$('#return_message_modal').hide();>Close</div></center></div></div>";$('#st').html(err);$('#return_message_modal').show();}
alertoff();function alertoff(){setTimeout(thealert,8000);}function thealert(){$("#thealert").hide();}
<?php //click anywhere to hide modal?>
$(document).ready(function(){let m = document.getElementsByClassName('j-modal');window.onclick = function(event){for(let i = 0; i < m.length; i++){if(event.target == m[i]){m[i].style.display = 'none';}}};})
<?php //code for show and hide with menu and close symbol on small and medium screen ?>
function ad(){$('#a').toggle('',function(){if($('#a').is(":hidden")){$('#mo').html('&#9776');}else{$('#mo').html('&times');}});}
<?php if(strstr(file_location('home_url',''),'000webhostapp')){ ?>
<?php //hide 000webhost advert ?>
$(document).ready(function(){$('div').last().hide();})
<?php } ?>
<?php // fix admin first column height?>
$(document).ready(function(){var screen_height = screen.height;document.getElementById('firstcol').style.height=screen_height+"px";})
<?php //ADMIN JS STARTS ?>
<?php //logout?>
function lg(){
$.ajax({type:'POST',url:adar+'act/lg/',cache:false,dataType:'JSON'}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while logging out'));})
.done(function(s){if(!s.status){$('#st').html(r_m(s.message));}else{window.location=s.message;}})
alertoff();
}
<?php if($_SERVER['PHP_SELF'] === '/admin/login.enc.php'){ ?>
<?php //login ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('#error').html('');loading('Logging In');
$.ajax({type:'POST',url:adar+"act/l/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while logging in,try again'));r_b('Log In As Admin');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else{$('#st').html(r_m2(s.errors))};r_b('Log In As Admin');});alertoff();$('#pd').val('');
})
})
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/admin/index.php'){ ?>
<?php //get admin result ?>
gar('<?=$status?>');function gar(st){$.ajax({type:'POST',url:adar+'get/gar/',data:{"s":$('#sx').val(),"st":st}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/admin/insert_admin.enc.php'){ ?>
<?php //insert admin (IMAGE)?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Inserting Admin');
$.ajax({type:'POST',url:adar+"act/ia/",data:new FormData(this),cache:false,contentType:false,processData:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while inserting admin'));r_b('Insert Admin');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m2(s.message));};r_b('Insert Admin');})
})
})
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/admin/profile.enc.php'){ ?>
<?php //delete account ?>
function da(d){
$('.mg').html('');
$.ajax({type:'POST',url:adar+'act/da/',data:{"d":d.val()},cache:false,dataType:'JSON'}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while running request'));})
.done(function(s){if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{$('#st').html(r_m2(s.message));if(s.status==='success'){window.location='';}}})
alertoff();d.val('');
}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/admin/preview_admin.enc.php'){ ?>
<?php //update level ?>
function upl(l,i){let d="/"+l+"/"+i+"/";
$.ajax({type:'GET',url:adar+'act/ul'+d,cache:false,dataType:'JSON'}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while updating level'));})
.done(function(s){$('#st').html(r_m2(s.message));if(s.status==='success'){window.location='';}})
alertoff();
}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/admin/edit_profile.enc.php'){ ?>
<?php //edit_profile ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Updating Profile');
$.ajax({type:'POST',url:adar+"act/up/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while updating profile,try again'));r_b('Update Profile');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m2(s.message));};r_b('Update Profile');})
})
})
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/admin/change_password.enc.php'){ ?>
<?php //change_password ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Changing Password');
$.ajax({type:'POST',url:adar+"act/cp/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2(''));r_b('Change Password');})
.done(function(s){if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{$('#st').html(r_m2(s.message))};r_b('Change Password');});alertoff();
$('.pss').val('');
})
})
<?php } ?>
<?php //SOCIAL HANDLE JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/social_handle/index.php'){ ?>
<?php //get social handle result ?>
gshr();function gshr(){$.ajax({type:'POST',url:adar+'get/gshr/',data:{"s":$('#sx').val()}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/social_handle/insert_social_handle.enc.php'){ ?>
<?php //insert social handle ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('');loading('Inserting');
$.ajax({type:'POST',url:adar+"act/ish/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while creating social handle,try again'));r_b('Insert New Social Handle');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m2(s.message));};r_b('Insert New Social Handle');})
})
})
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/social_handle/update_social_handle.enc.php'){ ?>
<?php //update social_handle ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Updating');
$.ajax({type:'POST',url:adar+"act/ush/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while updating social handle,try again'));r_b('Update Social Handle');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m2(s.message));};r_b('Update Social Handle');})
})
})
<?php } ?>
<?php //MESSAGE JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/message/index.php'){ ?>
<?php //get message result ?>
gmr('<?=$status?>');function gmr(st){$.ajax({type:'POST',url:adar+'get/gmr/',data:{"s":$('#sx').val(),"st":st}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php //SUBSCRIBER JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/subscriber/index.php'){ ?>
<?php //get subscriber result ?>
gsr();function gsr(){$.ajax({type:'POST',url:adar+'get/gsr/',data:{"s":$('#sx').val()}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php //TRANSACTION JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/transaction/index.php'){ ?>
<?php //get transaction result ?>
gtr('<?=$status?>');function gtr(st){$.ajax({type:'POST',url:adar+'get/gtr/',data:{"s":$('#sx').val(),"st":st}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php //PARTNERS JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/partner/index.php'){ ?>
<?php //get partner result ?>
gpr();function gpr(){$.ajax({type:'POST',url:adar+'get/gpr/',data:{"s":$('#sx').val()}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/partner/insert_partner.enc.php'){ ?>
<?php //insert partner (IMAGE)?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Inserting Partner');
$.ajax({type:'POST',url:adar+"act/ipr/",data:new FormData(this),cache:false,contentType:false,processData:false,dataType:'JSON'})//
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while inserting partner'));r_b('Insert Partner');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m(s.message))};r_b('Insert Partner');});alertoff();
})
})
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/partner/update_partner.enc.php'){ ?>
<?php //update partner ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Updating Partner');
$.ajax({type:'POST',url:adar+"act/upr/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while updating partner,try again'));r_b('Update Partner');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m2(s.message));};r_b('Update Partner');})
})
})
<?php } ?>
<?php //NEWS JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/news/index.php'){ ?>
<?php //get news result ?>
gnr('<?=$status?>');function gnr(st){$.ajax({type:'POST',url:adar+'get/gnr/',data:{"s":$('#sx').val(),"st":st}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/news/insert_news.enc.php'){ ?>
<?php //insert news (IMAGE)?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Inserting News');
$.ajax({type:'POST',url:adar+"act/in/",data:new FormData(this),cache:false,contentType:false,processData:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while inserting news'));})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m(s.message))};r_b('Insert News');});alertoff();
})
})
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/news/update_news.enc.php'){ ?>
<?php //update news ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Updating News');
$.ajax({type:'POST',url:adar+"act/un/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while updating news,try again'));r_b('Update News');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m2(s.message));};r_b('Update News');})
})
})
<?php } ?>
<?php //PROGRAMME JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/programme/index.php'){ ?>
<?php //get programme result ?>
gpmr('<?=$status?>');function gpmr(st){$.ajax({type:'POST',url:adar+'get/gpmr/',data:{"s":$('#sx').val(),"st":st}}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while fetching data...'));}).done(function(s){$('#shr').html(s);});alertoff();}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/programme/insert_programme.enc.php'){ ?>
<?php //insert programme (IMAGE)?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Inserting Programme');
$.ajax({type:'POST',url:adar+"act/ipm/",data:new FormData(this),cache:false,contentType:false,processData:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error ccured while inserting programme'));r_b('Insert Programme');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m(s.message))};r_b('Insert Programme');});alertoff();
})
})
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/programme/update_programme.enc.php'){ ?>
<?php //update programme ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('*');loading('Updating Programme');
$.ajax({type:'POST',url:adar+"act/upm/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while updating programme,try again'));r_b('Update Programme');})
.done(function(s){if(s.status === 'success'){window.location=s.message;}else if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status === 'fail'){$('#st').html(r_m2(s.message));};r_b('Update Programme');})
})
})
<?php } ?>
<?php //GENERAL JS STARTS ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/settings.enc.php'){ ?>
<?php //change site settings ?>
function css(s,k,v){
 if(v.length > 0){loading('saving','class',k);
  $.ajax({type:'POST',url:adar+'act/css/',data:{"s":s,"k":k,"v":v},cache:false,dataType:'JSON'}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while saving setting, try again'));r_b('Save','class',k);})
  .done(function(s){$('#st').html(r_m2(s.message));if(s.status==='success'){window.location='';};r_b('Save','class',k);})
 }else{
  $('#st').html(r_m2('Sorry!!!<br>Field cannot be empty, add some text and try again'));
 }
}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/admin/preview_admin.enc.php' || $_SERVER['PHP_SELF'] === '/admin/news/preview_news.enc.php' || $_SERVER['PHP_SELF'] === '/admin/programme/preview_programme.enc.php'){ ?>
<?php //change status ?>
function cs(t,i){let d="/"+t+"/"+i+"/";
$.ajax({type:'GET',url:adar+'act/cs'+d,cache:false,dataType:'JSON'}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error Occured while changing status'));})
.done(function(s){$('#st').html(r_m2(s.message));if(s.status==='success'){window.location='';}})
alertoff();
}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/admin/preview_admin.enc.php'  || $_SERVER['PHP_SELF'] === '/admin/admin/index.php'
      || $_SERVER['PHP_SELF'] === '/admin/social_handle/preview_social_handle.enc.php' || $_SERVER['PHP_SELF'] === '/admin/social_handle/index.php'
      || $_SERVER['PHP_SELF'] === '/admin/message/preview_message.enc.php' ||  $_SERVER['PHP_SELF'] === '/admin/message/index.php'
      || $_SERVER['PHP_SELF'] === '/admin/subscriber/preview_subscriber.enc.php' || $_SERVER['PHP_SELF'] === '/admin/subscriber/index.php'
      || $_SERVER['PHP_SELF'] === '/admin/transaction/preview_transaction.enc.php' ||  $_SERVER['PHP_SELF'] === '/admin/transaction/index.php'
      || $_SERVER['PHP_SELF'] === '/admin/partner/preview_partner.enc.php' ||  $_SERVER['PHP_SELF'] === '/admin/partner/index.php'
      || $_SERVER['PHP_SELF'] === '/admin/news/preview_news.enc.php' ||  $_SERVER['PHP_SELF'] === '/admin/news/index.php'
      || $_SERVER['PHP_SELF'] === '/admin/programme/preview_programme.enc.php' ||  $_SERVER['PHP_SELF'] === '/admin/programme/index.php'){ ?>
<?php //delete content ?>
function dc(t,i){let d="/"+t+"/"+i+"/";
$.ajax({type:'GET',url:adar+'act/dc'+d,cache:false,dataType:'JSON'}).fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while deleting '+t));})
.done(function(s){$('#st').html(r_m2(s.message));if(s.status==='success'){window.location='';}})
alertoff();
}
<?php } ?>
<?php if($_SERVER['PHP_SELF'] === '/admin/admin/edit_profile.enc.php' || $_SERVER['PHP_SELF'] === '/admin/admin/insert_admin.enc.php'
      || $_SERVER['PHP_SELF'] === '/admin/partner/update_partner.enc.php' || $_SERVER['PHP_SELF'] === '/admin/partner/insert_partner.enc.php'
      || $_SERVER['PHP_SELF'] === '/admin/news/update_news.enc.php' || $_SERVER['PHP_SELF'] === '/admin/news/insert_news.enc.php'
      || $_SERVER['PHP_SELF'] === '/admin/programme/update_programme.enc.php' || $_SERVER['PHP_SELF'] === '/admin/programme/insert_programme.enc.php'){ ?>
<?php // trigger file upload input ?>
function ti(t){t.trigger('click');}
<?php // process image?>
function pi(o,f){
  const file = o.files[0];
  if(file){
   const reader = new FileReader(); reader.readAsDataURL(file);
   reader.addEventListener('load',function(){
    var child = "<img src='"+this.result+"'class='j-circle'style='height:inherit;width:inherit;opacity:0.8'><span class='j-text-color4 j-bold j-vertical-center-element'style='font-size:40px;'>+</span>";
    f.innerHTML = child;
   });
  }else{
    var child = "<span class='j-text-color4 j-bold j-vertical-center-element'style='font-size:40px;'>+</span>";f.innerHTML=child;
  }
}
<?php //change image?>
function ci(i,t,c){let f = i.files[0];
 if(f){
  let n = i.getAttribute('name');let d = new FormData();d.append(n,f),d.append('t',t),d.append('i',c);
  $.ajax({type:'POST',url:adar+'act/ci',data:d,cache:false,contentType:false,processData:false,dataType:'JSON'})
  .fail(function(e){$('#st').html(r_m2('Sorry!!!<br>Error Occured while uploading photoooo'));})
  .done(function(s){$('#st').html(r_m2(s.message));if(s.status==='success'){window.location='';}})
 }else{
  $('#st').html(r_m('No file selected'));
 }
 alertoff();
}
<?php //remove image ?>
function ri(t,i){$.ajax({url:adar+"act/ri/"+t+'/'+i+'/',cache:false,dataType:'JSON'}).fail(function(e){$('#st').html(r_m2('Sorry!!!<br>Error occurred while removing photo'))})
.done(function(s){$('#st').html(r_m2(s.message));if(s.status==='success'){window.location='';}});alertoff();}
<?php } ?>
</script>