jQuery(document).ready(function ($) {
    if ($('#ts-chat-container').length === 0) {
        $('body').append('<div id="ts-chat-container"></div>');
    }

    $('body').append(`
        <div class="ts-chat-button">
            <div class="ts-chat-icon"><i class="fas fa-robot"></i></div>
        </div>
        <div class="ts-chat-window">
            <div class="ts-chat-header">
                <h3>TS-ChatAI</h3>
            </div>
            <div class="ts-chat-messages"></div>
            <div class="ts-chat-input">
                <input type="text" placeholder="Nhập tin nhắn..." />
                <button>Gửi</button>
            </div>
        </div>
    `);

    // Xử lý sự kiện click button
    $('.ts-chat-button').click(function () {
        $('.ts-chat-window').toggle();
    });

    // Xử lý gửi tin nhắn
    $('.ts-chat-input button').click(function () {
        sendMessage();
    });

    $('.ts-chat-input input').keypress(function (e) {
        if (e.which == 13) {
            sendMessage();
        }
    });

    function sendMessage() {
        var message = $('.ts-chat-input input').val();
        if (message.trim() == '') return;

        // Hiển thị tin nhắn người dùng
        appendMessage('user', message);

        // Tạm thời thêm phản hồi giả
        setTimeout(() => {
            appendMessage('ai', 'Đây là phản hồi test từ AI');
        }, 500);

        $('.ts-chat-input input').val('');
    }

    function appendMessage(type, message) {
        var messageHtml = `
            <div class="message ${type}">
                <div class="message-content">${message}</div>
            </div>
        `;
        $('.ts-chat-messages').append(messageHtml);
        $('.ts-chat-messages').scrollTop($('.ts-chat-messages')[0].scrollHeight);
    }
});
