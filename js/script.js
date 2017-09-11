$(function() {
    var chatText = [];
    //送信ボタン
    $('.btnText').on('click',function() {
        chatText.push($('#chatInput').val());
        alert(chatText);
        appearChatText();
    });

    //表示
    function appearChatText() {
        chatText.forEach(function(texts) {
            var text = '<p>' + texts + '</p>';
            $('.chat-body').append(text);
        })
    }
 });