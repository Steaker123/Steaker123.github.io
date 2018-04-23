<?PHP
$_OPTIMIZATION["title"] = "Беседка";
$user_id = $_SESSION["user_id"];
$uname = $_SESSION["user"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();

?>
<style>
    .chatbro_header { display1: none;
    }
    #chatbro {
    margin: -20px -20px -42px -20px;
    }
</style>


<script id="chatBroEmbedCode"> 
/* Chatbro Widget Embed Code Start */ 
function ChatbroLoader(chats,async) {async=async!==false;var params={embedChatsParameters:chats instanceof Array?chats:[chats],needLoadCode:typeof Chatbro==='undefined'};var xhr=new XMLHttpRequest();xhr.withCredentials = true;xhr.onload=function(){eval(xhr.responseText)};xhr.onerror=function(){console.error('Chatbro loading error')};xhr.open('POST','//www.chatbro.com/embed_chats/',async);xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');xhr.send('parameters='+encodeURIComponent(JSON.stringify(params)))} 
/* Chatbro Widget Embed Code End */ 
ChatbroLoader({encodedChatId: '3Ev8', 
containerDivId: 'chatbro', 
siteDomain: 'http://megamon.biz/', 
siteUserExternalId: '<?=$user_id;?>', 
siteUserFullName: '<?=$uname;?>', 
}); 
</script> 

<div id="chatbro"></div><br/>