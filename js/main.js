// script.js

// Ensure the function is only called once
let predefinedQuestionsAdded = false;

document.addEventListener("DOMContentLoaded", function() {
    // Predefined questions
    const predefinedQuestions = [
        { question: "Why Solar?", key: "why solar" },
        { question: "Benefits of Solar Energy", key: "benefits of solar energy" },
        { question: "How much does it cost?", key: "how much does it cost" }
        // Add more predefined questions as needed
    ];

    // Append predefined questions to chat log
    function appendPredefinedQuestions() {
        if (predefinedQuestionsAdded) return;
        predefinedQuestionsAdded = true;
        
        predefinedQuestions.forEach(q => {
            let questionElem = document.createElement('button');
            questionElem.classList.add('message', 'question');
            questionElem.textContent = q.question;
            questionElem.setAttribute('data-question', q.key);
            questionElem.addEventListener('click', function() {
                sendMessage(q.key);
            });
            document.getElementById('chat-log').appendChild(questionElem);
        });
    }

    appendPredefinedQuestions();

    // Show/hide chatbot container
    document.getElementById('chatbotBtn').addEventListener('click', function() {
        var chatContainer = document.getElementById('chat-container');
        if (chatContainer.style.display === 'none' || chatContainer.style.display === '') {
            chatContainer.style.display = 'block';
        } else {
            chatContainer.style.display = 'none';
        }
    });

    function sendMessage(question) {
        let userInput = question || document.getElementById('user-input').value.trim();
        if (userInput === '') return;

        appendMessage('user', userInput);
        document.getElementById('user-input').value = '';

        fetch('chatbot.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'message=' + encodeURIComponent(userInput)
        })
        .then(response => {
            console.log('Server response:', response);
            return response.json();
        })
        .then(data => {
            console.log('Data from server:', data);
            if (data.response) {
                appendMessage('bot', data.response, true); // Pass true to indicate HTML content
            } else {
                console.error('Chatbot response is missing or invalid:', data);
                appendMessage('bot', 'Oops! Something went wrong.'); // Display an error message if the response is missing or invalid
            }
            document.getElementById('chatbox').scrollTop = document.getElementById('chatbox').scrollHeight; // Scroll to bottom of chatbox
        })
        .catch(error => {
            console.error('Error fetching chatbot response:', error);
            appendMessage('bot', 'Oops! Something went wrong.'); // Display an error message if there's an issue with the request
        });
    }

    function appendMessage(sender, text, isHTML = false) {
        let messageElem = document.createElement('div');
        messageElem.classList.add('message', sender);
        if (isHTML) {
            messageElem.innerHTML = text; // Use innerHTML if the content is HTML
        } else {
            messageElem.textContent = text;
        }
        document.getElementById('chat-log').appendChild(messageElem);
        document.getElementById('chatbox').scrollTop = document.getElementById('chatbox').scrollHeight;
    }

    // Send button click event
    document.getElementById('send-button').addEventListener('click', function() {
        sendMessage();
    });

    // Enter key event for input field
    document.getElementById('user-input').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            sendMessage();
        }
    });
});

// Additional JavaScript that was in the second event listener in the original file
const scrollToTopBtn = document.getElementById("scrollToTopBtn");
const whatsappBtn = document.getElementById("whatsappBtn");
const chatbotBtn = document.getElementById("chatbotBtn");
const chatContainer = document.querySelector(".chat-container");

window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > window.innerHeight || document.documentElement.scrollTop > window.innerHeight) {
        scrollToTopBtn.classList.add("show");
        whatsappBtn.classList.add("show");
        chatbotBtn.classList.add("show");
    } else {
        scrollToTopBtn.classList.remove("show");
        whatsappBtn.classList.remove("show");
        chatbotBtn.classList.remove("show");
    }
}

scrollToTopBtn.addEventListener("click", function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});

whatsappBtn.addEventListener("click", function() {
    window.open('https://wa.me/01211122057', '_blank');
});

chatbotBtn.addEventListener("click", function() {
    chatContainer.classList.toggle("show");
});

document.getElementById('send-button').addEventListener('click', () => sendMessage());
document.getElementById('user-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') sendMessage();
});
