import Echo from 'laravel-echo';

import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: 'localhost',
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 8080,
    forceTLS: false,
    enabledTransports: ['ws'],
});

console.log("✅ Echo initialized:", window.Echo);

window.Echo.private(`chat.${window.userId}`)
    .listen('MessageSent', (e) => {

        let chatBox = document.querySelector('#chat-box .flex-col');
        let div = document.createElement('div');

        if (e.sender_id === window.userId) {
            div.classList.add('flex', 'justify-end');
            div.innerHTML = `
                <div class="w-1/2 bg-gray-800 text-white p-2 rounded-tl-lg rounded-bl-lg rounded-tr-lg break-words whitespace-normal">
                    <p>${e.message}</p>
                </div>
            `;
        } else {
            div.classList.add('flex', 'justify-start');
            div.innerHTML = `
                <div class="w-1/2 bg-gray-500 text-white p-2 rounded-tr-lg rounded-br-lg rounded-tl-lg break-words whitespace-normal">
                    <p>${e.message}</p>
                </div>
            `;
        }

        chatBox.appendChild(div);
        document.getElementById('chat-box').scrollTop = document.getElementById('chat-box').scrollHeight;
    });
