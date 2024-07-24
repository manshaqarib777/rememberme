<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>

    <style>
        .cardimg {
            position: absolute;
            top: 273px;
    left: 236px;
        }

        .cardimg1 {
            position: absolute;
            top: 250px;
    left: 729px;
    width: 154px;
        }

        .rotate-45 {
            transform: rotate(45deg);
        }

        #downloadButton {
            background-color: indigo;
            border-radius: 5px;
            padding: 5px;
            color: white
        }
    </style>
</head>

<body>

    <div class="container">

        <div id="cardToDownload">
            <span class="rotate-45 cardimg">
                {!! QrCode::size(190)->color(243, 197, 43)->backgroundColor(255, 255, 255, 0)->generate($qrcode->url . '?reference=' . $qrcode->reference) !!}
            </span>

            <span class="rotate-45 cardimg1">
                {!! QrCode::size(155)->color(243, 197, 43)->backgroundColor(255, 255, 255, 0)->generate($qrcode->url . '?reference=' . $qrcode->reference) !!}
            </span>

            <img width="" src="{{ asset('card_front.png') }}" alt="" />
            <img src="{{ asset('card_back.png') }}" alt="" />
        </div>

        <button id="downloadButton">Download {{ $qrcode->reference }}</button>

    </div>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Default image source for display


            document.querySelector("#downloadButton").addEventListener("click", function() {
                // Change the image source to the new image for download

                // Use html2canvas to capture the card content
                html2canvas(document.getElementById("cardToDownload")).then(function(canvas) {
                    // Convert the canvas to a data URL
                    var dataURL = canvas.toDataURL("image/png");

                    // Create a temporary link element
                    var link = document.createElement("a");
                    link.href = dataURL;
                    link.download = `{{ $qrcode->reference }}.png`;

                    // Trigger a click on the link to initiate the download
                    link.click();


                });
            });
        });
    </script>
</body>

</html>
