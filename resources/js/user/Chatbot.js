document.addEventListener('DOMContentLoaded', function() {
    const tanyaAiButton = document.getElementById('tanyaAiButton');
    const chatbotModal = document.getElementById('chatbotModal');
    const closeChatbot = document.getElementById('closeChatbot');
    const chatMessages = document.getElementById('chatMessages');
    const messageInput = document.getElementById('messageInput');
    const sendMessageButton = document.getElementById('sendMessageButton');
    const chatForm = document.getElementById('chatForm');

    if (!tanyaAiButton || !chatbotModal) {
        console.warn('Chatbot elements not found');
        return;
    }

    // Open chatbot modal
    tanyaAiButton.addEventListener('click', function() {
        chatbotModal.classList.remove('hidden');
        chatbotModal.classList.add('flex');
        messageInput.focus();
    });

    // Close chatbot modal
    if (closeChatbot) {
        closeChatbot.addEventListener('click', function() {
            chatbotModal.classList.add('hidden');
            chatbotModal.classList.remove('flex');
        });
    }

    // Close modal when clicking outside
    chatbotModal.addEventListener('click', function(e) {
        if (e.target === chatbotModal) {
            chatbotModal.classList.add('hidden');
            chatbotModal.classList.remove('flex');
        }
    });

    // Send message
    function sendMessage() {
        const message = messageInput.value.trim();
        
        if (!message) {
            return;
        }

        // Display user message
        const userMessageDiv = document.createElement('div');
        userMessageDiv.classList.add('flex', 'justify-end', 'mb-4');
        userMessageDiv.innerHTML = `
            <div class="bg-amber-800 text-white rounded-lg px-4 py-2 max-w-xs break-words">
                ${escapeHtml(message)}
            </div>
        `;
        chatMessages.appendChild(userMessageDiv);
        messageInput.value = '';

        // Show loading indicator
        const loadingDiv = document.createElement('div');
        loadingDiv.classList.add('flex', 'justify-start', 'mb-4', 'loading-message');
        loadingDiv.innerHTML = `
            <div class="bg-gray-200 text-gray-800 rounded-lg px-4 py-2">
                <div class="flex space-x-2">
                    <div class="w-2 h-2 bg-gray-600 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                </div>
            </div>
        `;
        chatMessages.appendChild(loadingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Send to API
        fetch('/api/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                message: message
            })
        })
        .then(response => response.json())
        .then(data => {
            // Remove loading indicator
            loadingDiv.remove();

            if (data.success) {
                // Display AI response
                const aiMessageDiv = document.createElement('div');
                aiMessageDiv.classList.add('flex', 'justify-start', 'mb-4');
                aiMessageDiv.innerHTML = `
                    <div class="bg-gray-200 text-gray-800 rounded-lg px-4 py-2 max-w-xs break-words">
                        ${escapeHtml(data.message)}
                    </div>
                `;
                chatMessages.appendChild(aiMessageDiv);
            } else {
                // Display error message
                const errorDiv = document.createElement('div');
                errorDiv.classList.add('flex', 'justify-start', 'mb-4');
                errorDiv.innerHTML = `
                    <div class="bg-red-100 text-red-800 rounded-lg px-4 py-2 max-w-xs break-words">
                        ${escapeHtml(data.message || 'Terjadi kesalahan saat mengirim pesan')}
                    </div>
                `;
                chatMessages.appendChild(errorDiv);
            }

            chatMessages.scrollTop = chatMessages.scrollHeight;
        })
        .catch(error => {
            console.error('Error:', error);
            loadingDiv.remove();
            
            const errorDiv = document.createElement('div');
            errorDiv.classList.add('flex', 'justify-start', 'mb-4');
            errorDiv.innerHTML = `
                <div class="bg-red-100 text-red-800 rounded-lg px-4 py-2 max-w-xs break-words">
                    Koneksi error. Silakan coba lagi.
                </div>
            `;
            chatMessages.appendChild(errorDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    }

    sendMessageButton.addEventListener('click', sendMessage);

    // Send message on Enter key
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    // Escape HTML to prevent XSS
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
});
