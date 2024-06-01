<script>
const hu="<?=file_location('home_url','')?>";var dar="<?=file_location('ajax_url','')?>";
function loading(s='Loading',t='id',i='sbtn'){let vl= "<span class='j-spinner-border j-spinner-border-sm j-text-color4'style='margin-right:7px;'></span>"+s;if(t==='id'){$('#'+i).html(vl);$('#'+i).prop('disabled',true);}else if(t==='class'){$('.'+i).html(vl);}$('.'+i).prop('disabled',true);}
function r_b(s='Submit',t='id',i='sbtn'){if(t==='id'){$('#'+i).html(s);$('#'+i).prop('disabled',false);}else if(t==='class'){$('.'+i).html(s);$('.'+i).prop('disabled',false);}}
alertoff();function alertoff(){setTimeout(thealert,8000);}function thealert(){$("#thealert").hide();}
function r_m(s){if(s.length>0){s=s;}else{s='Error running request';}return "<span class='j-text-color4 j-button alert j-color1 j-bolder j-container j-padding j-round j-fixalert'id='thealert'>"+s+"</span>";}
function r_m2(s){if(s.length>0){s=s;}else{s='Sorry!!!<br>Error occurred while runing request, please try again later or reload page';}var err="<div id='return_message_modal'class='j-modal'><div class='j-card-4 j-modal-content j-color4 j-bolder'style='margin-top:200px;'><div class='j-padding'>"+s+"</div><center class='j-padding'><div class='j-clickable j-text-color1 j-round j-border j-border-color1 j-padding'style='width:100%'onclick=$('#return_message_modal').hide();>Close</div></center></div></div>";$('#st').html(err);$('#return_message_modal').show();}
<?php if(strstr(file_location('home_url',''),'000webhostapp')){ ?>
<?php //hide 000webhost advert ?>
$(document).ready(function(){$('div').last().hide();})
<?php } ?>
<?php //click anywhere to hide modal?>
$(document).ready(function(){let m = document.getElementsByClassName('j-modal');window.onclick = function(event){for(let i = 0; i < m.length; i++){if(event.target == m[i]){m[i].style.display = 'none';}}};})
<?php //code for show and hide with menu and close symbol on small and medium screen ?>
function ad(){$('#a').toggle('',function(){if($('#a').is(":hidden")){$('#mo').html('&#9776');}else{$('#mo').html('&times');}});}
<?php //for horizontal navigation?>
function hornavigation(n,c){
 let x = document.getElementsByClassName("trigger");
 for(let i = 0; i < x.length; i++){x[i].style.display="none";}
 document.getElementById(n).style.display="block";
 let y = document.getElementsByClassName("laucher");
 for(let i = 0; i < y.length; i++){y[i].style.color="black";y[i].style.backgroundColor="#f2f2f2";}
 c.style.color="white";c.style.backgroundColor="black";
}
<?php //hide navi and show and vice versa ?>
function n(t,n,s){if(t==='nav'){n.hide();s.show();$('#txtsearch2').focus();}else{s.hide();n.show();}}
<?php // for show search button on small screen after x is clicked?>
function sc(d,f){
 if(d.val().length > 0){
  f.html('<span class="j-large j-clickable j-round j-color1 j-btn"onclick=sb($("#txtsearch2").val(),$("#sel2").val());><i class="<?= icon('search');?>"></i></span>');
 }else{
  f.html('<span class="j-xlarge j-text-color4" onclick=n("sea",$("#nav"),$("#sp"))>&times</span>');
 }
}
<?php // for search?>
function sb(s,lc){if(s.length > 0){window.location=hu+'search/'+lc+'/'+s+'/';}}
<?php if($_SERVER['PHP_SELF'] === "/index.php"){?>
<?php //for notice ?>
$(document).ready(function(){$('#notice_modal').show();})
<?php //slidehow//?>
var sI = 1;var s = document.getElementsByClassName("s");var t = null;
function pD(n) {clearTimeout(t);sD(sI += n);}
function sD(n) {
  var i;
  if(n === undefined){n = ++sI}
  if (n > s.length) {sI = 1}
  if (n < 1) {sI = s.length}
  for (i = 0; i < s.length; i++) {s[i].style.display = "none";}
  s[sI-1].style.display = "block";
  t = setTimeout(sD,3000); // Change image every 2 seconds
}
<?php }?>
<?php if($_SERVER['PHP_SELF'] === '/index.php' || (isset($second_column) && $second_column === 'set')){ ?>
<?php //subscribe ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('');loading('Subscribing');
$.ajax({type:'POST',url:dar+"act/insub/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while sending message,try again'));r_b('Subscribe');})
.done(function(s){if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{if(s.status === 'success'){$('.ip').val('');}$('#st').html(r_m2(s.message));};r_b('Subscribe');});alertoff();
})
})
<?php }?>
<?php if($_SERVER['PHP_SELF'] === '/misc/contact_us.enc.php'){ ?>
<?php //insert_message ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('');loading('Sending Message');
$.ajax({type:'POST',url:dar+"act/im/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while sending message,try again'));r_b('Send Message');})
.done(function(s){if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{if(s.status === 'success'){$('.ip').val('');}$('#st').html(r_m2(s.message));};r_b('Send Message');});alertoff();
})
})
<?php }?>
<?php if($_SERVER['PHP_SELF'] === '/payment/donate.enc.php'){ ?>
<?php //process donate data ?>
$(document).ready(function(){
$('form').on('submit',function(event){event.preventDefault();$('.mg').html('');loading('Processing Info');
$.ajax({type:'POST',url:dar+"act/pdd/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while processing data,try again'));r_b('Proceed to Payment');})
.done(function(s){if(s.status==='error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else if(s.status==='success'){window.location=s.message}else{r_m2(s.message)};r_b('Proceed to Payment');});alertoff();
})
})
<?php }?>
</script>