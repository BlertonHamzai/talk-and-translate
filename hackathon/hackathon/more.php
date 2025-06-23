<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Purpose of the Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Title Section -->
            <h2>Purpose of the Code</h2>

            <!-- First Box: Overview -->
            <div class="box">
                <p><span class="highlight">This code creates a web app</span> that allows users to talk to an AI and get answers back both in text and voice.</p>
            </div>

            <!-- Second Box: How It Works -->
            <div class="box">
                <p class="section-title">How It Works:</p>
                <p><span class="highlight">You Speak:</span></p>
                <p>The app listens to your voice through a microphone and converts your voice into text.</p>

                <p><span class="highlight">The AI Responds:</span></p>
                <p>The app sends that text to the AI (which processes your question), and the AI’s response is displayed as text and also read aloud to you using a voice synthesis feature.</p>
            </div>

            <!-- Third Box: Purpose in Simple Words -->
            <div class="box">
                <p class="section-title">Purpose in Simple Words:</p>
                <p>To talk to an AI using your voice: Ask a question or say something, and the AI will answer you back in text and in voice.</p>
                <p>It’s like having a conversation with a virtual assistant (e.g., Siri or Google Assistant) but through a website.</p>
            </div>

            <!-- Fourth Box: In Short -->
            <div class="box">
                <p class="section-title">In Short:</p>
                <p><span class="highlight">Speech Recognition:</span> Converts your spoken words into text.</p>
                <p><span class="highlight">AI Processing:</span> Takes your question, processes it, and provides an answer.</p>
                <p><span class="highlight">Text-to-Speech:</span> Reads the AI's answer aloud to you.</p>
            </div>

            <!-- Fifth Box: Example Scenario -->
            <div class="box">
                <p class="section-title">Example Scenario:</p>
                <p>You say: <span class="highlight">"What’s the weather today?"</span></p>
                <p>The app transcribes your voice to text, sends it to an AI, and the AI responds with "<span class="highlight">It’s sunny today.</span>" and reads it aloud to you.</p>
            </div>

            <!-- Closing Box: Simplified Explanation -->
            <div class="box">
                <p class="section-title">Simplified Explanation:</p>
                <p>When someone asks, "What’s the purpose of this?", you can simply say:</p>
                <p><span class="highlight">"It’s a web app that lets you talk to an AI. You speak a question, and the AI answers both in text and aloud."</span></p>
            </div>

            <!-- Closing Question -->
            <p class="section-title">Does that help you better understand the purpose?</p>
        </div>
    </div>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            padding: 50px 20px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #f7b731;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 20px;
            color: #f1f1f1;
            font-weight: 300;
        }

        .highlight {
            font-weight: 600;
            color: #ff4b5c;
        }

        .box {
            background: rgba(0, 0, 0, 0.7);
            padding: 25px;
            border-radius: 15px;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .box:hover {
            transform: scale(1.05);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #ff4b5c;
            margin-bottom: 20px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            h2 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            .box {
                margin: 15px 0;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
