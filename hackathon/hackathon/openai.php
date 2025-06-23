<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI Speech Interaction</title>
    
    <!-- Font and Bootstrap -->
     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        body {
            background: linear-gradient(135deg, #2a3a9f, #5e5ce6);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Logo styling */
.logo {
    width: 300px; /* Increased size for a larger logo */
    height: auto; /* Keep aspect ratio intact */
    margin-bottom: 50px; /* Add more space below the logo */
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease; /* Smooth transitions */
    border-radius: 15px; /* Add rounded corners to the logo for a modern look */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Subtle shadow effect to make it pop */
}

.logo:hover {
    transform: scale(1.1); /* Slight zoom effect on hover */
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3); /* Enhance shadow on hover for better focus */
}



        .container {
            max-width: 800px;
            padding: 60px;
            background: #333;
            border-radius: 25px;
            box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.3);
            text-align: center;
            transition: transform 0.3s ease;
        }

        h1 {
            font-family: 'Roboto', sans-serif;
            color: #fff;
            font-size: 3rem;
            margin-bottom: 40px;
            font-weight: 600;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        #microphone-icon {
            font-size: 5rem;
            color: #007bff;
            margin-bottom: 30px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        #microphone-icon.listening {
            color: #34c759;
            transform: scale(1.2);
        }

        .form-control {
            border-radius: 15px;
            border: none;
            padding: 20px;
            font-size: 1.2rem;
            background-color: #444;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: #555;
            box-shadow: 0 0 15px rgba(0, 0, 255, 0.3);
        }

        .btn {
            border-radius: 50px;
            padding: 15px 30px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #ff5c8d;
            box-shadow: 0 5px 15px rgba(255, 92, 141, 0.4);
        }

        .btn-danger:hover {
            background-color: #ff4064;
            transform: translateY(-5px);
        }

        .btn-warning {
            background-color: #ffb84d;
            box-shadow: 0 5px 15px rgba(255, 180, 77, 0.4);
        }

        .btn-warning:hover {
            background-color: #e68a33;
            transform: translateY(-5px);
        }

        .btn-light {
            background-color: #f7f7f7;
            color: #333;
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.4);
        }

        .btn-light:hover {
            background-color: #e0e0e0;
            transform: translateY(-5px);
        }

        #instructions {
            font-size: 1.1rem;
            color: #bbb;
            margin-top: 20px;
            font-weight: 500;
        }

        /* Logo styling */
        .logo {
            width: 200px;
            margin-bottom: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .logo:hover {
            transform: scale(1.4);
        }

        .logo-container {
            margin-bottom: 40px;
        }

        .header-text {
            color: #fff;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
        }

        .form-container {
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Logo Section -->
    <div class="logo-container" style="width: 100%;">
        <img src="../Blingual/logo.png" alt="Logo" class="logo">
    </div>

    <form id="translation-form" class="form-container">
        <!-- Input Textarea -->
        <textarea id="textbox" class="form-control" rows="5" placeholder="Enter text to translate"></textarea>
        
        <!-- Translated Output Textarea -->
        <textarea id="translated-box" class="form-control mt-3" rows="5" placeholder="Translated text will appear here..." readonly></textarea>

        <div class="form-group mt-3">
            <!-- Action Buttons -->
            <button id="start-btn" type="button" class="btn btn-danger mt-3">Start Listening</button>
            <button id="stop-btn" type="button" class="btn btn-warning mt-3">Stop Listening</button>
            <button id="translate-btn" type="button" class="btn btn-light mt-3">Translate</button>
        </div>
    </form>

    <p id="instructions">Press start to begin speech recognition.</p>
</div>

<script>
    // Initialize Speech Recognition
    var speechRecognition = window.webkitSpeechRecognition;
    var recognition = new speechRecognition();
    var textbox = $("#textbox");
    var content = '';

    recognition.continuous = true;

    // Speech Recognition Event Handlers
    recognition.onstart = function () {
        $("#microphone-icon").addClass("listening");
        $("#instructions").text("Listening... Speak now.");
    };

    recognition.onend = function () {
        $("#microphone-icon").removeClass("listening");
        $("#instructions").text("Speech recognition ended.");
    };

    recognition.onresult = function (event) {
        var transcript = event.results[event.resultIndex][0].transcript;
        content += transcript;
        textbox.val(content);
        getAIResponse(content); // Get AI response after transcription
    };

    recognition.onerror = function (event) {
        $("#instructions").text(`Error occurred: ${event.error}. Please try again.`);
    };

    // Start and Stop Buttons
    $("#start-btn").click(() => recognition.start());
    $("#stop-btn").click(() => recognition.stop());

    // Function to Get AI Response
    function getAIResponse(userInput) {
        $.ajax({
            url: '/ask',
            type: 'POST',
            data: JSON.stringify({ query: userInput }),
            contentType: 'application/json',
            success: function (response) {
                var aiText = response.answer;
                textbox.val(aiText);
                speak(aiText); // Speak the AI response
            },
            error: function (err) {
                console.error("Error: ", err);
            }
        });
    }

    // Text-to-Speech Function
    function speak(text) {
        var utterance = new SpeechSynthesisUtterance(text);
        window.speechSynthesis.speak(utterance);
    }

    async function translateTextMyMemory() {
        const sourceText = document.getElementById('textbox').value.trim();
        const resultTextArea = document.getElementById('translated-box');
        const sourceLang = "en";
        const targetLang = "sq";

        resultTextArea.value = '';

        if (!sourceText) {
            resultTextArea.value = "Please enter text to translate.";
            return;
        }

        try {
            const response = await fetch(`https://api.mymemory.translated.net/get?q=${encodeURIComponent(sourceText)}&langpair=${sourceLang}|${targetLang}`);
            if (!response.ok) {
                throw new Error(`Translation failed with status ${response.status}`);
            }

            const data = await response.json();
            resultTextArea.value = data.responseData.translatedText;
        } catch (error) {
            console.error("Error during translation:", error);
            resultTextArea.value = `Error: ${error.message}`;
        }
    }

    document.getElementById('translate-btn').addEventListener('click', translateTextMyMemory);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
