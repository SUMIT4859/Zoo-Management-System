document.addEventListener("DOMContentLoaded", function () {
    const chatButton = document.getElementById("chatButton");
    const chatContainer = document.getElementById("chatContainer");
    const closeChat = document.getElementById("closeChat");
    const chatBody = document.getElementById("chatBody");
    const chatInput = document.getElementById("chatInput");
    const sendMessage = document.getElementById("sendMessage");

    // Toggle chat visibility
    chatButton.addEventListener("click", function () {
        chatContainer.style.display = "flex";
    });

    closeChat.addEventListener("click", function () {
        chatContainer.style.display = "none";
    });

    // Send message to chatbot
    sendMessage.addEventListener("click", function () {
        const userMessage = chatInput.value.trim();
        if (userMessage === "") return;

        // Display user message
        const userDiv = document.createElement("div");
        userDiv.className = "user-message";
        userDiv.textContent = userMessage;
        chatBody.appendChild(userDiv);

        // Send request to chatbot
        fetch("chatbot.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "message=" + encodeURIComponent(userMessage),
        })
        .then(response => response.json())
        .then(data => {
            const botDiv = document.createElement("div");
            botDiv.className = "bot-message";
            botDiv.textContent = data.reply;
            chatBody.appendChild(botDiv);
            chatBody.scrollTop = chatBody.scrollHeight;
        });

        chatInput.value = "";
    });

    // Allow Enter key to send message
    chatInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            sendMessage.click();
        }
    });
});
