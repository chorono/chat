$(function() {
    var chatText = [];
    var firstText = 0;
    //送信ボタン
    $('.btnText').on('click',function() {
        chatText.push($('#chatInput').val());
        alert(chatText);
        appearChatText(chatText);
    });

    //表示
    function appearChatText(chatText) {
        var lastText = chatText.length;
        for(var i = firstText; i < lastText; i++) {
            var text = '<p>' + chatText[i] + '</p>'
            $('.chat-body').append(text);
        }
        firstText = lastText
    }
 });